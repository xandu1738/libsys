<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Borrowing</title>
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
        $title = $_POST['title'];
        $b_by = $_POST['b_by'];
        $b_date = $_POST['b_date'];
        $r_date = $_POST['r_date'];

        $query = "INSERT INTO `borrow` (`title`, `b_by`, `b_date`, `r_date`)) VALUES ('$title', '$b_by','$b_date', $r_date)";
        $sql = mysqli_query($conn, $query);
        echo "<script>alert($sql)</script>";
    } else {
        echo "<script>alert('Couldn't execute  Post');</script>";
    }

    ?>
    <div class="container m-1 p-3">
        <div class="d-flex justify-content-center">
            <div class="row col-6 card p-2">
                <h3>Borrow</h3>
                <form action="form_config/_borrow.php" method="post">
                    <label class="form-label" for="title">Title</label>
                    <select class="form-select" id="title" name="title">
                        <?php
                        require 'config.php';
                        $sql = mysqli_query($conn, "SELECT * FROM books;");
                        while ($row = mysqli_fetch_assoc($sql)) {

                        ?>
                            <option value="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></option>
                        <?php } ?>
                    </select>
                    <br />
                    <label class="form-label" for="b_by">Borrowed By</label>
                    <select class="form-select" id="b_by" name="b_by">
                        <?php
                        require 'config.php';
                        $sql = mysqli_query($conn, "SELECT * FROM users;");
                        while ($row = mysqli_fetch_assoc($sql)) {

                        ?>
                            <option value="<?php echo $row['f_name'] . " " . $row['l_name'] ?>"><?php echo $row['f_name'] . " " . $row['l_name'] ?></option>
                        <?php } ?>
                    </select>
                    <br />
                    <?php  ?>
                    <label class="form-label" for="b_date">Borrowed Date</label>
                    <input class="form-control" type="date" name="b_date" id="b_date" required><br />
                    <label class="form-label" for="r_date">Planned Return Date</label>
                    <input class="form-control" type="date" name="r_date" id="r_date" required><br />
                    <button class="btn btn-primary" type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-3">
            <div class="row col-8 p-5">
                <div class="row col p-3">
                    <h3>Borrowed</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Borrowed By</th>
                                <th scope="col">Borrow Date</th>
                                <th scope="col">Expected Return</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'config.php';
                            $sql = mysqli_query($conn, "SELECT * FROM borrow;");
                            while ($row = mysqli_fetch_assoc($sql)) {

                            ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['b_by']; ?></td>
                                    <td><?php echo $row['b_date']; ?></td>
                                    <td><?php echo $row['r_date']; ?></td>
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