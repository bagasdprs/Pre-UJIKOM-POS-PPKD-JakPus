<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>POS Apps | Dashboard</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #f8fafc;">
    <div id="root"></div>

    <script src="{{ asset('js/app.js') }}"></script>  <!-- ini React App.js kamu -->
</body>
</html>
