<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mental Health Status</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4a6cf7;
            --primary-dark: #3a56d4;
            --secondary-color: #4accf0;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f8fafc;
            --transition-base: all 0.3s ease;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .navbar {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95) !important;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            transition: var(--transition-base);
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: var(--transition-base);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(74, 108, 247, 0.2);
        }

        .hero {
            padding: 8rem 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.5;
        }

        .hero h1 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 3.5rem;
        }

        .hero .lead {
            font-size: 1.25rem;
            font-weight: 400;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .feature-box {
            background: white;
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            height: 100%;
            transition: var(--transition-base);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .feature-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }

        .feature-box a {
            text-decoration: none;
            color: var(--text-dark);
        }

        .feature-icon {
            font-size: 2.75rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            transition: var(--transition-base);
            display: inline-block;
        }

        .feature-box:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .feature-box h3 {
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .feature-box p {
            color: var(--text-light);
            margin-bottom: 0;
            font-size: 1.1rem;
        }

        .cta-section {
            background-color: var(--bg-light);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(74, 108, 247, 0.05) 0%, rgba(74, 204, 240, 0.05) 100%);
            z-index: 0;
        }

        .cta-section .container {
            position: relative;
            z-index: 1;
        }

        .cta-section h2 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 2.5rem;
        }

        .cta-section p {
            font-size: 1.2rem;
            color: var(--text-light);
            margin-bottom: 2rem;
        }

        footer {
            background-color: #1a202c;
            color: #fff;
            padding: 4rem 0 2rem;
        }

        footer h5 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #fff;
        }

        footer p {
            color: rgba(255,255,255,0.7);
        }

        @media (max-width: 768px) {
            .hero {
                padding: 6rem 0;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .feature-box {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Mental Health Status</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="btn btn-primary ms-2">Register</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Monitor Your Mental Wellbeing</h1>
            <p class="lead mb-5">Take regular assessments, track your mental health status, and access resources to help you thrive.</p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold">Get Started</a>
            @endif
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">How MHS Can Help You</h2>
                <p class="lead text-muted">Simple tools to understand and improve your mental wellbeing</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box">
                        @auth
                            <a href="{{ route('assessment.types') }}" class="text-decoration-none text-dark">
                                <div class="feature-icon">📊</div>
                                <h3>Self-Assessment</h3>
                                <p>Take quick and easy mental health assessments to gauge your current state of wellbeing.</p>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                                <div class="feature-icon">📊</div>
                                <h3>Self-Assessment</h3>
                                <p>Take quick and easy mental health assessments to gauge your current state of wellbeing.</p>
                            </a>
                        @endauth
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        @auth
                            <a href="{{ route('assessment.history') }}" class="text-decoration-none text-dark">
                                <div class="feature-icon">📈</div>
                                <h3>Progress Tracking</h3>
                                <p>Monitor changes in your mental health over time through your personal dashboard.</p>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                                <div class="feature-icon">📈</div>
                                <h3>Progress Tracking</h3>
                                <p>Monitor changes in your mental health over time through your personal dashboard.</p>
                            </a>
                        @endauth
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        @auth
                            <a href="{{ route('support.index') }}" class="text-decoration-none text-dark">
                                <div class="feature-icon">🧠</div>
                                <h3>Support Resources</h3>
                                <p>Access helpful resources and support options based on your assessment results.</p>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                                <div class="feature-icon">🧠</div>
                                <h3>Support Resources</h3>
                                <p>Access helpful resources and support options based on your assessment results.</p>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Ready to prioritize your mental health?</h2>
            <p class="mb-5">Join thousands of users who are taking control of their mental wellbeing with MHS.</p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 py-3">Create Your Account</a>
            @endif
        </div>
    </section>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Mental Health Status</h5>
                    <p class="small">Empowering individuals to understand and improve their mental wellbeing.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small">&copy; {{ date('Y') }} Mental Health Status. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
