<?php 
include 'header.php'; 
include 'backend/conn.php'; 
?>

<style>
/* Page Styling */
body {
    background: #f4f6f9;
    margin-top: 25px;
}

/* Section Headings */
.page-title h2 {
    font-weight: 700;
    color: #0d6efd;
}

.page-title p {
    color: #6c757d;
    font-size: 1rem;
    margin-top: 30px;
}

/* Form Styling */
.tracking-form {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    margin: 25px;
    
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.tracking-form input {
    border-radius: 8px;
}
.tracking-form button {
    border-radius: 8px;
    font-weight: 500;
    margin-top: 15px;
}

/* Card Styling */
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.card-header {
    font-weight: 600;
    font-size: 1.5rem;
    padding: 12px;
}
.card-body p {
    margin-bottom: 8px;
    font-size: 1.5rem;
    color: #444;
}

/* Badge for status */
.badge-status {
    font-size: 0.95rem;
    padding: 8px 15px;
    border-radius: 30px;
}

/* Timeline */
.timeline {
    position: relative;
    margin: 30px 0;
    padding-left: 30px;
    font-size: 1.5rem;
}
.timeline::before {
    content: "";
    position: absolute;
    top: 0;
    left: 15px;
    width: 3px;
    height: 100%;
    background: #dee2e6;
    border-radius: 2px;
}
.timeline-step {
    position: relative;
    margin-bottom: 25px;
}
.timeline-step::before {
    content: "";
    position: absolute;
    left: -22px;
    top: 2px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #0d6efd;
}
.timeline-step h6 {
    margin: 0;
    font-weight: 600;
}
.timeline-step small {
    color: #6c757d;
}
</style>

<div class="container my-5">
    <!-- Page Title -->
    <div class="page-title text-center mb-5">
        <h2>Track Your Shipment</h2>
        <p>Enter your tracking number to view shipment details.</p>
    </div>

    <!-- Tracking Form -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-7">
            <form method="post" class="tracking-form d-flex">
                <input type="text" name="term" class="form-control me-2" placeholder="e.g. CL-12789456" required>
                <button class="btn btn-primary" name="save"><i class="fas fa-search me-2"></i> Track</button>
            </form>
        </div>
    </div>

<?php
try {
    if (isset($_POST['save'])) {
        $term = trim($_POST['term']);

        if (empty($term)) {
            echo "<div class='alert alert-danger text-center'>Tracking ID cannot be empty.</div>";
        } else {
            $stmt = $pdo->prepare("SELECT * FROM shipments WHERE ship_id LIKE :term");
            $stmt->execute(['term' => "%$term%"]); 

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

<!-- Shipment Header -->
<div class="text-center mb-4">
    <h4 class="fw-bold">Shipment #: <span class="text-primary"><?= htmlspecialchars($row["ship_id"]); ?></span></h4>
    <span class="badge badge-status bg-<?= $row["status"] === 'Delivered Successfully' ? 'success' : 'warning'; ?>">
        <?= htmlspecialchars($row["status"]); ?>
    </span>
</div>

<div class="row g-4">

    <!-- Receiver Card -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-primary text-white text-center">
                <i class="fas fa-user me-2"></i> Receiver
            </div>
            <div class="card-body">
                <p><b>Name:</b> <?= htmlspecialchars($row["jname"]); ?></p>
                <p><b>Address:</b> <?= htmlspecialchars($row["jadd"]); ?></p>
                <p><b>Country:</b> <?= htmlspecialchars($row["jcountry"]); ?></p>
                <p><b>Phone:</b> <?= htmlspecialchars($row["jnumber"]); ?></p>
                <p><b>Email:</b> <?= htmlspecialchars($row["jemail"]); ?></p>
            </div>
        </div>
    </div>

    <!-- Sender Card -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-success text-white text-center">
                <i class="fas fa-user-tie me-2"></i> Sender
            </div>
            <div class="card-body">
                <p><b>Name:</b> <?= htmlspecialchars($row["sname"]); ?></p>
                <p><b>Address:</b> <?= htmlspecialchars($row["sadd"]); ?></p>
                <p><b>Country:</b> <?= htmlspecialchars($row["scountry"]); ?></p>
                <p><b>Phone:</b> <?= htmlspecialchars($row["snumber"]); ?></p>
                <p><b>Email:</b> <?= htmlspecialchars($row["semail"]); ?></p>
            </div>
        </div>
    </div>

    <!-- Shipment Info -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-warning text-dark text-center">
                <i class="fas fa-box me-2"></i> Shipment Details
            </div>
            <div class="card-body">
                <p><b>Mode:</b> <?= htmlspecialchars($row["mode"]); ?></p>
                <p><b>Product:</b> <?= htmlspecialchars($row["prod"]); ?></p>
                <p><b>Pickup:</b> <?= htmlspecialchars($row["ship_date"] ?? 'N/A'); ?> <?= htmlspecialchars($row["ship_time"] ?? ''); ?></p>
                <p><b>Delivery:</b> <?= htmlspecialchars($row["ddate"] ?? 'N/A'); ?> <?= htmlspecialchars($row["dtime"] ?? ''); ?></p>
                <p><b>Description:</b> <?= htmlspecialchars($row["descrip"]); ?></p>
            </div>
        </div>
    </div>

    <!-- Package Info -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-info text-white text-center">
                <i class="fas fa-boxes me-2"></i> Package Details
            </div>
            <div class="card-body">
                <p><b>Current Location:</b> <?= htmlspecialchars($row["currentl"]); ?></p>
                <p><b>Pickup Location:</b> <?= htmlspecialchars($row["pickupl"]); ?></p>
                <p><b>Quantity:</b> <?= htmlspecialchars($row["items"]); ?></p>
                <p><b>Weight:</b> <?= htmlspecialchars($row["weight"]); ?> kg</p>
                <p><b>Category:</b> <?= htmlspecialchars($row["cat"]); ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Timeline Progress -->
<div class="card mt-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Shipment Progress</h5>
        <div class="timeline">
            <div class="timeline-step">
                <h6>Shipment Created</h6>
                <small><?= htmlspecialchars($row["ship_date"] ?? '') ?> <?= htmlspecialchars($row["ship_time"] ?? '') ?></small>
            </div>
            <div class="timeline-step">
                <h6>In Transit</h6>
                <small><?= htmlspecialchars($row["currentl"]); ?></small>
            </div>
            <div class="timeline-step">
                <h6>Delivery</h6>
                <small><?= htmlspecialchars($row["ddate"] ?? '') ?> <?= htmlspecialchars($row["dtime"] ?? '') ?></small>
            </div>
        </div>
    </div>
</div>

<?php
                }
            } else {
                echo "<div class='alert alert-danger text-center mt-3'>No shipment found for <strong>" . htmlspecialchars($term) . "</strong>.</div>";
            }
        }
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger text-center mt-3'><strong>Error:</strong> " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>

</div> <!-- End container -->

<?php include 'footer.php'; ?>
