<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function muqeemPaper(Request $request)
{
    // Get ID from URL query string
    $id = $request->id;

    // Find record by ID
    $data = Business::find($id);

    // Check if record exists
    if (!$data) {
        return redirect()->back()->with('error', 'Business (Muqeem) record not found.');
    }

    // Return view with data
    return view('muqeem.businessMuqeem.businessMuqeem', compact('data'));
}


public function store(Request $request)
{
    // ১. ভ্যালিডেশন
    $validated = $request->validate([
        // passport
        'passportNumber'         => 'nullable|string|max:100',
        'passportIssuancePlace'  => 'nullable|string|max:255',
        'PassportIssuanceDate'   => 'nullable|string|max:255',
        'PassportExpiryDate'     => 'nullable|string|max:255',
        'PassportStatus'         => 'nullable|string|max:255',
        'VisaExpiryDate'         => 'nullable|string|max:255',
        'VisaIssuancePlace'      => 'nullable|string|max:255',
        'DateLastExit'           => 'nullable|string|max:255',

        // health
        'HealthInsurance'        => 'nullable|string|max:255',
        'HelthInsuranceExpiry'   => 'nullable|string|max:255',

        // vehicles
        'NumberofVehicles'       => 'nullable|string|max:255',
        'TrafficViolationsNumber'=> 'nullable|string|max:255',
        'NumberofLicenses'       => 'nullable|string|max:255',

        // hajj
        'hajjEligibility'        => 'nullable|string|max:255',
        'lastYearHajj'           => 'nullable|string|max:255',

        // sponsor
        'sponsorIdNumber'        => 'nullable|string|max:255',
        'sponsorName'            => 'nullable|string|max:255',
        'slId'            => 'nullable|string|max:255',

        // family
        'NumberOfFamilyMembers'  => 'nullable|string|max:255',
        'FamilyMembersInside'    => 'nullable|string|max:255',
        'FamilyMembersOutside'   => 'nullable|string|max:255',

        // personal
        'arabicName'             => 'nullable|string|max:255',
        'nameEnglish'            => 'nullable|string|max:255',
        'slId'                   => 'nullable|string|max:255',

        // iqama
        'iqamaNumber'            => 'nullable|string|max:255',
        'idVersion'              => 'nullable|string|max:50',
        'iqamaStatus'            => 'nullable|string|max:50',
        'iqamaExpDate'           => 'nullable|string|max:255',
        'iqamaIssueDate'         => 'nullable|string|max:255',
        'iqamaOccupation'        => 'nullable|string|max:255',
        'iqamaMaritalStatus'     => 'nullable|string|max:50',
        'nationality'            => 'nullable|string|max:100',

        // other personal
        'bloodType'              => 'nullable|string|max:10',
        'placeOfBirth'           => 'nullable|string|max:255',
        'dateOfBirth'            => 'nullable|string|max:255',
        'iqamaIssuePlace'        => 'nullable|string|max:255',

        'gender'                 => 'nullable|string|max:20',
        'inside_kingdom'         => 'nullable|string|max:10',
        'religion'               => 'nullable|string|max:50',
        'finger_print'           => 'nullable|string|max:10',
        'sponsor_transfer'       => 'nullable|string|max:255',
        'muqeemCreateDate'       => 'nullable|string|max:255',

        'customerImage'          => 'nullable|image|mimes:jpeg,png,jpg,gif',

        // user info
        'userId'                 => 'nullable',
        'userRoll'               => 'nullable',
    ]);

    // ২. ইমেজ স্টোরিং লজিক
    $customerImagePath = null;
    if ($request->hasFile('customerImage')) {
        // storage/app/public/muqeem_images ফোল্ডারে সেভ হবে
        $path = $request->file('customerImage')->store('muqeem_images', 'public');
        $customerImagePath =  $path;
    }

    // ৩. ডাটা ম্যাপ করা (CamelCase থেকে Snake_case)
    $data = [
        'passport_number'            => $request->input('passportNumber'),
        'passport_issuance_place'    => $request->input('passportIssuancePlace'),
        'passport_issuance_date'     => $request->input('PassportIssuanceDate'),
        'passport_expiry_date'       => $request->input('PassportExpiryDate'),
        'passport_status'            => $request->input('PassportStatus'),
        'visa_expiry_date'           => $request->input('VisaExpiryDate'),
        'visa_issuance_place'        => $request->input('VisaIssuancePlace'),
        'date_last_exit'             => $request->input('DateLastExit'),
        'health_insurance'           => $request->input('HealthInsurance'),
        'health_insurance_expiry'    => $request->input('HelthInsuranceExpiry'),
        'number_of_vehicles'         => $request->input('NumberofVehicles'),
        'traffic_violations_number'  => $request->input('TrafficViolationsNumber'),
        'number_of_licenses'         => $request->input('NumberofLicenses'),
        'hajj_eligibility'           => $request->input('hajjEligibility'),
        'last_year_hajj'             => $request->input('lastYearHajj'),
        'sponsor_id_number'          => $request->input('sponsorIdNumber'),
        'sponsor_name'               => $request->input('sponsorName'),
        'sl_id'               => $request->input('slId'),
        'number_of_family_members'   => $request->input('NumberOfFamilyMembers'),
        'family_members_inside'      => $request->input('FamilyMembersInside'),
        'family_members_outside'     => $request->input('FamilyMembersOutside'),
        'arabic_name'                => $request->input('arabicName'),
        'name_english'               => $request->input('nameEnglish'),
        'sl_id'                      => $request->input('slId'),
        'iqama_number'               => $request->input('iqamaNumber'),
        'id_version'                 => $request->input('idVersion'),
        'iqama_status'               => $request->input('iqamaStatus'),
        'iqama_exp_date'             => $request->input('iqamaExpDate'),
        'iqama_issue_date'           => $request->input('iqamaIssueDate'),
        'iqama_occupation'           => $request->input('iqamaOccupation'),
        'iqama_marital_status'       => $request->input('iqamaMaritalStatus'),
        'nationality'                => $request->input('nationality'),
        'blood_type'                 => $request->input('bloodType'),
        'place_of_birth'             => $request->input('placeOfBirth'),
        'date_of_birth'              => $request->input('dateOfBirth'),
        'iqama_issue_place'          => $request->input('iqamaIssuePlace'),
        'gender'                     => $request->input('gender'),
        'inside_kingdom'             => $request->input('inside_kingdom'),
        'religion'                   => $request->input('religion'),
        'finger_print'               => $request->input('finger_print'),
        'sponsor_transfer'           => $request->input('sponsor_transfer'),
        'muqeemCreateDate'           => $request->input('muqeemCreateDate'),
        'customerImage'              => $customerImagePath,
    ];

    // ৪. ডাটাবেসে সেভ করা
    $business = \App\Models\Business::create($data);
    $insertId = $business->id;

    // ৫. ইউজার পেমেন্ট ও ডকুমেন্ট লজিক
    $userId = $request->userId;
    $userRole = $request->userRoll;
    $name = $request->nameEnglish;

    if ($userId && $userRole === 'user') {
        $paymentStatus = "paid";

        try {
            \DB::transaction(function () use ($userId, &$paymentStatus) {
                $user = \App\Models\Custom_userModel::lockForUpdate()->find($userId);

                if (!$user) {
                    throw new \RuntimeException('User not found.');
                }

                if ((float) $user->balance < 10) {
                    $paymentStatus = "Due";
                    throw new \RuntimeException('Insufficient balance.');
                }

                $user->decrement('balance', 10);
            });

            $this->saveDocument($userId, $name, $insertId, $paymentStatus);

            return response()->json([
                'status' => 'success',
                'message' => 'Record saved and 10 SAR deducted from balance.',
                'id' => $insertId
            ]);

        } catch (\Throwable $e) {
            $this->saveDocument($userId, $name, $insertId, 'Due');

            return response()->json([
                'status' => 'error',
                'message' => 'Record saved but: ' . $e->getMessage(),
                'id' => $insertId
            ], 200); // ২২০ পাঠানো হয়েছে যাতে রিঅ্যাক্টে এরর শো না করে শুধু মেসেজ দেখায়
        }
    }

    // এডমিন বা অন্যদের জন্য সাধারণ রেসপন্স
  $viewUrl = url("/check/muqeemPaper?id={$insertId}");

return response()->json([
    'status'  => 'success',
    'message' => 'Business record saved successfully. <a href="' . $viewUrl . '" target="_blank" style="color: #2563eb; font-weight: bold; text-decoration: underline; margin-left: 5px;">View Muqeem Paper</a>',
    'id'      => $insertId
]);
     
}

// ডকুমেন্ট সেভ করার জন্য হেল্পার ফাংশন
private function saveDocument($userId, $name, $insertId, $status)
{
    \App\Models\DocumentInfoModel::create([
        'user_id'         => $userId,
        'user_name'       => $name,
        'document_type'   => 'Business Muqeem',
        'document_link'   => 'https://bangladeshistudeo.com/check/muqeemPaper?id=' . $insertId,
        'document_status' => $status,
        'document_id'     => $insertId,
        'payment_amount'  => '10',
    ]);
}

}
