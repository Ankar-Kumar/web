<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Read a JSON File</title>
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
            require_once 'readJson.php';

            $filename = 'books.json';
            $books = readJsonFile($filename);

            $searchQuery = isset($_POST['search']) ? strtolower(trim($_POST['search'])) : '';

            function filterBooks($books, $searchQuery)
            {
                if (empty($searchQuery)) {
                    return $books;
                }

                return array_filter($books, function ($book) use ($searchQuery) {
                    $availableText = $book->available ? 'yes' : 'no';
                    return stripos($book->title, $searchQuery) !== false ||
                        stripos($book->author, $searchQuery) !== false ||
                        stripos($book->isbn, $searchQuery) !== false ||
                        stripos($book->pages, $searchQuery) !== false ||
                        stripos($availableText, $searchQuery) !== false;
                });
            }

            $filteredBooks = filterBooks($books, $searchQuery);
            ?>

            <div class="row mb-3">
                <div class="col-md-9">
                    <form method="post" class="form-inline">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search..." value="<?= ($searchQuery) ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
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
                        <th>Available</th>
                        <th>Pages</th>
                        <th>ISBN</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($filteredBooks) > 0) : ?>
                        <?php foreach ($filteredBooks as $book) { ?>
                            <tr>
                                <td><?= ($book->title); ?></td>
                                <td><?= ($book->author); ?></td>
                                <td><?= $book->available ? 'Yes' : 'No'; ?></td>
                                <td><?= ($book->pages); ?></td>
                                <td><?= ($book->isbn); ?></td>
                                <td>
                                    <form action="updateBook.php" method="post" style="display: inline;">
                                        <input type="hidden" name="isbn" value="<?= ($book->isbn); ?>">
                                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                    </form>

                                    <form action="delete.php" method="post" style="display: inline;" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="isbn" value="<?= ($book->isbn); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">No books found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>