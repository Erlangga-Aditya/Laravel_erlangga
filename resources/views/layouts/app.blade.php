<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Informasi Mahasiswa')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #1e3a8a;  /* Deep Royal Blue */
            --secondary-color: #3b82f6; /* Modern Sky Blue */
            --success-color: #059669;   /* Emerald Green */
            --danger-color: #dc2626;    /* Deep Red */
            --warning-color: #d97706;   /* Rich Amber */
            --info-color: #2563eb;      /* Bright Blue */
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F9FAFB;
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 5px;
            border-radius: 6px;
            padding: 8px 16px !important;
        }
        
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white !important;
        }
        
        .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            color: white !important;
        }
        
        .content-wrapper {
            padding: 30px 0;
            min-height: calc(100vh - 160px);
        }
        
        .page-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--primary-color);
        }
        
        .page-header h1 {
            color: #1F2937;
            font-weight: 700;
            font-size: 2rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            font-weight: 500;
            padding: 10px 24px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .card-header {
            background-color: #F3F4F6;
            border-bottom: 2px solid var(--primary-color);
            font-weight: 600;
            border-radius: 12px 12px 0 0 !important;
        }
        
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: #F3F4F6;
            transform: scale(1.01);
        }
        
        .footer {
            background-color: #1F2937;
            color: white;
            padding: 20px 0;
            margin-top: auto;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.875rem;
        }
        
        .badge {
            padding: 6px 12px;
            font-weight: 500;
        }
        
        /* Animation for alerts */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert {
            animation: slideDown 0.3s ease;
        }

        /* Cursor Follower Effect */
        /* Custom Cursor Guide */
        .cursor-dot,
        .cursor-follower {
            position: fixed;
            top: 0;
            left: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            z-index: 9999;
            pointer-events: none;
        }

        @keyframes flicker {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            50% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.8; }
            100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }

        .cursor-dot {
            width: 12px;
            height: 12px;
            background: radial-gradient(circle, #fbbf24 0%, #ef4444 100%); /* Yellow to Red */
            box-shadow: 
                0 0 10px #f59e0b,
                0 0 20px #dc2626,
                0 0 30px #b91c1c; /* Layered fire glow */
            animation: flicker 0.1s infinite alternate; /* Fast flickering */
        }

        .cursor-follower {
            width: 40px;
            height: 40px;
            border: 2px solid rgba(245, 158, 11, 0.5); /* Orange border */
            background: rgba(220, 38, 38, 0.1); /* Faint red background */
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.4);
            transition: transform 0.1s ease-out, background-color 0.2s, width 0.3s, height 0.3s;
            mix-blend-mode: screen;
        }

        .cursor-active {
            width: 70px;
            height: 70px;
            background: rgba(220, 38, 38, 0.2);
            box-shadow: 0 0 50px rgba(245, 158, 11, 0.8);
            border: 2px solid rgba(251, 191, 36, 0.6);
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Cursor Elements -->
    <div id="cursor-dot" class="cursor-dot"></div>
    <div id="cursor-follower" class="cursor-follower"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-mortarboard-fill me-2"></i>
                Sisfo Decode
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                            <i class="bi bi-house-fill me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('study-programs*') ? 'active' : '' }}" href="{{ url('/study-programs') }}">
                            <i class="bi bi-book-fill me-1"></i> Program Studi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="{{ url('/students') }}">
                            <i class="bi bi-people-fill me-1"></i> Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('subjects*') ? 'active' : '' }}" href="{{ url('/subjects') }}">
                            <i class="bi bi-journal-text me-1"></i> Mata Kuliah
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            <!-- Content Section -->
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container text-center">
            <p class="mb-0">
                <i class="bi bi-code-slash"></i> 
                Sisfo Decode 2026
            </p>
            <p class="mb-0 mt-2 text-muted">
                <small>Built with <i class="bi bi-heart-fill text-danger"></i> using Laravel & Bootstrap</small>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (includes Popper) -->  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Delete Confirmation Script -->
    <script>
        // Custom Cursor Logic
        document.addEventListener('DOMContentLoaded', function() {
            const cursorDot = document.getElementById('cursor-dot');
            const cursorFollower = document.getElementById('cursor-follower');
            
            let mouseX = 0;
            let mouseY = 0;
            let followerX = 0;
            let followerY = 0;

            document.addEventListener('mousemove', function(e) {
                mouseX = e.clientX;
                mouseY = e.clientY;
                
                // Dot moves instantly
                cursorDot.style.left = mouseX + 'px';
                cursorDot.style.top = mouseY + 'px';
            });

            // Smooth follower animation
            function animateFollower() {
                // Linear interpolation (Lerp) for smooth trailing
                followerX += (mouseX - followerX) * 0.1;
                followerY += (mouseY - followerY) * 0.1;

                cursorFollower.style.left = followerX + 'px';
                cursorFollower.style.top = followerY + 'px';

                requestAnimationFrame(animateFollower);
            }
            animateFollower();

            // Hover effects
            const clickableElements = document.querySelectorAll('a, button, .btn, input, select, textarea, .card');
            
            clickableElements.forEach(el => {
                el.addEventListener('mouseenter', () => {
                    cursorFollower.classList.add('cursor-active');
                    cursorDot.style.opacity = '0'; // Hide dot when hovering actionable items
                });
                
                el.addEventListener('mouseleave', () => {
                    cursorFollower.classList.remove('cursor-active');
                    cursorDot.style.opacity = '1';
                });
            });

            // Hide default cursor
            document.body.style.cursor = 'none';
        });

        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        function confirmDelete(formId) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.')) {
                document.getElementById(formId).submit();
            }
            return false;
        }
    </script>
    
    @yield('scripts')
</body>
</html>
