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

    // Validate form data
    if (empty($title) || empty($author) || empty($isbn) || empty($stock) || empty($price)) {
        echo "All fields are required.";
        exit();
    }

    // Prepare and execute an SQL INSERT query to add the new book
    $stmt = $pdo->prepare("INSERT INTO books (title, author, isbn, stock, price) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$title, $author, $isbn, $stock, $price])) {
        // Redirect back to the index page
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to add the book.";
    }
} else {
    echo "Invalid request.";
}
