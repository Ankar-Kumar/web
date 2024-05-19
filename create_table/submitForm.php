<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $newBook = array(
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'available' => $_POST['available'],
        'pages' =>  $_POST['pages'],
        'isbn' => $_POST['isbn']
    );

    $filename = 'books.json';
    $books = json_decode(file_get_contents($filename), true);

    $books[] = $newBook;

    file_put_contents($filename, json_encode($books));

    header("Location: index.php"); // important lines for redirection
    exit();
}
