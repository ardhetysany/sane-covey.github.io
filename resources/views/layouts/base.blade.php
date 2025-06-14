<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdf6f0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #4E1F00;">
        <div class="container">
            <a class="navbar-brand text-white" href="#">ToDo App</a>
        </div>
    </nav>

    <div class="py-4">
        @yield('content')
    </div>

</body>
</html>
