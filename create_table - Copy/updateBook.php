<?php
require 'database.php';

$pdo = getDatabaseConnection();
if (isset($_POST['isbn'])) {
    $isbn = $_POST['isbn'];

    $stmt = $pdo->prepare("SELECT * FROM books WHERE isbn = ?");
    $stmt->execute([$isbn]);
    $book = $stmt->fetch();

    if ($book) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Book</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container mt-5">
                <h2 class="text-center mb-4">Update Book</h2>
                <form action="update.php" method="post" class="card p-4">
                    <input type="hidden" name="isbn" value="<?= ($book->isbn); ?>">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?= ($book->title); ?>" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" class="form-control" value="<?= ($book->author); ?>" placeholder="Enter author" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" id="stock" name="stock" class="form-control" value="<?= ($book->stock); ?>" placeholder="Enter stock" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" class="form-control" value="<?= ($book->price); ?>" placeholder="Enter price" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </body>

        </html>
<?php
    } else {
        echo "Book not found.";
    }
} else {
    echo "ISBN not provided.";
}
?>