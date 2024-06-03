<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Read from Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this book?");
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="table-container">
            <?php
            require 'database.php';

            $pdo = getDatabaseConnection();

            // Handle search
            $searchQuery = '';
            if (isset($_POST['search'])) {
                $searchQuery = $_POST['search'];
            }

            if ($searchQuery != '') {
                $stmt = $pdo->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ? OR isbn LIKE ? OR stock LIKE ? OR price LIKE ? ORDER BY id DESC");
                $stmt->execute(['%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%']);
            } else {
                $stmt = $pdo->prepare("SELECT * FROM books ORDER BY id DESC LIMIT 15");
                $stmt->execute();
            }

            $books = $stmt->fetchAll();
            ?>

            <div class="row mb-3">
                <div class="col-md-9">
                    <form method="post" action="">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= ($searchQuery) ?>">
                    </form>
                </div>
                <div class="col-md-3 text-right">
                    <form action="addBook.php">
                        <button class="btn btn-primary">Add Book</button>
                    </form>
                </div>
            </div>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) { ?>
                        <tr>
                            <td><?= ($book->title); ?></td>
                            <td><?= ($book->author); ?></td>
                            <td><?= ($book->isbn); ?></td>
                            <td><?= ($book->stock); ?></td>
                            <td><?= ($book->price); ?></td>
                            <td>
                                <div class="btn-group mr-1" role="group">
                                    <form action="updateBook.php" method="post" style="display: inline;">
                                        <input type="hidden" name="isbn" value="<?= ($book->isbn); ?>" />
                                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                    </form>

                                    <form action="delete.php" method="post" style="display: inline;" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="isbn" value="<?= ($book->isbn); ?>" />
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>