<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<?php
require_once 'conn.php';

if (isset($_POST['save'])) {
    try {
        $id1 = $_POST['id1'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        // Only hash password if it is not empty
        $password = !empty($_POST['password']) ? md5($_POST['password']) : null;

        if ($password !== null) {
            $sql = "UPDATE users SET email = :email, username = :username, password = :password WHERE user_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':username' => $username,
                ':password' => $password,
                ':id' => $id1
            ]);
        } else {
            // If password empty, update without password field
            $sql = "UPDATE users SET email = :email, username = :username WHERE user_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':username' => $username,
                ':id' => $id1
            ]);
        }

        echo "<div class='alert alert-success'><strong>Success!</strong> User Successfully Updated.</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error updating user: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

// Fetch user data for the form
$data = [];
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error fetching user data: " . htmlspecialchars($e->getMessage()));
    }
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

    <!-- Container fluid -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                        <h4>Update User Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="" method="post">
                                <input type="hidden" name="id1" value="<?php echo htmlspecialchars($data['user_id'] ?? ''); ?>">

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" autocomplete="off" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" value="<?php echo htmlspecialchars($data['username'] ?? ''); ?>" autocomplete="off" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Enter new password (leave blank to keep current)">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>