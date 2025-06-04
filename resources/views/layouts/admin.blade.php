<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'BeeswaxApp') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #537856;
            --secondary: #ffcf7b;
            --accent: #719b74;
            --white: #ffffff;
            --light: #f8f9fa;
            --dark: #2d3436;
            --shadow: rgba(83, 120, 86, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--light) 0%, #e8f5e8 100%);
            min-height: 100vh;
        }

        /* Topbar Styles */
        .topbar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            padding: 1rem 2rem;
            box-shadow: 0 4px 20px var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .topbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--white);
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
        }

        .logo i {
            font-size: 2rem;
            color: var(--secondary);
        }

        .topbar-nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: var(--white);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--white);
            position: relative;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .user-info:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--primary);
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 10px 30px var(--shadow);
            padding: 0.5rem 0;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .user-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.75rem 1.5rem;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--light);
        }

        .dropdown-item i {
            width: 16px;
            color: var(--primary);
        }

        .dropdown-divider {
            height: 1px;
            background: #eee;
            margin: 0.5rem 0;
        }

        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .topbar {
                padding: 1rem;
            }

            .topbar-nav {
                display: none;
            }

            .main-content {
                padding: 1rem;
            }

            .user-name {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    @yield('content')

    <script>
        // User dropdown toggle
        document.addEventListener('DOMContentLoaded', function() {
            const userInfo = document.querySelector('.user-info');
            const userDropdown = document.querySelector('.user-dropdown');

            if (userInfo && userDropdown) {
                userInfo.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userDropdown.classList.toggle('show');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function() {
                    userDropdown.classList.remove('show');
                });

                // Prevent dropdown from closing when clicking inside
                userDropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>