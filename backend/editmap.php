<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                    <?php
require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $tracking = trim($_POST['tracking'] ?? '');
    $from = trim($_POST['from'] ?? '');
    $to = trim($_POST['to'] ?? '');

    if ($tracking && $from && $to) {
        try {
            $sql = "UPDATE shipments SET lon = :lon, lat = :lat WHERE ship_id = :ship_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':lon' => $from,
                ':lat' => $to,
                ':ship_id' => $tracking
            ]);

            echo "<div class='alert alert-success'><strong>Success!</strong> Map successfully updated.</div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Database Error: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'><strong>Warning!</strong> All fields are required.</div>";
    }
}
?>
                    </div>

                    <div class="basic-form">
                        <h3>Edit Location On Map</h3>
                        <form method="post" action="">
                            <div class="form-group">
                                <label><b>Tracking #</b></label>
                                <input type="text" name="tracking" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><b>From (Current Location)</b></label>
                                <input type="text" name="from" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><b>To (Destination)</b></label>
                                <input type="text" name="to" class="form-control" required>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary">Mail Tracking</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
