<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Read a JSON File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="table-container">
            <?php
            require_once 'readJson.php';

            $filename = 'books.json';
            $users = readJsonFile($filename);

            ?>

            <div class="add-book-button mb-3 text-right">
                <form action="addBook.php">
                    <button class="btn btn-primary">Add Book</button>
                </form>
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
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $user->title; ?></td>
                            <td><?= $user->author; ?></td>
                            <td><?= $user->available ? 'Yes' : 'No'; ?></td>
                            <td><?= $user->pages; ?></td>
                            <td><?= $user->isbn; ?></td>
                            <td>
                                <form action="updateBook.php" method="post" style="display: inline;">
                                    <input type="hidden" name="isbn" value="<?= $user->isbn; ?>">
                                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                </form>

                                <form action="delete.php" method="get" style="display: inline;">
                                    <input type="hidden" name="isbn" value="<?= $user->isbn; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>