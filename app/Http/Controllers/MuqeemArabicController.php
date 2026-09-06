<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuqeemArabic;

class MuqeemArabicController extends Controller
{
    public function showMuqeemArabic(Request $request)
    {
        $id = $request->input("id");
        $record = MuqeemArabic::where('id',$id)->first();
        return view('dashboard.muqeem.view-Muqeem.muqeem-arabic', compact('record'));
    }

    public function muqeemArabicSubmit(Request $request)
{
    $validated = $request->validate([
        'reportDate'            => 'required|string',
        'operatorId'            => 'required|string',
        'location'              => 'required|string',
        'iqamaNumber'           => 'required|string',
        'versionNumber'         => 'required|string',
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

    $userId   = $validated['user_id']  ?? null;
    $userRole = $validated['user_roll'] ?? null;
    $name     = $validated['name'];

    // মূল Arabic Muqeem record save
    $record   = MuqeemArabic::create($validated);
    $insertId = $record->id;

    /*
    |--------------------------------------------------------------------------
    | USER হলে Payment + DocumentInfo
    |--------------------------------------------------------------------------
    */
    if ($userId && $userRole === 'user') {

        $paymentStatus = "paid";

        try {
            \DB::transaction(function () use ($userId, &$paymentStatus) {

                $user = \App\Models\Custom_userModel::lockForUpdate()->find($userId);

                if (! $user) {
                    throw new \RuntimeException('User not found.');
                }

                // যদি ব্যালেন্স কম হয়
                if ((float) $user->balance < 10) {
                    $paymentStatus = "Due";
                    throw new \RuntimeException('Insufficient balance.');
                }

                // ব্যালেন্স 10 কমানো
                $user->decrement('balance', 10);
            });

            // ✅ Document Info তৈরি
            \App\Models\DocumentInfoModel::create([
                'user_id'         => $userId,
                'user_name'       => $name,
                'document_type'   => 'Muqeem Arabic',
                'document_link'   => 'muqeemArabic?id=' . $insertId,
                'document_status' => $paymentStatus,   // paid / Due
                'document_id'     => $insertId,
                'payment_amount'  => '10',
            ]);

            return response()->json([
    'status' => 'success',
    'message' => 'Muqeem Arabic record saved successfully! <a href="muqeemArabic?id=' . $insertId . '" target="_blank" style="color: #2563eb; font-weight: bold; text-decoration: underline; margin-left: 5px;">View Muqeem Arabic</a>',
    'newMuqeemId' => $insertId
], 200);

        } catch (\Throwable $e) {

            // ব্যালেন্স না কাটা গেলেও Document Info সংরক্ষণ (Due হিসেবে)
            \App\Models\DocumentInfoModel::create([
                'user_id'         => $userId,
                'user_name'       => $name,
                'document_type'   => 'Muqeem Arabic',
                'document_link'   => 'muqeemArabic?id=' . $insertId,
                'document_status' => 'Due',
                'document_id'     => $insertId,
                'payment_amount'  => '10',
            ]);

            return response()->json([
    'status' => 'success',
    'message' => 'Muqeem Arabic record saved successfully!! <a href="muqeemArabic?id=' . $insertId . '" target="_blank" style="color: #2563eb; font-weight: bold; text-decoration: underline; margin-left: 5px;">View Muqeem Arabic</a>',
    'newMuqeemId' => $insertId
], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | BUSINESS / অন্য role (কোনো payment নাই)
    |--------------------------------------------------------------------------
    */
    return response()->json([
    'status' => 'success',
    'message' => 'Record saved!!! <a href="'.url("/muqeemArabic?id={$insertId}").'" target="_blank" style="...">View</a>',
    'newMuqeemId' => $insertId
], 200);
}

}
