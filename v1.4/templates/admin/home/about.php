<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "../../../php/connect.php";

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM about WHERE login_id='$id'";
    $result = mysqli_query($conn, $sql);

    if (isset($result)) {
        $row = mysqli_fetch_array($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Library Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../../style/admin/form.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix | Admin</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Admin Panel</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="./home.php">Home</a></li>
                                <li><a class="dropdown-item" href="./about.php">About</a></li>
                                <li><a class="dropdown-item" href="./business_fields.php">Business Fields</a></li>
                                <li><a class="dropdown-item" href="./why_us.php">Why Us</a></li>
                                <li><a class="dropdown-item" href="./statistic.php">Statistics</a></li>
                                <li><a class="dropdown-item" href="./team.php">Team</a></li>
                                <li><a class="dropdown-item" href="./testimonials.php">Testimonials</a></li>
                                <li><a class="dropdown-item" href="./faq.php">FAQ</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../product/product.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../update/update.php">Update</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Admin Panel  -->
    <section class="home-panel">
        <div class="container-fluid">
            <form method="POST" action="../../../php/about.php" enctype="multipart/form-data">
                <h1 style="text-align: center; margin-bottom: 20px;">About</h1>
                <?php
                if (isset($row)) {
                    echo '
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title" value="'.$row['title'].'" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="5">'.$row['description'].'</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="history" class="form-label">History</label>
                            <textarea name="history" class="form-control" id="history" rows="2">'.$row['history'].'</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <textarea name="experience" class="form-control" id="experience" rows="3">'.$row['experience'].'</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="philosophy" class="form-label">Philosophy</label>
                            <textarea name="philosophy" class="form-control" id="philosophy" rows="2">'.$row['philosophy'].'</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="purpose" class="form-label">Purpose</label>
                            <textarea name="purpose" class="form-control" id="purpose" rows="3">'.$row['purpose'].'</textarea>
                        </div>                                            
                    ';
                } else {
                    echo '
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="history" class="form-label">History</label>
                            <textarea name="history" class="form-control" id="history" rows="1"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <textarea name="experience" class="form-control" id="experience" rows="1"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="philosophy" class="form-label">Philosophy</label>
                            <textarea name="philosophy" class="form-control" id="philosophy" rows="1"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="purpose" class="form-label">Purpose</label>
                            <textarea name="purpose" class="form-control" id="purpose" rows="1"></textarea>
                        </div>
                    ';
                }
                ?>

                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>

<?php
} else {
    header("Location: ../../wp-admin.php");
    exit();
}
?>