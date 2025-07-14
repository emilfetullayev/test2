<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Imagick;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    public function imageToPdf($imageName)
    {
        $imagePath = public_path('/' . $imageName);

        if (!file_exists($imagePath)) {
            abort(404, 'Şəkil tapılmadı.');
        }

        // PDF-də görünəcək link
        $pdfUrl = route('show.pdf', ['imageName' => $imageName]);

        // QR kodun saxlanacağı yol
        $qrFileName = pathinfo($imageName, PATHINFO_FILENAME) . '.png';
        $qrPath = public_path('qr/' . $qrFileName);

        // Yoxdursa yaradın
        if (!file_exists(public_path('qr'))) {
            mkdir(public_path('qr'), 0755, true);
        }

        // QR kodu PNG şəklində yaradın
        QrCode::format('png')->size(150)->generate($pdfUrl, $qrPath);

        return Pdf::loadView('pdf.image-with-qr', [
            'imagePath' => $imagePath,
            'qrPath' => $qrPath,
        ])->stream(pathinfo($imageName, PATHINFO_FILENAME) . '.pdf');
    }


    public function generateQr($imageName)
    {
        $pdfUrl = route('show.pdf', ['imageName' => $imageName]);

        $svgQrCode = QrCode::format('svg')->size(150)->generate($pdfUrl);

        return view('qr.show', [
            'imageName' => $imageName,
            'svgQrCode' => $svgQrCode,
            'pdfUrl' => $pdfUrl,
        ]);
    }
}
