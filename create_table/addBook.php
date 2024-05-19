<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add New Book</h5>
                <form action="submitForm.php" method="post" class="book-form">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
                    </div>

                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" class="form-control" placeholder="Enter author">
                    </div>

                    <div class="form-group">
                        <label>Availability:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="available-yes" name="available" value="1">
                            <label class="form-check-label" for="available-yes">Yes</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="available-no" name="available" value="0">
                            <label class="form-check-label" for="available-no">No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pages">Pages:</label>
                        <input type="number" id="pages" name="pages" class="form-control" placeholder="Enter pages">
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" id="isbn" name="isbn" class="form-control" placeholder="Enter ISBN">
                    </div>
                    <div style="display:flex; align-items:center;justify-content:center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>