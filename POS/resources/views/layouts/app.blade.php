<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'POS System')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Navbar */
        nav { 
            background-color: #2c3e50; 
            color: white; 
            padding: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        
        .nav-brand {
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            padding: 15px 0;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 0;
        }
        
        .nav-links a { 
            color: white; 
            text-decoration: none;
            padding: 20px 15px;
            display: block;
            transition: background-color 0.3s;
        }
        
        .nav-links a:hover { 
            background-color: #34495e;
        }
        
        .nav-links a.active {
            background-color: #3498db;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            padding: 30px 20px;
        }
        
        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }
        
        /* Alert */
        .alert { 
            padding: 15px; 
            margin-bottom: 20px; 
            border-radius: 5px; 
        }
        
        .alert-success { 
            background-color: #d4edda; 
            color: #155724; 
            border: 1px solid #c3e6cb; 
        }
        
        .alert-error { 
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb; 
        }
        
        @media (max-width: 768px) {
            .nav-links {
                flex-wrap: wrap;
            }
            
            .nav-links a {
                padding: 15px 10px;
                font-size: 14px;
            }
            
            .main-content {
                padding: 15px 10px;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <a href="/" class="nav-brand">🛒 POS System</a>
            <div class="nav-links">
                <a href="/" class="@if(request()->is('/')) active @endif">🏠 Home</a>
                <a href="/penjualan" class="@if(request()->is('penjualan')) active @endif">📊 Dashboard</a>
                <a href="/transactions" class="@if(request()->is('transactions*')) active @endif">📋 Transaksi</a>
                <a href="/category/food-beverage" class="@if(request()->is('category/*')) active @endif">🛍️ Produk</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @if (session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                ✗ {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 POS System - Pemrograman Web Lanjut 2024</p>
    </footer>
    
    @yield('scripts')
</body>
</html>
