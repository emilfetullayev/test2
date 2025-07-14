<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Şəkil və QR Kod PDF</title>
    <style>
        body {
            margin: 0; padding: 0; position: relative;
        }
        .container {
            position: relative;
            width: 100%;
        }
        img.main-image {
            width: 100%;
            height: auto;
            display: block;
        }
        .qr-code {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="container" style="position: relative;">
    <img src="{{ 'file://' . public_path('/' . $image) }}" alt="Şəkil" class="main-image">
    <img src="{{ '/' . $svgQrCode }}" alt="QR Kod" class="qr-code">
</div>
</body>
</html>
