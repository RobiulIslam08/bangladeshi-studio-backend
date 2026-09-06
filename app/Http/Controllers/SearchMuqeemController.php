<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuqeemModel;
use App\Models\Business;
use App\Models\MuqeemArabic;
use App\Models\MuqeemEnglishModel;

class SearchMuqeemController extends Controller
{
    public function searchMuqeem(Request $request)
    {
        $tableName = $request->muqeem_table_name;
        $infoType = $request->info_type;
        $infoValue = $request->info;

        $resultData = null;
        $checkLink = "";

        switch ($tableName) {
            case 'MuqeemModel':
                $resultData = MuqeemModel::where($infoType, $infoValue)->first();
                // এখানে শুধু এন্ডপয়েন্টের নাম দিন
                $checkLink = "checkMuqeem/"; 
                break;

            case 'MuqeemEnglishModel':
                $resultData = MuqeemEnglishModel::where($infoType, $infoValue)->first();
                $checkLink = "muqeemEnglishCheck?id=";
                break;

            case 'MuqeemArabic':
                $resultData = MuqeemArabic::where($infoType, $infoValue)->first();
                $checkLink = "muqeemArabic?id="; 
                break;

            case 'Business':
                $resultData = Business::where($infoType, $infoValue)->first();
                $checkLink = "check/muqeemPaper?id=";
                break;

            default:
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Muqeem Type selected.'
                ]);
        }

        if ($resultData) {
            return response()->json([
                'status' => 'success',
                'resultData' => $resultData,
                'checkLink' => $checkLink
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'No record found.'
        ]);
    }
}