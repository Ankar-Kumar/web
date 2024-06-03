<?php
require 'database.php';

$pdo = getDatabaseConnection();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    // Prepare and execute an SQL UPDATE query to update the book information
    $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, stock = ?, price = ? WHERE isbn = ?");
    $stmt->execute([$title, $author, $stock, $price, $isbn]);

    // Redirect back to the index page
    header("Location: index.php");
    exit();
} else {
    echo "Invalid request.";
}
