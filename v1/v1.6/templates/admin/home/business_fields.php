<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "../../../php/connect.php";

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM business_fields WHERE login_id='$id'";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM business_fields_information WHERE login_id='$id'";
    $info_result = mysqli_query($conn, $sql);

    if (isset($info_result)) {
        $info_row = mysqli_fetch_array($info_result);
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
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
            <div class="form-fields">
                <h1 style="text-align: center; margin-bottom: 20px;">Business Fields</h1>

                <?php
                if (isset($info_row)) {
                    echo '
                        <form action="../../../php/info_business_fields.php" enctype="multipart/form-data" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control" id="title" value="'.$info_row['title'].'" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input name="description" type="text" class="form-control" id="description" value="'.$info_row['description'].'" required>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary" style="margin-bottom: 40px;">Submit</button>
                        </form>
                    ';
                } else {
                    echo '
                        <form action="../../../php/info_business_fields.php" enctype="multipart/form-data" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input name="description" type="text" class="form-control" id="description" required>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary" style="margin-bottom: 40px;">Submit</button>
                        </form>
                    ';
                }
                ?>

                <?php
                while($row = mysqli_fetch_array($result)) {
                    echo '
                        <form enctype="multipart/form-data" id="field_'.$row['business_fields_id'].'">
                            <div class="field">
                                <div class="mb-3">
                                    <label for="field_title" class="form-label">Field Title</label>
                                    <input name="title" type="text" class="form-control" id="field_title" value="'.$row['title'].'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="field_image" class="form-label">Field Image</label>
                                    <input name="image" type="file" accept="image/*" class="form-control upload-image" id="field_image" required>
                                </div>
                                <div class="mb-3" style="display: flex; align-items: center">
                                    <img style="width: 300px; height: auto;" id="image_output" src="../../../'.$row['image'].'"/>
                                </div>
                                <button type="button" class="btn btn-danger delete '.$row['business_fields_id'].'">Delete Fields</button>
                                <button type="button" class="btn btn-primary update '.$row['business_fields_id'].'">Update</button>
                                <hr>
                            </div>
                        </form>
                    ';
                }
                ?>
            </div>
            <button class="btn btn-primary add-field" type="button">Add Field</button>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../../script/admin/fields.js"></script>
    <script src="../../../script/admin/show_image.js"></script>
    <script src="../../../script/admin/update_fields.js"></script>
    <script src="../../../script/admin/delete_fields.js"></script>
</body>
</html>

<?php
} else {
    header("Location: ../../wp-admin.php");
    exit();
}
?>