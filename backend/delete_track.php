<?php
session_start();
require_once 'conn.php';

try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $track_id = (int)$_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM shipments WHERE track_id = :track_id");
        $stmt->execute(['track_id' => $track_id]);

        header("Location: view_tracking.php");
        exit();
    } else {
        echo "Invalid or missing ID.";
    }
} catch (PDOException $e) {
    die("Database error: " . htmlspecialchars($e->getMessage()));
}
?>