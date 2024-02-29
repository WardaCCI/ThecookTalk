<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        .card {
            margin-top: 50px; /* Espacement depuis le haut */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card {
            
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
