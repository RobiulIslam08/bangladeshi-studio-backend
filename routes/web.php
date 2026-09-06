<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Muqeem;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\muqeemEnglishController;
use App\Http\Controllers\MuqeemArabicController;
use App\Http\Controllers\BusinessController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkMuqeem/{id}', [Muqeem::class, 'checkMuqeem'])->name('checkMuqeem');

// medical
 Route::get('/checkReport', [MedicalController::class, 'checkReport']);
 Route::get('/checkReport/{id}/download', [MedicalController::class, 'download'])->name('report.download');

//  
Route::get('/visaCheck', [VisaController::class, 'visaCheck'])->name('visaCheck');

// 
Route::get('/muqeemEnglishCheck', [muqeemEnglishController::class, 'muqeemEnglishCheck']);

Route::get('/muqeemArabic', [MuqeemArabicController::class, 'showMuqeemArabic']);

// 
Route::get('/check/muqeemPaper', [BusinessController::class, 'muqeemPaper']);
