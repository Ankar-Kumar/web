<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $available = $_POST['available'];
    $pages = $_POST['pages'];

    $filename = 'books.json';
    $books = json_decode(file_get_contents($filename), true); 
    foreach ($books as &$book) {
        if ($book['isbn'] == $isbn) {
            $book['title'] = $title;
            $book['author'] = $author;
            $book['available'] = $available;
            $book['pages'] = $pages;
            $book['isbn'] == $isbn;

            file_put_contents($filename, json_encode($books, JSON_PRETTY_PRINT));

            header("Location: index.php");
            exit();
        }
    }
    echo "Book with provided ISBN not found.";
}
