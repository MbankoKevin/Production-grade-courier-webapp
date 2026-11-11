<?php include 'header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Mobile Hamburger Toggle -->
        <div class="d-md-none mb-3">
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <i class="fas fa-bars"></i> Menu
            </button>
        </div>

        <!-- Static Sidebar for Desktop -->
        <div class="d-none d-md-block col-md-3 col-lg-2 bg-light vh-100 border-end">
            <?php include 'sidebar.php'; ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 py-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 text-primary">Dashboard</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 bg-transparent p-0 small">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>

            <!-- Example Dashboard Cards -->
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">Total Shipments</h5>
                            <p class="card-text display-6 text-primary">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">Pending Deliveries</h5>
                            <p class="card-text display-6 text-warning">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">Completed</h5>
                            <p class="card-text display-6 text-success">131</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="card shadow-sm mt-4 border-0">
                <div class="card-body">
                    <h4 class="card-title mb-3">Tracking Records</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Tracking ID</th>
                                    <th>Receiver Name</th>
                                    <th>Pickup Location</th>
                                    <th>Delivery Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP dynamic rows here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
