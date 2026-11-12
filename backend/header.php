<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_header_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Freight Center Logistics - Admin Panel</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../fav1.png" />

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://jsdelivr.net" rel="stylesheet" />

    <!-- FontAwesome 6.5.0 -->
    <link href="https://cloudflare.com" rel="stylesheet" />

    <style>
        /* Global Dashboard Canvas */
        body {
            background-color: #f8f9fa;
            color: #212529;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* Elegant Navbar Styling */
        header.navbar {
            background: linear-gradient(90deg, #0d6efd 0%, #0a58ca 100%);
            box-shadow: 0 2px 10px rgba(13, 110, 253, 0.18);
            padding-top: 0.65rem;
            padding-bottom: 0.65rem;
            z-index: 1030;
        }

        header .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.3px;
            color: #ffffff !important;
        }

        header .navbar-brand img {
            transition: transform 0.25s ease;
        }

        header .navbar-brand img:hover {
            transform: scale(1.04);
        }

        header .nav-link {
            color: rgba(255, 255, 255, 0.92) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 0.9rem !important;
            position: relative;
            transition: color 0.25s ease;
        }

        header .nav-link::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            left: 50%;
            bottom: 2px;
            background: #ffc107;
            border-radius: 2px;
            transition: width 0.25s ease;
            transform: translateX(-50%);
        }

        header .nav-link:hover::after,
        header .nav-link.active::after {
            width: 65%;
        }

        header .nav-link:hover,
        header .nav-link.active {
            color: #ffc107 !important;
        }

        /* Mobile Menu Dropdown Styling */
        @media (max-width: 991.98px) {
            header .navbar-collapse {
                background: #0a58ca;
                border: 1px solid rgba(255, 255, 255, 0.12);
                border-radius: 0.5rem;
                padding: 0.75rem 1rem;
                margin-top: 0.65rem;
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
            }

            header .nav-link::after {
                display: none;
            }
        }

        /* Distinct Logout Pill Button */
        .logout-btn {
            background: #ffc107;
            color: #1a1d20 !important;
            border-radius: 50px;
            padding: 6px 18px !important;
            font-weight: 600;
            font-size: 0.875rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            transition: all 0.25s ease;
        }

        .logout-btn::after {
            display: none !important;
        }

        .logout-btn:hover {
            background: #ffca2c;
            color: #000000 !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Matching Sidebar Navigation Links */
        aside .nav-link,
        .offcanvas .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 0.65rem 1.25rem;
            border-radius: 0.375rem;
            margin: 0.15rem 0.75rem;
            transition: all 0.2s ease;
        }

        aside .nav-link:hover,
        .offcanvas .nav-link:hover {
            background-color: rgba(13, 110, 253, 0.08);
            color: #0d6efd;
        }

        aside .nav-link.active,
        .offcanvas .nav-link.active {
            background-color: rgba(13, 110, 253, 0.12);
            color: #0d6efd;
            font-weight: 600;
        }

        /* Subtle KPI Card Hover Lift */
        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.07) !important;
        }
    </style>
</head>

<body>
    <div id="main-wrapper">
        <!-- Top Navbar -->
        <header class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
            <div class="container-fluid px-3 px-md-4">
                <div class="d-flex align-items-center gap-2">
                    <!-- Mobile Sidebar Drawer Toggle -->
                    <button class="btn btn-outline-light btn-sm d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-label="Toggle sidebar">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Logo -->
                    <a href="home.php" class="navbar-brand d-flex align-items-center mb-0">
                        <img src="images/logo.png" alt="logo" height="38" class="me-2" />
                        <img src="images/logo-text.png" alt="logo text" height="24" class="d-none d-sm-block" />
                    </a>
                </div>

                <!-- Top Navbar Collapse Button (Mobile) -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                    aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle top links">
                    <i class="fas fa-ellipsis-v text-white"></i>
                </button>

                <!-- Top Navbar Quick Links -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
                    <ul class="navbar-nav align-items-lg-center gap-2 gap-lg-3 mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a href="new_tracking.php" class="nav-link <?= $current_header_page === 'new_tracking.php' ? 'active' : '' ?>">
                                <i class="fas fa-plus-circle me-1"></i> Add Tracking
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="editmap.php" class="nav-link <?= $current_header_page === 'editmap.php' ? 'active' : '' ?>">
                                <i class="fas fa-map-marker-alt me-1"></i> Edit Map
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../track.php" class="nav-link">
                                <i class="fas fa-search me-1"></i> Track Package
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index-4.php" class="nav-link">
                                <i class="fas fa-home me-1"></i> Homepage
                            </a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a href="logout.php" class="nav-link logout-btn d-inline-flex align-items-center">
                                <i class="fas fa-power-off me-1"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>