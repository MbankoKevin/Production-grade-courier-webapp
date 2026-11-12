<?php include 'header.php'; ?>

<div class="container-fluid bg-light min-vh-100">
    <div class="row">
        <!-- Mobile Top Navigation Bar -->
        <div class="col-12 d-md-none bg-white border-bottom py-2 px-3 d-flex justify-content-between align-items-center shadow-sm">
            <span class="fw-bold text-primary">Freight Center Admin</span>
            <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                <i class="fas fa-bars me-1"></i> Menu
            </button>
        </div>

        <!-- Mobile Offcanvas Sidebar -->
        <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title fw-bold text-primary" id="sidebarMenuLabel">Navigation</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <?php include 'sidebar.php'; ?>
            </div>
        </div>

        <!-- Static Sticky Sidebar for Desktop -->
        <aside class="d-none d-md-block col-md-3 col-lg-2 bg-white border-end min-vh-100 p-0 shadow-sm">
            <div class="position-sticky top-0 pt-3">
                <?php include 'sidebar.php'; ?>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="col-md-9 col-lg-10 px-3 px-md-4 py-4">
            <!-- Page Header & Breadcrumb -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center pb-3 mb-4 border-bottom">
                <div>
                    <h1 class="h3 fw-bold text-dark mb-1">Dashboard Overview</h1>
                    <p class="text-muted small mb-0">Monitor active shipments, delivery statuses, and tracking records.</p>
                </div>
                <nav aria-label="breadcrumb" class="mt-2 mt-sm-0">
                    <ol class="breadcrumb mb-0 bg-white px-3 py-2 rounded border small">
                        <li class="breadcrumb-item"><a href="home.php" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>

            <!-- KPI Stat Cards -->
            <div class="row g-3 g-md-4 mb-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="card border-0 shadow-sm h-100 border-start border-primary border-4">
                        <div class="card-body d-flex justify-content-between align-items-center p-4">
                            <div>
                                <span class="text-uppercase text-muted fw-semibold small d-block mb-1">Total Shipments</span>
                                <h2 class="display-6 fw-bold text-dark mb-0">0</h2>
                            </div>
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                                <i class="fas fa-boxes fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="card border-0 shadow-sm h-100 border-start border-warning border-4">
                        <div class="card-body d-flex justify-content-between align-items-center p-4">
                            <div>
                                <span class="text-uppercase text-muted fw-semibold small d-block mb-1">Pending Deliveries</span>
                                <h2 class="display-6 fw-bold text-dark mb-0">0</h2>
                            </div>
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                                <i class="fas fa-truck-loading fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-4">
                    <div class="card border-0 shadow-sm h-100 border-start border-success border-4">
                        <div class="card-body d-flex justify-content-between align-items-center p-4">
                            <div>
                                <span class="text-uppercase text-muted fw-semibold small d-block mb-1">Completed</span>
                                <h2 class="display-6 fw-bold text-dark mb-0">131</h2>
                            </div>
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                                <i class="fas fa-check-circle fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tracking Records Table Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 px-4 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 border-bottom">
                    <div>
                        <h5 class="card-title fw-bold text-dark mb-0">Recent Tracking Records</h5>
                        <small class="text-muted">Manage and update customer shipment details</small>
                    </div>
                    <a href="add_shipment.php" class="btn btn-primary btn-sm px-3">
                        <i class="fas fa-plus me-1"></i> New Shipment
                    </a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light text-muted small text-uppercase">
                                <tr>
                                    <th class="ps-4 py-3">Tracking ID</th>
                                    <th class="py-3">Receiver Name</th>
                                    <th class="py-3">Pickup Location</th>
                                    <th class="py-3">Delivery Date</th>
                                    <th class="py-3">Status</th>
                                    <th class="text-end pe-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP dynamic rows here -->
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fas fa-box-open fa-2x mb-2 d-block opacity-50"></i>
                                        No shipment records found yet.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<?php include 'footer.php'; ?>