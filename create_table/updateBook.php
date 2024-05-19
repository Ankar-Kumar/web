<?php
require_once 'readJson.php';

$filename = 'books.json';
$books = readJsonFile($filename);

if (isset($_POST['isbn'])) {
    $isbn = $_POST['isbn'];
    $book = null;
    foreach ($books as $item) {
        if ($item->isbn == $isbn) {
            $book = $item;
            break;
        }
    }

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
                    <input type="hidden" name="isbn" value="<?= $book->isbn; ?>">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?= $book->title; ?>" placeholder="Enter title">
                    </div>

                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" class="form-control" value="<?= $book->author; ?>" placeholder="Enter author">
                    </div>

                    <div class="form-group">
                        <label>Availability:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="available-yes" name="available" class="form-check-input" value="1" <?= $book->available ? 'checked' : ''; ?>>
                            <label for="available-yes" class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="available-no" name="available" class="form-check-input" value="0" <?= !$book->available ? 'checked' : ''; ?>>
                            <label for="available-no" class="form-check-label">No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pages">Pages:</label>
                        <input type="number" id="pages" name="pages" class="form-control" value="<?= $book->pages; ?>" placeholder="Enter pages">
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" id="isbn" name="isbn" class="form-control" value="<?= $book->isbn; ?>" placeholder="Enter ISBN" >
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