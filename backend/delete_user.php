<?php
require 'conn.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        $sql = "DELETE FROM users WHERE user_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        header('Location: view_user.php');
        exit;
    } catch (PDOException $e) {
        echo "Error deleting user: " . htmlspecialchars($e->getMessage());
    }
} else {
    // Invalid ID
    header('Location: view_user.php');
    exit;
}
?>