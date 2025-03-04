<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Calendar Events')</title>
    <script src="https://unpkg.com/htmx.org@1.9.6"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body { background-color: #ffe6f2; }
        .navbar { background-color: #ff69b4 !important; }
        .navbar-brand, .navbar a { color: #fff !important; }
        .container { max-width: 900px; }
        .card { border-radius: 15px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); background-color: #fff; }
        .btn-pink { background-color: #ff85c0; color: white; }
        .btn-pink:hover { background-color: #ff5a9c; }
        .btn-danger:hover { background-color: #d63384; }
        .alert-success { background-color: #ffb3d9; color: #800040; border-color: #ff85c0; }
    </style>
    @yield('style')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">🎀Calendar Events🎀</a>
            <a href="{{ route('events.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Add Event
            </a>
        </div>
    </nav>

    <!-- Flash Message -->
    <div class="container mt-4">
        <div id="flash-message">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
