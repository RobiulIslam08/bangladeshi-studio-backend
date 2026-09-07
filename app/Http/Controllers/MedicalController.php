<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalReport;
use App\Models\Custom_userModel;
use App\Models\DocumentInfoModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Barryvdh\DomPDF\Facade\Pdf;


class MedicalController extends Controller
{
    
    public function show(Request $request)
{
    $id = $request->query('id');
    abort_unless($id, 404);

    $data = MedicalReport::findOrFail($id);

    // --- SAFE DOB PARSE ---
    $dobRaw = trim((string) $data->date_of_birth);
    $dob = null;

    try {
        // আপনার ডেটা d/m/Y
        $dob = Carbon::createFromFormat('d/m/Y', $dobRaw)->startOfDay();
    } catch (\Throwable $e) {
        // বিকল্প ফরম্যাট থাকলে এখানে চেষ্টা করুন:
        // try { $dob = Carbon::createFromFormat('Y-m-d', $dobRaw)->startOfDay(); } catch (...) {}
        $dob = null; // invalid হলে null
    }

    $ageYears = $dob ? $dob->age : null;

    // QR বা অন্য তারিখ ফিল্ডেও একই কৌশল প্রয়োগ করুন
    return view('medical.check', compact('data', 'ageYears'));
}
    
    public function download($id)
{
    $data = MedicalReport::findOrFail($id);

    // Safe date parsing (supports multiple formats)
    $dob = null;
    $formats = ['d/m/Y', 'Y-m-d', 'd-m-Y'];
    foreach ($formats as $format) {
        try {
            $dob = \Carbon\Carbon::createFromFormat($format, trim($data->date_of_birth));
            break;
        } catch (\Throwable $e) {
            // try next format
        }
    }

    $ageYears = $dob ? $dob->age : null;

    $qrText = url('/checkReport?id=' . $id);

    return $this->generatePdf($data, $ageYears, $qrText, true);
}


    protected function generatePdf($data, $ageYears, $qrText, $asDownload = true)
    {
        // PDF-friendly Blade: resources/views/medical/reportPDF.blade.php
        $pdf = PDF::loadView('medical.report-pdf', [
            'data'     => $data,
            'ageYears' => $ageYears,
            'qrText'   => $qrText,
        ])->setPaper('a4', 'portrait');

        $filename = 'medical-report-'.$data->file_no.'.pdf';

        return $asDownload ? $pdf->download($filename) : $pdf->stream($filename);
    }
    
    
    
    
    
    
    
   public function checkReport(Request $request)
{
    // ১. ডাটা খুঁজে বের করা (ID না থাকলে ৪MD৪ এরর)
    $id   = $request->id ?? $request->query('id');
    $data = MedicalReport::find($id);

    if (!$data) {
        abort(404, 'Report not found');
    }

    // ৩. রিপোর্ট তারিখ ও সময় প্রসেসিং (Custom Format: 31/01/2026 15:22)
    $reportAt = 'N/A';
    $reportDateTime = null;
    $rawDate = trim((string)$data->report_date);
    $rawTime = trim((string)$data->time);

    if (!empty($rawDate)) {
        try {
            // যদি টাইম থাকে তবে d/m/Y H:i ফরম্যাট ব্যবহার করবে
            if (!empty($rawTime)) {
                $reportDateTime = \Carbon\Carbon::createFromFormat('d/m/Y H:i', "$rawDate $rawTime");
            } else {
                $reportDateTime = \Carbon\Carbon::createFromFormat('d/m/Y', $rawDate);
            }
            // ভিউ এর জন্য ফরম্যাট: 31/01/2026 03:22 PM
            $reportAt = $reportDateTime->format('d/m/Y h:i A');
        } catch (\Throwable $e) {
            // যদি ফরম্যাট না মিলে (যেমন: ডাটাবেজে ভিন্ন ফরম্যাট থাকলে)
            $reportAt = 'N/A'; 
        }
    }

    // ৪. বয়স ক্যালকুলেশন (Date of Birth থেকে)
    $ageText  = 'N/A';
    $ageYears = 'N/A';
    $rawDob = trim((string)$data->date_of_birth);

    if (!empty($rawDob)) {
        try {
            // DOB যদি 31/01/1990 ফরম্যাটে থাকে
            $dob = \Carbon\Carbon::createFromFormat('d/m/Y', $rawDob);
            
            // রিপোর্ট হওয়ার সময় বয়স কত ছিল তা বের করা (রিপোর্ট ডেট না থাকলে বর্তমান সময় নেবে)
            $referenceDate = $reportDateTime ?: \Carbon\Carbon::now();
            $diff = $dob->diff($referenceDate);
            
            $ageYears = $diff->y;
            $ageText  = sprintf('%d years, %d months, and %d days', $diff->y, $diff->m, $diff->d);
        } catch (\Throwable $e) {
            $ageText  = 'N/A';
            $ageYears = 'N/A';
        }
    }

    // ৫. QR — scan opens this report (verify authenticity)
    $qrText = url('/checkReport?id=' . $data->id);

    $view = $data->usesLatestDesign()
        ? 'medical.medicalReport'
        : 'medical.medicalReportClassic';

    return view($view, [
        'data'     => $data,
        'qrText'   => $qrText,
        'ageYears' => $ageYears,
        'ageText'  => $ageText,
        'reportAt' => $reportAt,
    ]);
}
    
    
    
    public function createReport(Request $request){
        
        $last_idValue = MedicalReport::nextFileNo();

        return view('dashboard.medical.createMedicalReport', compact('last_idValue'));
    }
    
    
    
    public function store(Request $request){
        $this->ensureDesignColumnExists();

        $data = $request->validate([
            'to' => 'nullable|string|max:255',
            'report_date' => 'nullable|string|max:255',
            'file_no' => 'nullable|max:255',
            'time' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:50',
            'sex' => 'nullable|string|max:10',
            'sponsoreCompany' => 'nullable|string|max:255',
            'job_desc' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:50',
            'weight' => 'nullable|string|max:50',
            'pulse' => 'nullable|string|max:50',
            'bp' => 'nullable|string|max:50',
            'temp' => 'nullable|string|max:50',
            'blood_group' => 'nullable|string|max:50',
            'passport_or_iqama' => 'nullable|string|max:50',
            'date_of_birth' => 'nullable|string|max:50',
            'design' => 'nullable|string|in:old,latest',
        ]);

        $design = ($data['design'] ?? $request->input('design')) === 'latest' ? 'latest' : 'old';

        $report = MedicalReport::create([
            'to_name' => $data['to'] ?? null,
            'report_date' => $data['report_date'] ??  $request->input('Date'),
            'file_no' => MedicalReport::nextFileNo(),
            'time' => $data['time'] ?? $request->input('Time'),
            'name' => $data['name'] ?? null,
            'nationality' => $data['nationality'] ?? null,
            'age' => $data['age'] ?? null,
            'sex' => $data['sex'] ?? null,
            'sponsor_company' => $data['sponsoreCompany'] ?? $request->input('sponsoreCompany'),
            'job_desc' => $data['job_desc'] ?? null,
            'city' => $data['city'] ?? null,
            'height' => $data['height'] ?? null,
            'weight' => $data['weight'] ?? null,
            'pulse' => $data['pulse'] ?? null,
            'bp' => $data['bp'] ?? null,
            'temp' => $data['temp'] ?? null,
            'blood_group' => $data['blood_group'] ?? null,
            'passport_or_iqama' => $data['passport_or_iqama'] ?? null,
            'date_of_birth' => $data['date_of_birth'] ?? null,
            'design' => $design,
        ]);

        $report->update(['file_no' => $report->serialFileNo()]);

        // Report তৈরি হওয়ার পর
$insertId = $report->id;

// ✅ শুধু নিচের ব্লকটা বদলান
$userId   = $request->input('user_id');
$userRole = $request->input('user_roll');

if ($userId && $userRole === 'user') {

    // শুরুতেই payment status সেট করি
    $paymentStatus = "paid";

    try {
        \DB::transaction(function () use ($userId, &$paymentStatus) {

            $user = \App\Models\Custom_userModel::lockForUpdate()->find($userId);

            if (!$user) {
                throw new \RuntimeException('User not found.');
            }

            // যদি ব্যালেন্স কম হয়
            if ((float) $user->balance < 10) {
                $paymentStatus = "Due"; // এখানে শুধু মান পরিবর্তন
                throw new \RuntimeException('Insufficient balance.');
            }

            // ব্যালেন্স 10 কমানো
            $user->decrement('balance', 10);
        });

        // ✅ Document Info তৈরি
        \App\Models\DocumentInfoModel::create([
            'user_id'         => $userId,
            'user_name'       => $data['name'] ?? null,
            'document_type'   => 'Medical Report',
            'document_link'   => 'https://bangladeshistudeo.com/checkReport?id=' . $insertId,
            'document_status' => $paymentStatus,
            'document_id'     => $insertId,
            'payment_amount'  => '10',
        ]);

       
$fullUrl = url("/checkReport?id={$insertId}");

return response()->json([
    'status'  => 'success',
    'message' => 'New Medical Report saved successfully and 10 deducted from balance. <a href="' . $fullUrl . '" target="_blank" style="color: #2563eb; font-weight: bold; text-decoration: underline; margin-left: 5px;">View Medical Report</a>',
    'id'      => $insertId,
    'url'     => $fullUrl // React-এ সরাসরি ব্যবহারের জন্য full URL পাঠানোই বেস্ট
], 200);

    } catch (\Throwable $e) {

        // ব্যালেন্স না কাটা গেলেও Document Info সংরক্ষণ করা যায়
        \App\Models\DocumentInfoModel::create([
            'user_id'         => $userId,
            'user_name'       => $data['name'] ?? null,
            'document_type'   => 'Medical Report',
            'document_link'   => 'https://bangladeshistudeo.com/checkReport?id=' . $insertId,
            'document_status' => 'Due',
            'document_id'     => $insertId,
            'payment_amount'  => '10',
        ]);

        return redirect()->back()->with(
            'error',
            'Report saved, but balance deduction failed: ' . $e->getMessage()
        );
    }

} else {
   
$fullUrl = url("/checkReport?id={$insertId}");

return response()->json([
    'status'      => 'success',
    'message'     => 'Record saved successfully. <a href="' . $fullUrl . '" target="_blank" style="color: #2563eb; font-weight: bold; text-decoration: underline; margin-left: 5px;">View Medical Report</a>',
    'insert_id'   => $insertId,
    'view_url'    => $fullUrl, // পুরো ইউআরএল পাঠানোই ভালো
    'action_text' => 'View Medical Report'
], 200);
}


        

    }
    
    public function search(Request $request)
{
    // 1. Validate that 'info' exists
    $request->validate([
        'info' => 'required|string|max:100',
        'info_type' => 'required|string|in:file_no,passport_or_iqama,name'
    ]);

    // 2. Search dynamically based on the 'info_type' sent from React
    $report = MedicalReport::where($request->info_type, 'LIKE', '%' . $request->info . '%')
                ->first();

    // 3. Return JSON for Axios
    if (!$report) {
        return response()->json([
            'status' => 'error',
            'message' => 'No medical report found for the provided information.'
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'resultData' => $report
    ], 200);
}
    

    public function getLatestId() {
        return response()->json([
            'status' => 'success',
            'next_id' => MedicalReport::nextFileNo(),
        ]);
    }

    private function ensureDesignColumnExists(): void
    {
        if (Schema::hasColumn('medical_reports', 'design')) {
            return;
        }

        Schema::table('medical_reports', function (Blueprint $table) {
            $table->string('design', 20)->default('old')->after('date_of_birth');
        });
    }

}
