<?php
try {
    $pdo = new PDO(
        "mysql:host=database-1.cqzgmiwq8qx6.us-east-1.rds.amazonaws.com;dbname=courier_db;charset=utf8mb4",
        "admin",
        "Admin12345!"
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
