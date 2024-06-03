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
            $users = readJsonFile($filename);

            $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

            function filterBooks($users, $searchQuery)
            {
                $filteredBooks = [];
                foreach ($users as $user) {
                    if (
                        strpos(strtolower($user->title), strtolower($searchQuery)) !== false ||
                        strpos(strtolower($user->author), strtolower($searchQuery)) !== false ||
                        strpos(strtolower($user->isbn), strtolower($searchQuery)) !== false ||
                        strpos(strtolower($user->pages), strtolower($searchQuery)) !== false
                    ) {
                        $filteredBooks[] = $user;
                    }
                }
                return $filteredBooks;
            }

            $filteredBooks = filterBooks($users, $searchQuery);
            ?>

            <div class="row mb-3">
                <div class="col-md-9">
                    <form method="get" class="form-inline">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search..." value="<?= htmlspecialchars($searchQuery) ?>">
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
                        <th>Title <?= !empty($searchQuery) ? "(Searching: " . htmlspecialchars($searchQuery) . ")" : ""; ?></th>
                        <th>Author <?= !empty($searchQuery) ? "(Searching: " . htmlspecialchars($searchQuery) . ")" : ""; ?></th>
                        <th>Available <?= !empty($searchQuery) ? "(Searching: " . htmlspecialchars($searchQuery) . ")" : ""; ?></th>
                        <th>Pages <?= !empty($searchQuery) ? "(Searching: " . htmlspecialchars($searchQuery) . ")" : ""; ?></th>
                        <th>ISBN <?= !empty($searchQuery) ? "(Searching: " . htmlspecialchars($searchQuery) . ")" : ""; ?></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($filteredBooks) > 0) : ?>
                        <?php foreach ($filteredBooks as $user) { ?>
                            <tr>
                                <td><?= htmlspecialchars($user->title); ?></td>
                                <td><?= htmlspecialchars($user->author); ?></td>
                                <td><?= $user->available ? 'Yes' : 'No'; ?></td>
                                <td><?= htmlspecialchars($user->pages); ?></td>
                                <td><?= htmlspecialchars($user->isbn); ?></td>
                                <td>
                                    <form action="updateBook.php" method="post" style="display: inline;">
                                        <input type="hidden" name="isbn" value="<?= htmlspecialchars($user->isbn); ?>">
                                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                    </form>

                                    <form action="delete.php" method="post" style="display: inline;" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="isbn" value="<?= htmlspecialchars($user->isbn); ?>">
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