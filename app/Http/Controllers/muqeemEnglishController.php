<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuqeemModel;
use App\Models\MuqeemEnglishModel;
use App\Models\MuqeemArabic;

class muqeemEnglishController extends Controller
{
 public function muqeemEnglishSubmit(Request $request)
{
    // ১. ভ্যালিডেশন (নিশ্চিত করুন সব ফিল্ড রিয়্যাক্টের ফর্মের নামের সাথে মিলছে)
    $validated = $request->validate([
        'reportDate'            => 'required|string',
        'operatorId'            => 'nullable|string', // রিয়্যাক্টে খালি থাকলে nullable দিন
        'location'              => 'required|string',
        'iqamaNumber'           => 'required|string',
        'versionNumber'         => 'nullable|string',
        'gender'                => 'required|string',
        'name'                  => 'required|string',
        'translatedName'        => 'required|string',
        'birthDate'             => 'required|string',
        'birthCountry'          => 'required|string',
        'maritalStatus'         => 'required|string',
        'religion'              => 'required|string',
        'occupation'            => 'required|string',
        'status'                => 'required|string',
        'entryDate'             => 'required|string',
        'entryLocation'         => 'required|string',
        'passportNumber'        => 'required|string',
        'nationality'           => 'required|string',
        'passportIssueDate'     => 'required|string',
        'passportExpiryDate'    => 'required|string',
        'passportIssueLocation' => 'required|string',
        'iqamaIssueDate'        => 'required|string',
        'iqamaExpiryDate'       => 'required|string',
        'iqamaIssueLocation'    => 'required|string',
        'employerNumber'        => 'required|string',
        'employerName'          => 'required|string',
        'user_id'               => 'required|string',
        'user_roll'             => 'required|string',
    ]);

    // ২. ডাটাবেসে সেভ করা
    $record = MuqeemEnglishModel::create($validated);
    $insertId = $record->id;

    // ৩. ইউজারের নাম এবং অন্যান্য ডাটা ভেরিয়েবলে নেওয়া
    $userId   = $validated['user_id'];
    $userRole = $validated['user_roll'];
    $userName = $validated['name']; // এখন আর Undefined Key এরর দিবে না

    if ($userId && $userRole === 'user') {
        try {
            $paymentStatus = "paid";
            
            \DB::transaction(function () use ($userId, &$paymentStatus) {
                $user = \App\Models\Custom_userModel::lockForUpdate()->find($userId);
                if (!$user) throw new \Exception('User not found.');
                
                if ((float)$user->balance < 10) {
                    throw new \Exception('Insufficient balance.');
                }
                $user->decrement('balance', 10);
            });

            $this->createDocument($userId, $userName, $insertId, 'paid');

            return response()->json([
                'status' => 'success',
                'newMuqeemId' => $insertId,
                'message' => 'Record saved and balance deducted.'
            ]);

        } catch (\Exception $e) {
            $this->createDocument($userId, $userName, $insertId, 'Due');
            
            return response()->json([
                'status' => 'error',
                'message' => 'Saved as Due: ' . $e->getMessage()
            ], 400);
        }
    }

   
$viewUrl = url("/muqeemEnglishCheck?id={$insertId}");

return response()->json([
    'status' => 'success',
    'message' => 'Success! <a target="_blank" href="' . $viewUrl . '" style="color: #2563eb; font-weight: bold; text-decoration: underline; margin-left: 5px;">Click here to View Report (ID: ' . $insertId . ')</a>',
    'newMuqeemId' => $insertId
], 200);
}

// ডকুমেন্ট সেভ করার জন্য একটি হেল্পার ফাংশন (কোড ক্লিন রাখার জন্য)
private function createDocument($userId, $userName, $insertId, $status) {
    \App\Models\DocumentInfoModel::create([
        'user_id'         => $userId,
        'user_name'       => $userName,
        'document_type'   => 'Muqeem English',
        
        'document_link' => url("/muqeemEnglishCheck?id={$insertId}"),
        'document_status' => $status,
        'document_id'     => $insertId,
        'payment_amount'  => '10',
    ]);
}

    
    // 
    
    public function updateFormMuqeemEnglish(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|integer|exists:muqeem_english,id', // assuming table name
        'reportDate' => 'required|string',
        'operatorId' => 'required|string',
        'location' => 'required|string',
        'iqamaNumber' => 'required|string',
        'versionNumber' => 'required|string',
        'gender' => 'required|string',
        'name' => 'required|string',
        'translatedName' => 'required|string',
        'birthDate' => 'required|string',
        'birthCountry' => 'required|string',
        'maritalStatus' => 'required|string',
        'religion' => 'required|string',
        'occupation' => 'required|string',
        'status' => 'required|string',
        'entryDate' => 'required|string',
        'entryLocation' => 'required|string',
        'passportNumber' => 'required|string',
        'nationality' => 'required|string',
        'passportIssueDate' => 'required|string',
        'passportExpiryDate' => 'required|string',
        'passportIssueLocation' => 'required|string',
        'iqamaIssueDate' => 'required|string',
        'iqamaExpiryDate' => 'required|string',
        'iqamaIssueLocation' => 'required|string',
        'employerNumber' => 'required|string',
        'employerName' => 'required|string',
    ]);

    // Find and update the record
    $record = MuqeemEnglishModel::findOrFail($validated['id']);
    $record->update($validated);

    return response()->json([
    'status' => 'success',
    'message' => 'Data inserted successfully!'
], 200);


}


    
    public function muqeemEnglishCheck(Request $request)
    {
        
        $record = MuqeemEnglishModel::find($request->id);
        return view('dashboard.muqeem.view-Muqeem.muqeem-english', compact('record'));
    }
    //  Edit
   public function searchEnglishMuqeem(Request $request)
{
    $table_name = $request->muqeem_table_name;
    $checkLink = "";

    if ($table_name == "muqeem_english") {
        $current_model = \App\Models\MuqeemEnglishModel::class;
        $checkLink = "muqeemEnglishCheck";
    } elseif ($table_name == "muqeem_arabics") {
        $current_model = \App\Models\MuqeemArabic::class;
        $checkLink = "muqeemArabic";
    } elseif ($table_name == "Muqeem") {
        $current_model = \App\Models\MuqeemModel::class; 
        $checkLink = "check-muqeem";
    } else {
        return back()->with('message', "Invalid table selected.");
    }

    $info = $request->input('info');
    $infoType = $request->input('info_type');

    $record = $current_model::where($infoType, $info)->first();

    if ($record) {
                    return back()->with([
                   'resultData' => $record,
                   'checkLink' => $checkLink,
                 ]);

    } else {
        return back()->with('message', "Your information is wrong. Please try again.");
    }
}


  public function editPageEnglishMuqeem(Request $request)
{
    $id = $request->query('id');
    $data = MuqeemEnglishModel::findOrFail($id);
    return view('dashboard.muqeem.editEnglishMuqeem', compact('data'));
}

   public function editPageArabicMuqeem(Request $request){
       
        $record = MuqeemArabic::find($request->id);
        return view('dashboard/muqeem/editArabicMuqeem', compact('record'));
   }
}
