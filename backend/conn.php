<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=u416998565_cargo;charset=utf8mb4",
        "root",
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
