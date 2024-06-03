<?php
require 'database.php';

$pdo = getDatabaseConnection();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['isbn'])) {
    
    $stmt = $pdo->prepare("DELETE FROM books WHERE isbn = ?");

    $stmt->bindParam(1, $_POST['isbn']);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to delete the book.";
    }
} else {
    echo "Invalid request.";
}
