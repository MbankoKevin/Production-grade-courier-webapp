<?php include 'header.php'; ?> 
<?php include 'sidebar.php'; ?>

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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                        <h4>User Registration Form</h4>

                        <?php
                        include 'conn.php'; // Make sure this file creates $pdo (PDO instance)

                        if (isset($_POST['save'])) {
                            $email = trim($_POST['email'] ?? '');
                            $username = trim($_POST['username'] ?? '');
                            $password = trim($_POST['password'] ?? '');

                            $errors = [];

                            if (empty($email)) {
                                $errors[] = "Email cannot be empty.";
                            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $errors[] = "Invalid email format.";
                            }

                            if (empty($username)) {
                                $errors[] = "Username cannot be empty.";
                            }

                            if (empty($password)) {
                                $errors[] = "Password cannot be empty.";
                            }

                            if (empty($errors)) {
                                try {
                                    // Hash password securely
                                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                                    $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([
                                        ':email' => $email,
                                        ':username' => $username,
                                        ':password' => $passwordHash
                                    ]);

                                    echo "<div class='alert alert-success'><strong>Success!</strong> New user successfully created.</div>";
                                } catch (PDOException $e) {
                                    echo "<div class='alert alert-danger'>Database error: " . htmlspecialchars($e->getMessage()) . "</div>";
                                }
                            } else {
                                foreach ($errors as $error) {
                                    echo "<div class='alert alert-danger'><strong>Failed!</strong> " . htmlspecialchars($error) . "</div>";
                                }
                            }
                        }
                        ?>

                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required> Check me out
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
        <!-- End Page Content -->
    </div>
</div>

<?php include 'footer.php'; ?>
