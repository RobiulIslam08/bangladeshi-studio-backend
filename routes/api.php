<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\SDPNController;
use App\Http\Controllers\Muqeem;
use App\Http\Controllers\muqeemEnglishController;
use App\Http\Controllers\MuqeemArabicController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\documentController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\SearchMuqeemController;

Route::get('/ping', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'API working',
    ]);
});

Route::get('/agents', [UserRegisterController::class, 'index']);

Route::post('/sdpnStorageData', [SDPNController::class, 'store'])->name('sdpn.store');

Route::post('/searchImage', [SDPNController::class, 'search']);

Route::get('/download-image', function (Illuminate\Http\Request $request) {
    $path = public_path('uploads/images/' . $request->file);
    if (file_exists($path)) {
        return response()->download($path);
    }
    return abort(404);
});

//

Route::post('/storeInfo', [Muqeem::class, 'store']);

Route::get('/checkMuqeem', [muqeem::class, 'checkMuqeem']);

Route::get('/muqeemEnglishCheck', [muqeemEnglishController::class, 'muqeemEnglishCheck']);

Route::post('/muqeemEnglishUserSubmit', [muqeemEnglishController::class, 'muqeemEnglishSubmit']);

Route::post('/muqeemArabicSubmit', [MuqeemArabicController::class, 'muqeemArabicSubmit']);

Route::post('submitMuqeemBusiness', [BusinessController::class, 'store']);

//
Route::post('/visaStore', [VisaController::class, 'visaStore']);

Route::get('/visaCheck', [VisaController::class, 'visaCheck']);


// 
// Query parameter style (example.com/api/documents/search?iqama=123)
Route::post('documentsSearch', [documentController::class, 'searchData']);

Route::post('/documents/upload', [DocumentController::class, 'storeDocuments']);


 Route::post('/insertReportData', [MedicalController::class, 'store']);

 Route::get('/getLatestFileNo', [MedicalController::class, 'getLatestId']);

 Route::post('/searchMedicalReport', [MedicalController::class, 'search']);
 Route::post('/searchMuqeem', [SearchMuqeemController::class, 'searchMuqeem']);

 Route::post('/addBalance', [UserRegisterController::class, 'addBalance']);


//  Auth

 Route::post('/login', [UserRegisterController::class, 'login']);
 Route::post('/register', [UserRegisterController::class, 'customRegister']);
 Route::post('/updateStatus', [UserRegisterController::class, 'updateStatus']);

 
