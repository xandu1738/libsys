<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
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
                            <a class="nav-link active" aria-current="page" href="../users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../books.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../borrowing.php">Borrowing</a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>
    <?php
    require '../config.php';
    $title =  $_REQUEST['title'];
    $b_by = $_REQUEST['b_by'];
    $b_date =  $_REQUEST['b_date'];
    $r_date = $_REQUEST['r_date'];

    $sql = "INSERT INTO `borrow`(`title`, `b_by`, `b_date`, `r_date`) VALUES('$title', '$b_by','$b_date', '$r_date')";

    if (mysqli_query($conn, $sql)) { ?>
        <div class="container mt-5 alert alert-success" role="alert">
            <?php echo "<h3>success</h3>"; ?>
        </div>

    <?php
    } else { ?>
        <div class="container mt-5 alert alert-warning" role="alert">
            <?php echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn); ?>
        </div>

    <?php
    }

    // Close connection
    mysqli_close($conn);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>