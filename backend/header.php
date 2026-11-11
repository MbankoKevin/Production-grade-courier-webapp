<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Freight Center Logistics - Admin Panel</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../fav1.png" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- FontAwesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
        /* Elegant Navbar Styling */
        header.navbar {
            background: linear-gradient(90deg, #0d6efd, #0b5ed7);
        }

        header .navbar-brand img {
            transition: transform 0.3s ease;
        }

        header .navbar-brand img:hover {
            transform: scale(1.05);
        }

        header .nav-link {
            color: #fff !important;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
        }

        header .nav-link::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            left: 50%;
            bottom: -5px;
            background: #ffc107;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        header .nav-link:hover::after {
            width: 60%;
        }

        header .nav-link:hover {
            color: #ffc107 !important;
        }

        /* Mobile menu background */
        .navbar-collapse {
            background: #0b5ed7;
            border-radius: 0.5rem;
            padding: 0.5rem;
        }

        /* Logout button distinct */
        .logout-btn {
            background: #ffc107;
            color: #000 !important;
            border-radius: 30px;
            padding: 6px 14px !important;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .logout-btn:hover {
            background: #e0a800;
            color: #fff !important;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <!-- Header -->
        <header class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
            <div class="container-fluid px-4">
                <!-- Logo -->
                <a href="index.html" class="navbar-brand d-flex align-items-center">
                    <img src="images/logo.png" alt="logo" height="40" class="me-2" />
                    <img src="images/logo-text.png" alt="logo text" height="26" class="d-none d-md-block" />
                </a>

                <!-- Toggle button for mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                    aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
                    <ul class="navbar-nav align-items-center gap-3">
                        <li class="nav-item">
                            <a href="new_tracking.php" class="nav-link"><i class="fas fa-plus-circle me-1"></i> Add Tracking</a>
                        </li>
                        <li class="nav-item">
                            <a href="editmap.php" class="nav-link"><i class="fas fa-map-marker-alt me-1"></i> Edit Map</a>
                        </li>
                        <li class="nav-item">
                            <a href="../track.php" class="nav-link"><i class="fas fa-search me-1"></i> Track Package</a>
                        </li>
                        <li class="nav-item">
                            <a href="../index-4.php" class="nav-link"><i class="fas fa-home me-1"></i> Homepage</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link logout-btn d-flex align-items-center">
                                <i class="fas fa-power-off me-1"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Bootstrap 5 JS Bundle (Popper + Bootstrap JS) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
