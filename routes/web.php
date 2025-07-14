<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/show-pdf/{imageName}', [PdfController::class, 'imageToPdf'])->name('show.pdf');




Route::get('/generate-qr/{imageName}', [PdfController::class, 'generateQr'])
    ->name('generate.qr');
