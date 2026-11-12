<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="d-flex flex-column h-100 py-3">
    <!-- Brand / Section Label -->
    <div class="px-4 pb-3 mb-3 border-bottom d-none d-md-flex align-items-center gap-2">
        <span class="bg-primary text-white rounded-2 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
            <i class="fas fa-shipping-fast fa-sm"></i>
        </span>
        <span class="fw-bold text-dark tracking-tight">Cargo Control</span>
    </div>

    <!-- Navigation Links -->
    <ul class="nav flex-column mb-auto">
        <li class="nav-item">
            <a href="home.php" class="nav-link d-flex align-items-center gap-3 <?= $current_page === 'home.php' ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt fa-fw"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item mt-3 mb-1 px-4">
            <small class="text-uppercase text-muted fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.08em;">Shipments</small>
        </li>
        <li class="nav-item">
            <a href="new_tracking.php" class="nav-link d-flex align-items-center gap-3 <?= $current_page === 'new_tracking.php' ? 'active' : '' ?>">
                <i class="fas fa-truck fa-fw"></i>
                <span>New Tracking</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="view_tracking.php" class="nav-link d-flex align-items-center gap-3 <?= $current_page === 'view_tracking.php' ? 'active' : '' ?>">
                <i class="fas fa-list-ul fa-fw"></i>
                <span>View Tracking</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="editmap.php" class="nav-link d-flex align-items-center gap-3 <?= $current_page === 'editmap.php' ? 'active' : '' ?>">
                <i class="fas fa-map-marker-alt fa-fw"></i>
                <span>Edit Map</span>
            </a>
        </li>

        <li class="nav-item mt-3 mb-1 px-4">
            <small class="text-uppercase text-muted fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.08em;">Administration</small>
        </li>
        <li class="nav-item">
            <a href="add_user.php" class="nav-link d-flex align-items-center gap-3 <?= $current_page === 'add_user.php' ? 'active' : '' ?>">
                <i class="fas fa-user-plus fa-fw"></i>
                <span>New User</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="view_user.php" class="nav-link d-flex align-items-center gap-3 <?= $current_page === 'view_user.php' ? 'active' : '' ?>">
                <i class="fas fa-users fa-fw"></i>
                <span>View Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="mail.php" class="nav-link d-flex align-items-center gap-3 <?= $current_page === 'mail.php' ? 'active' : '' ?>">
                <i class="fas fa-envelope fa-fw"></i>
                <span>Mail Jk</span>
            </a>
        </li>
    </ul>

    <!-- Bottom Logout Action -->
    <div class="px-3 pt-3 mt-4 border-top">
        <a href="logout.php" class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-2">
            <i class="fas fa-sign-out-alt"></i>
            <span>Sign Out</span>
        </a>
    </div>
</div>