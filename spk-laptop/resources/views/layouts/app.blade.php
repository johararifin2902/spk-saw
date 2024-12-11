<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SPK Laptop')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e8f5e9; /* Hijau Muda */
        }

        .sidebar {
            background-color: #81c784; /* Hijau Lebih Cerah */
            color: #fff;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            transition: 0.3s ease-in-out;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .sidebar a {
            color: #1b5e20; /* Hijau Tua */
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s;
            margin-bottom: 10px;
        }

        .sidebar a i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .sidebar a:hover {
            background-color: #66bb6a; /* Hijau Lebih Tua */
            color: white;
            transform: translateX(10px);
        }

        .logout-btn {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 180px;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .card-header {
            background-color: #66bb6a; /* Hijau */
            color: white;
        }

        .btn-primary {
            background-color: #4caf50; /* Hijau */
            border: none;
        }

        .btn-primary:hover {
            background-color: #388e3c; /* Hijau Lebih Gelap */
        }

        .btn-success {
            background-color: #81c784; /* Hijau Lebih Cerah */
            border: none;
        }

        .btn-success:hover {
            background-color: #66bb6a; /* Hijau */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center">SPK Laptop</h4>
        <a href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="{{ route('kriteria.index') }}">
            <i class="fas fa-list"></i> Kriteria
        </a>
        <a href="{{ route('sub_kriteria.index') }}">
            <i class="fas fa-layer-group"></i> Sub-Kriteria
        </a>
        <a href="{{ route('alternatif.index') }}">
            <i class="fas fa-user"></i> Alternatif
        </a>
        <a href="{{ route('matriks.index') }}">
            <i class="fas fa-table"></i> Matriks Keputusan
        </a>
        <a href="{{ route('matriks.normalisasi') }}">
            <i class="fas fa-chart-line"></i> Normalisasi
        </a>
        <a href="{{ route('matriks.ranking') }}">
            <i class="fas fa-trophy"></i> Ranking
        </a>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" class="logout-btn">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
