<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['isbn'])) {

    $isbn = $_POST['isbn'];

    $filename = 'books.json';
    $books = json_decode(file_get_contents($filename), true);
    $index = null;
    foreach ($books as $key => $book) {
        if ($book['isbn'] == $isbn) {
            $index = $key;
            break;
        }
    }
    if ($index !== null) {
        unset($books[$index]);
        $books = array_values($books);
        file_put_contents($filename, json_encode($books));
        header("Location: index.php");
        exit();
    } else {
        echo "Book not found.";
    }
} else {
    echo "Invalid request.";
}
