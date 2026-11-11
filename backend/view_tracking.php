<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'conn.php';

// Optional: Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: /logistip/login.php");
    exit();
}

try {
    // Fetch all shipments
    $stmt = $pdo->query("SELECT * FROM shipments ORDER BY ddate DESC");
    $shipments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . htmlspecialchars($e->getMessage()));
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Page wrapper -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles mb-3">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb float-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Tracking</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->

    <!-- Container fluid -->
    <div class="container-fluid">
        <!-- Dashboard Card -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white">
                        <h4 class="card-title mb-0">All Shipments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example23" class="table table-hover table-striped table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>JK Name</th>
                                        <th>Tracking ID</th>
                                        <th>Date</th>
                                        <th>Pickup Location</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($shipments)): ?>
                                        <?php foreach ($shipments as $row): ?>
                                            <tr>
                                                <td class="fw-semibold"><?= htmlspecialchars($row["jname"]) ?></td>
                                                <td><?= htmlspecialchars($row["ship_id"]) ?></td>
                                                <td><?= htmlspecialchars($row["ddate"]) ?></td>
                                                <td><?= htmlspecialchars($row["pickupl"]) ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-danger me-1" 
                                                       href="delete_track.php?id=<?= urlencode($row["track_id"]) ?>" 
                                                       title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-success me-1" 
                                                       href="edit_tracking.php?id=<?= urlencode($row["track_id"]) ?>" 
                                                       title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-primary" 
                                                       href="view_full.php?id=<?= urlencode($row["track_id"]) ?>" 
                                                       title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                No tracking records found.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div> <!-- table-responsive -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container-fluid -->

<?php include 'footer.php'; ?>
