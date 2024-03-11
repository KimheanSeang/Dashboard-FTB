<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Text File</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px 250px 50px 250px;
            line-height: 1.6;

            font-size: 20px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        p {
            margin-bottom: 10px;
            /* Add margin between paragraphs */
        }

        h1 {
            font-size: 24px;
            /* Adjust heading font size */
            margin-bottom: 20px;
            /* Add margin below heading */
        }

        h2 {
            font-size: 20px;
            /* Adjust sub-heading font size */
            margin-bottom: 15px;
            /* Add margin below sub-heading */
        }

        h3 {
            font-size: 18px;
            /* Adjust sub-sub-heading font size */
            margin-bottom: 15px;
            /* Add margin below sub-sub-heading */
        }

        ul,
        ol {
            margin-bottom: 15px;
            /* Add margin below lists */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            /* Make tables occupy full width */
            margin-bottom: 15px;
            /* Add margin below tables */
        }

        th,
        td {
            border: 1px solid #ddd;
            /* Add border to table cells */
            padding: 8px;
            /* Add padding to table cells */
            text-align: left;
            /* Align table cell text to left */
        }

        th {
            background-color: #f2f2f2;
            /* Add background color to table header */
        }
    </style>
</head>

<body>
    <div>
        <pre>{{ $fileContents }}</pre>
    </div>
</body>

</html>
