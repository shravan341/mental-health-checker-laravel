<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MHS</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AboutUs CSS -->
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        :root {
            /* Colors */
            --primary: #5B9BD5;
            --primary-light: #7BAEDE;
            --primary-dark: #4A8BC5;
            --secondary: #A8E6CF;
            --secondary-light: #BFEBD9;
            --secondary-dark: #95D6BC;
            --accent: #FF8C94;
            --accent-light: #FFA4AA;
            --accent-dark: #FF747E;
            
            /* Background Colors */
            --background-main: #F9FAFB;
            --background-card: #FFFFFF;
            --background-contrast: #F0F4F8;
            
            /* Text Colors */
            --text-primary: #2C3E50;
            --text-secondary: #596775;
            
            /* Utility Colors */
            --border-color: rgba(0, 0, 0, 0.1);
            --success: #4CAF50;
            --warning: #FFC107;
            --error: #FF5252;
            
            /* Gradients */
            --gradient-primary: linear-gradient(90deg, #5B9BD5 0%, #70C1B3 100%);
            --gradient-secondary: linear-gradient(90deg, #A8E6CF 0%, #5B9BD5 100%);
            
            /* Shadows */
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: var(--background-main);
            color: var(--text-primary);
        }

        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            background-color: var(--background-main);
        }

        /* Navbar Styles */
        .navbar {
            padding: 1rem 0;
            background: var(--background-card) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            position: relative;
            z-index: 1030;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-primary) !important;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 6px;
        }
        
        .nav-link.active {
            background: var(--primary);
            color: var(--background-card) !important;
        }
        
        .dropdown-menu {
            border: none;
            background: var(--background-card);
            box-shadow: var(--shadow-md);
            border-radius: 8px;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            min-width: 200px;
            margin-top: 0.5rem;
            position: absolute;
            right: 0;
            left: auto;
            z-index: 1050;
        }
        
        .nav-item.dropdown {
            position: relative;
        }
        
        .dropdown-item {
            padding: 0.8rem 1rem;
            border-radius: 6px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            white-space: nowrap;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: var(--background-contrast);
            text-decoration: none;
        }

        .dropdown-item i {
            font-size: 1.1rem;
            color: var(--text-secondary);
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            border-radius: 8px;
            background: var(--background-card);
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Button Styles */
        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            border: none;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: var(--background-card);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary {
            background: var(--gradient-secondary);
            color: var(--text-primary);
        }

        /* Card Styles */
        .card {
            background: var(--background-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: var(--success);
            color: var(--background-card);
        }

        .alert-warning {
            background: var(--warning);
            color: var(--text-primary);
        }

        .alert-danger {
            background: var(--error);
            color: var(--background-card);
        }

        /* Footer Styles */
        footer {
            background: var(--background-contrast);
            color: var(--text-secondary);
            border-top: 1px solid var(--border-color);
            padding: 2rem 0;
            margin-top: auto;
        }
        
        @media (max-width: 768px) {
            .navbar-collapse {
                background: var(--background-card);
                padding: 1rem;
                border-radius: 12px;
                box-shadow: var(--shadow-md);
                margin-top: 1rem;
                border: 1px solid var(--border-color);
            }
            
            .nav-link {
                padding: 0.8rem 1rem !important;
            }
        }

        /* Table Styles */
        .table {
            background: var(--background-card);
        }

        .table > thead {
            background: var(--background-contrast);
        }

        /* Section Styles */
        .section-contrast {
            background: var(--background-contrast);
            padding: 2rem 0;
        }

        /* User Profile Button */
        .user-profile-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            background: var(--background-contrast);
            color: var(--text-primary);
            font-weight: 500;
            border: 1px solid var(--border-color);
            cursor: pointer;
            position: relative;
        }

        .user-profile-button i {
            font-size: 1.2rem;
            color: var(--primary);
        }

        .user-profile-button:hover {
            background: var(--background-main);
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <i class="bi bi-heart-pulse-fill me-2"></i>
                    MHS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                    <i class="bi bi-house-door me-1"></i>{{ __('Home') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('assessment.types') ? 'active' : '' }}" href="{{ route('assessment.types') }}">
                                    <i class="bi bi-clipboard-check me-1"></i>{{ __('Assessments') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('assessment.history') ? 'active' : '' }}" href="{{ route('assessment.history') }}">
                                    <i class="bi bi-clock-history me-1"></i>{{ __('Past Assessments') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('support.index') ? 'active' : '' }}" href="{{ route('support.index') }}">
                                    <i class="bi bi-heart me-1"></i>{{ __('Health Support') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('about.index') ? 'active' : '' }}" href="{{ route('about.index') }}">
                                    <i class="bi bi-info-circle me-1"></i>{{ __('About Us') }}
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>{{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">
                                        <i class="bi bi-person-plus me-1"></i>{{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <button id="navbarDropdown" 
                                        class="user-profile-button dropdown-toggle" 
                                        type="button"
                                        data-bs-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    {{ Auth::user()->name }}
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" 
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <footer class="bg-light py-4 mt-5">
            <div class="container text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Mental Health Status (MHS). All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
