<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Excel File</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
    <style>
        table {
            margin: 50px;
            border-collapse: collapse;
            width: 94%;
        }

        table,
        th,
        td {

            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div>
        {!! $htmlContents !!}
    </div>
</body>

</html>
