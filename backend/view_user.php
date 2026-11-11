<?php 
require_once 'conn.php'; // Database connection
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

include 'header.php'; 
include 'sidebar.php'; 

try {
    // Fetch all users from the database
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!-- Page wrapper -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->

    <!-- Container fluid -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Of All Users</h4>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($users)): ?>
                                        <?php foreach ($users as $row): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row["username"]) ?></td>
                                                <td><?= htmlspecialchars($row["email"]) ?></td>
                                                <td>
                                                    <a class="btn btn-danger" href="delete_user.php?id=<?= urlencode($row["user_id"]) ?>">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i> Delete
                                                    </a>
                                                    <a class="btn btn-primary" href="edit_user.php?id=<?= urlencode($row["user_id"]) ?>">
                                                        <i class="glyphicon glyphicon-pencil icon-white"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="3" class="text-center">No users found.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- End Page Content -->
    </div>
</div>

<?php include 'footer.php'; ?>
