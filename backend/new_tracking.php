<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'conn.php'; // your PDO connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $errors = [];

    // Example of required fields check (optional, you can expand)
    $required_fields = ['jname','jadd','jcountry','sname','sadd','scountry','prod','carrier','mode','ship_date','ddate'];
    foreach ($required_fields as $field) {
        if (empty(trim($_POST[$field] ?? ''))) {
            $errors[] = ucfirst($field) . " cannot be empty.";
        }
    }

    if (empty($errors)) {
        try {
            // Generate tracking ID
            $ship_id = 'CL-' . rand(100000,999999);

            $sql = "INSERT INTO shipments (
                jname,jadd,jcountry,jemail,jnumber,
                sname,sadd,scountry,semail,snumber,
                prod,carrier,mode,ship_date,ddate,
                ship_time,dtime,currentl,pickupl,status,
                deliverys,cat,weight,item,descrip,ship_id,lon,lat
            ) VALUES (
                :jname,:jadd,:jcountry,:jemail,:jnumber,
                :sname,:sadd,:scountry,:semail,:snumber,
                :prod,:carrier,:mode,:ship_date,:ddate,
                :ship_time,:dtime,:currentl,:pickupl,:status,
                :deliverys,:cat,:weight,:item,:descrip,:ship_id,:lon,:lat
            )";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':jname' => $_POST['jname'],
                ':jadd' => $_POST['jadd'],
                ':jcountry' => $_POST['jcountry'],
                ':jemail' => $_POST['jemail'] ?? '',
                ':jnumber' => $_POST['jnumber'] ?? '',
                ':sname' => $_POST['sname'],
                ':sadd' => $_POST['sadd'],
                ':scountry' => $_POST['scountry'],
                ':semail' => $_POST['semail'] ?? '',
                ':snumber' => $_POST['snumber'] ?? '',
                ':prod' => $_POST['prod'],
                ':carrier' => $_POST['carrier'],
                ':mode' => $_POST['mode'],
                ':ship_date' => $_POST['ship_date'],
                ':ddate' => $_POST['ddate'],
                ':ship_time' => $_POST['ship_time'] ?? '',
                ':dtime' => $_POST['dtime'] ?? '',
                ':currentl' => $_POST['currentl'] ?? '',
                ':pickupl' => $_POST['pickupl'] ?? '',
                ':status' => $_POST['status'] ?? '',
                ':deliverys' => $_POST['deliverys'] ?? '',
                ':cat' => $_POST['cat'] ?? '',
                ':weight' => $_POST['weight'] ?? '',
                ':item' => $_POST['item'] ?? '',
                ':descrip' => $_POST['descrip'] ?? '',
                ':ship_id' => $ship_id,
                ':lon' => $_POST['lon'] ?? '',
                ':lat' => $_POST['lat'] ?? ''
            ]);

            $success = "Shipment created successfully! Tracking ID: $ship_id";

        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Your form exactly as you pasted -->
<div class="page-wrapper">
  <div class="container-fluid">
    <?php
    if (!empty($success)) {
        echo "<div class='alert alert-success'>$success</div>";
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
    ?>

    <div class="card">
      <div class="card-header">
        <h4>Add New Tracking</h4>
      </div>
      <div class="card-body">
        <form method="post" novalidate>
          <!-- JK Info -->
          <div class="section-title">Receiver (JK) Information</div>
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" name="jname" placeholder="JK Name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <input type="text" name="jadd" placeholder="JK Address" class="form-control" required>
            </div>
            <div class="col-md-4">
              <input type="text" name="jcountry" placeholder="JK Country" class="form-control" required>
            </div>
            <div class="col-md-4">
              <input type="email" name="jemail" placeholder="JK Email" class="form-control">
            </div>
            <div class="col-md-4">
              <input type="text" name="jnumber" placeholder="JK Number" class="form-control">
            </div>
          </div>

          <!-- Sender Info -->
          <div class="section-title">Sender Information</div>
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" name="sname" placeholder="Sender Name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <input type="text" name="sadd" placeholder="Sender Address" class="form-control" required>
            </div>
            <div class="col-md-4">
              <input type="text" name="scountry" placeholder="Sender Country" class="form-control" required>
            </div>
            <div class="col-md-4">
              <input type="email" name="semail" placeholder="Sender Email" class="form-control">
            </div>
            <div class="col-md-4">
              <input type="text" name="snumber" placeholder="Sender Number" class="form-control">
            </div>
          </div>

          <!-- Shipment Info -->
          <div class="section-title">Shipment Information</div>
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" name="prod" placeholder="Product" class="form-control" required>
            </div>
            <div class="col-md-6">
              <select name="carrier" class="form-control" required>
                <option value="">-- Select Carrier --</option>
                <option>DHL Express</option>
                <option>FedEx</option>
                <option>UPS</option>
                <option>Aramex</option>
                <option>USPS</option>
                <option>Royal Mail</option>
                <option>Amazon Logistics</option>
              </select>
            </div>
            <div class="col-md-6">
              <select name="mode" class="form-control" required>
                <option value="">-- Select Shipment Mode --</option>
                <option>Air Freight</option>
                <option>Sea Freight</option>
                <option>Road Transport</option>
                <option>Rail Freight</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Ship Date</label>
              <input type="date" name="ship_date" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Delivery Date</label>
              <input type="date" name="ddate" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Ship Time</label>
              <input type="time" name="ship_time" class="form-control">
            </div>
            <div class="col-md-3">
              <label class="form-label">Delivery Time</label>
              <input type="time" name="dtime" class="form-control">
            </div>
          </div>

          <!-- Status -->
          <div class="section-title">Status & Delivery</div>
          <div class="row g-3">
            <div class="col-md-6">
              <select name="status" class="form-control" required>
                <option value="">-- Shipment Status --</option>
                <option>Shipment Created</option>
                <option>At Origin Facility</option>
                <option>In Transit</option>
                <option>At Customs</option>
                <option>Out for Delivery</option>
                <option>Delivered</option>
              </select>
            </div>
            <div class="col-md-6">
              <select name="deliverys" class="form-control" required>
                <option value="">-- Delivery Status --</option>
                <option>Delivered Successfully</option>
                <option>Delivery Attempted</option>
                <option>Delivery Failed</option>
              </select>
            </div>
          </div>

          <!-- Extra Info -->
          <div class="section-title">Additional Info</div>
          <div class="row g-3">
            <div class="col-md-4">
              <input type="text" name="cat" placeholder="Category" class="form-control">
            </div>
            <div class="col-md-4">
              <input type="text" name="weight" placeholder="Weight" class="form-control">
            </div>
            <div class="col-md-4">
              <input type="text" name="item" placeholder="Item" class="form-control">
            </div>
            <div class="col-12">
              <textarea name="descrip" placeholder="Description" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-6">
              <input type="text" name="lon" placeholder="From (Longitude)" class="form-control">
            </div>
            <div class="col-md-6">
              <input type="text" name="lat" placeholder="To (Latitude)" class="form-control">
            </div>
          </div>

          <!-- Submit -->
          <div class="text-end mt-4">
            <button type="submit" name="save" class="btn btn-primary">
              <i class="fas fa-plus-circle me-2"></i> Create Shipment
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
