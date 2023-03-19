<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Users</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="books.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="borrowing.php">Borrowing</a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>
    <?php
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $title = $_POST['title'];

        $sql = mysqli_query($conn, "INSERT INTO `users`(`f_name`, `l_name`, `title`) VALUES ('$f_name', '$l_name','$title')");
        echo "<script>alert($sql)</script>";
    } else {
        echo "<script>alert('Couldn't execute  Post');</script>";
    }

    ?>
    <div class="container m-1 p-3">
        <div class="d-flex justify-content-center">
            <div class="row col-6 card p-5">
                <form class="" action="" method="get">
                    <h3>Add User</h3>
                    <label for="f_name" class="form-label">First Name</label>
                    <input class="form-control" type="text" name="f_name" id="f_name" required><br />
                    <label for="l_name" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="l_name" id="l_name" required><br />
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" type="text" name="title" id="title" required><br />
                    <button class="btn btn-primary" type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-3">
            <div class="row col-8 p-5">
            <div class="row col p-3">
                <h3>Users</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Title</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'config.php';
                        $sql = mysqli_query($conn, "SELECT * FROM users;");
                        while ($row = mysqli_fetch_assoc($sql)) {

                        ?>
                            <tr>
                                <td><?php echo $row['f_name']; ?></td>
                                <td><?php echo $row['l_name']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>



            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>