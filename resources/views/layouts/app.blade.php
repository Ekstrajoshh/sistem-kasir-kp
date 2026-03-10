<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Cafe POS') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9F5EB;
        }
        .sidebar {
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background: #3C2A21;
            color: #EAE3D2;
            z-index: 1000;
            transition: all 0.3s;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
            transition: all 0.3s;
        }
        .nav-link {
            color: #D5CEA3;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 15px;
            transition: 0.2s;
        }
        .nav-link:hover, .nav-link.active {
            background: #5F4033;
            color: #ffffff;
        }
        .nav-link i {
            font-size: 1.2rem;
        }
        .brand {
            padding: 25px 20px;
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .card-cafe {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        @media (max-width: 992px) {
            .sidebar {
                left: -260px;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="brand">
            <i class="bi bi-cup-hot-fill"></i>
            <span>Cafe POS</span>
        </div>
        <nav class="nav flex-column">
            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Kategori
            </a>
            <a href="{{ route('menus.index') }}" class="nav-link {{ request()->routeIs('menus.*') ? 'active' : '' }}">
                <i class="bi bi-menu-button-wide"></i> Menu
            </a>
            <a href="{{ route('tables.index') }}" class="nav-link {{ request()->routeIs('tables.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-check"></i> Meja
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-cart3"></i> Transaksi
            </a>
            <hr class="mx-3 border-secondary">
            <a href="#" class="nav-link text-danger mt-auto">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </nav>
    </div>

    <div class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn d-lg-none" id="sidebarToggle">
                <i class="bi bi-list fs-3"></i>
            </button>
            <div>
                <h4 class="fw-bold mb-0 text-dark">Selamat Datang!</h4>
                <small class="text-muted">{{ date('d M Y') }}</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <p class="mb-0 fw-semibold">Admin Kasir</p>
                    <small class="text-muted">Manager</small>
                </div>
                <img src="https://ui-avatars.com/api/?name=Admin+Kasir&background=3C2A21&color=fff" class="rounded-circle" width="45" alt="Avatar">
            </div>
        </header>

        @yield('content')
    </div>

    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
