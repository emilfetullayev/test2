<!DOCTYPE html>
<html>
<head>
    <title>Şəkil və QR Kod (SVG)</title>
</head>
<body>


<style>
    .image-container {
        position: relative;
        display: inline-block;
        width: 400px; /* şəkilin eni */
    }

    .image-container img.main-image {
        height: auto;
        display: block;
    }

    .image-container .qr-code {
        position: absolute;
        bottom: 10px;  /* şəkilin altından 10px məsafədə */
        right: 10px;   /* şəkilin sağından 10px məsafədə */
        width: 20px;  /* qr kodun ölçüsü */
        cursor: pointer;
    }
</style>

<div class="image-container">

<!-- Əsas şəkil -->
<img src="{{ asset('/' . $imageName) }}" alt="Şəkil" style="width: 400px; display: block; margin-bottom: 20px;">

<!-- SVG QR kodu -->
<div class="qr-code" style="width: 150px; cursor: pointer;" onclick="window.open('{{ $pdfUrl }}', '_blank')">
    {!! $svgQrCode !!}
</div>
</div>
<p>QR kodu telefonla skan edin və ya üzərinə klikləyin.</p>

</body>
</html>
