<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNS - Módulos CRUD Laravel 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-uns { background-color: #8B0000 !important; }
        .text-uns { color: #8B0000 !important; }
        .btn-uns { background-color: #8B0000; color: #fff; }
        .btn-uns:hover { background-color: #A61C1C; color: #fff; }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-uns shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('estudiantes.index') }}">
                UNIVERSIDAD NACIONAL DEL SANTA &bull; EPISI
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active fw-bold' : '' }}"
                   href="{{ route('estudiantes.index') }}">Estudiantes</a>
                <a class="nav-link {{ request()->routeIs('cursos.*') ? 'active fw-bold' : '' }}"
                   href="{{ route('cursos.index') }}">Cursos</a>
                <a class="nav-link {{ request()->routeIs('docentes.*') ? 'active fw-bold' : '' }}"
                   href="{{ route('docentes.index') }}">Docentes</a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <strong>Operación Exitosa:</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>