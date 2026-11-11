
<?php
session_start();
require_once 'conn.php';

if (isset($_POST['save'])) {
    try {
        $id1 = $_POST['id1'];

        $fields = [
            'jname', 'jadd', 'jcountry', 'sname', 'sadd', 'scountry', 'prod', 'mode',
            'ship_date', 'ddate', 'ship_time', 'dtime', 'currentl', 'pickupl', 'status',
            'deliverys', 'cat', 'weight', 'item', 'descrip', 'lon', 'lat'
        ];

        $updateFields = [];
        $params = [];

        foreach ($fields as $field) {
            $updateFields[] = "$field = :$field";
            $params[$field] = $_POST[$field];
        }

        $params['id'] = $id1;

        $sql = "UPDATE shipments SET " . implode(', ', $updateFields) . " WHERE track_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        echo "<div class='alert alert-success'><strong>Success!</strong> Tracking successfully updated.</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error updating tracking: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

// Fetch data for the form
$data = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM shipments WHERE track_id = :id");
        $stmt->execute(['id' => $_GET['id']]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching data: " . htmlspecialchars($e->getMessage()));
    }
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

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

    <!-- Container fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title"><h4>Edit Tracking</h4></div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post">
                                <input type="hidden" name="id1" value="<?php echo htmlspecialchars($data['track_id'] ?? ''); ?>">

                                <?php
                                function formInput($label, $name, $value) {
                                    echo "
                                    <div class='form-group'>
                                        <label>" . htmlspecialchars($label) . "</label>
                                        <input type='text' name='" . htmlspecialchars($name) . "' value='" . htmlspecialchars($value) . "' class='form-control'>
                                    </div>";
                                }

                                formInput('Jk Name', 'jname', $data['jname'] ?? '');
                                formInput('Jk address', 'jadd', $data['jadd'] ?? '');
                                formInput('Jk Country', 'jcountry', $data['jcountry'] ?? '');
                                formInput('Seller Name', 'sname', $data['sname'] ?? '');
                                formInput('Seller Address', 'sadd', $data['sadd'] ?? '');
                                formInput('Seller Country', 'scountry', $data['scountry'] ?? '');
                                formInput('Product Name', 'prod', $data['prod'] ?? '');
                                formInput('Mode', 'mode', $data['mode'] ?? '');
                                formInput('Shipped Date', 'ship_date', $data['ship_date'] ?? '');
                                formInput('Delivery Date', 'ddate', $data['ddate'] ?? '');
                                formInput('Shipped Time', 'ship_time', $data['ship_time'] ?? '');
                                formInput('Delivery Time', 'dtime', $data['dtime'] ?? '');
                                formInput('Current Location', 'currentl', $data['currentl'] ?? '');
                                formInput('Pickup Location', 'pickupl', $data['pickupl'] ?? '');
                                formInput('Status', 'status', $data['status'] ?? '');
                                formInput('Delivery Status', 'deliverys', $data['deliverys'] ?? '');
                                formInput('Category', 'cat', $data['cat'] ?? '');
                                formInput('Weight', 'weight', $data['weight'] ?? '');
                                formInput('Item', 'item', $data['item'] ?? '');
                                formInput('Description', 'descrip', $data['descrip'] ?? '');
                                formInput('Longitude (From)', 'lon', $data['lon'] ?? '');
                                formInput('Latitude (To)', 'lat', $data['lat'] ?? '');
                                ?>

                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
