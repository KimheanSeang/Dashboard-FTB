<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
    <title>View PDF</title>
    <!-- Include a PDF viewer library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

</head>

<body>
    <!-- Embedded PDF viewer -->
    <div style="width: 100%; height: 100vh;">
        <iframe src="data:application/pdf;base64,{{ $fileContents }}" style="width: 100%; height: 100%;"
            frameborder="0"></iframe>

    </div>
</body>

</html>
