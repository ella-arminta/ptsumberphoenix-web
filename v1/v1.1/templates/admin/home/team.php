<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "../../../php/connect.php";

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM team WHERE login_id = '$id'";
    $team_result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM team_info WHERE login_id = '$id'";
    $team_info_result = mysqli_query($conn, $sql);

    if (isset($team_info_result)) {
        $team_info_row = mysqli_fetch_array($team_info_result);
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
            <h1 style="text-align: center; margin-bottom: 20px;">Team</h1>

            <form method="POST" action="../../../php/team_info.php" enctype="multipart/form-data">
                <?php
                if (isset($team_info_row)) {
                    echo '
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="'.$team_info_row['title'].'" required>
                        </div>
                        <div class="mb-3">
                            <label for="sub-title" class="form-label">Sub Title</label>
                            <textarea name="sub_title" class="form-control" id="sub-title" rows="3">'.$team_info_row['sub_title'].'</textarea>
                        </div>

                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        <hr>
                    ';
                } else {
                    echo '
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="sub-title" class="form-label">Sub Title</label>
                            <textarea name="sub_title" class="form-control" id="sub-title" rows="3"></textarea>
                        </div>

                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        <hr>    
                    ';
                }
                ?>
            </form>

            <form method="POST" action="../../../php/team.php" enctype="multipart/form-data">
                <?php
                if (isset($team_result) && mysqli_num_rows($team_result) > 0) {
                    while ($team_row = mysqli_fetch_array($team_result)) {
                        echo '
                            <div class="mb-3">
                                <label for="team_name_'.$team_row['team_id'].'" class="form-label">Name</label>
                                <input name="name_'.$team_row['team_id'].'" type="text" class="form-control" id="team_name_'.$team_row['team_id'].'" value="'.$team_row['name'].'" required>
                            </div>
                            <div class="mb-3">
                                <label for="team_position_'.$team_row['team_id'].'" class="form-label">Position</label>
                                <input name="position_'.$team_row['team_id'].'" type="text" class="form-control" id="team_position_'.$team_row['team_id'].'" value="'.$team_row['position'].'" required>
                            </div>
                            <div class="mb-3">
                                <label for="team_image_'.$team_row['team_id'].'" class="form-label">Profile Picture</label>
                                <input name="image_'.$team_row['team_id'].'" type="file" accept="image/*" class="form-control upload-image" id="team_image_'.$team_row['team_id'].'">
                            </div>
                            <div class="mb-3" style="display: flex; align-items: center">
                                <img style="width: 300px; height: auto;" id="image_output" src="../../../'.$team_row['image'].'"/>
                            </div>
                            <hr>  
                        ';
                    }
                } else {
                    echo '
                        <div class="mb-3">
                            <label for="team_name_1" class="form-label">Name</label>
                            <input name="name_1" type="text" class="form-control" id="team_name_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_position_1" class="form-label">Position</label>
                            <input name="position_1" type="text" class="form-control" id="team_position_1" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_image_1" class="form-label">Profile Picture</label>
                            <input name="image_1" type="file" accept="image/*" class="form-control upload-image" id="team_image_1" required>
                        </div>
                        <div class="mb-3" style="display: flex; align-items: center">
                            <img style="width: 300px; height: auto;" id="image_output"/>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="team_name_2" class="form-label">Name</label>
                            <input name="name_2" type="text" class="form-control" id="team_name_2" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_position_2" class="form-label">Position</label>
                            <input name="position_2" type="text" class="form-control" id="team_position_2" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_image_2" class="form-label">Profile Picture</label>
                            <input name="image_2" type="file" accept="image/*" class="form-control upload-image" id="team_image_2" required>
                        </div>
                        <div class="mb-3" style="display: flex; align-items: center">
                            <img style="width: 300px; height: auto;" id="image_output"/>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="team_name_3" class="form-label">Name</label>
                            <input name="name_3" type="text" class="form-control" id="team_name_3" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_position_3" class="form-label">Position</label>
                            <input name="position_3" type="text" class="form-control" id="team_position_3" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_image_3" class="form-label">Profile Picture</label>
                            <input name="image_3" type="file" accept="image/*" class="form-control upload-image" id="team_image_3" required>
                        </div>
                        <div class="mb-3" style="display: flex; align-items: center">
                            <img style="width: 300px; height: auto;" id="image_output"/>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="team_name_4" class="form-label">Name</label>
                            <input name="name_4" type="text" class="form-control" id="team_name_4" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_position_4" class="form-label">Position</label>
                            <input name="position_4" type="text" class="form-control" id="team_position_4" required>
                        </div>
                        <div class="mb-3">
                            <label for="team_image_4" class="form-label">Profile Picture</label>
                            <input name="image_4" type="file" accept="image/*" class="form-control upload-image" id="team_image_4" required>
                        </div>
                        <div class="mb-3" style="display: flex; align-items: center">
                            <img style="width: 300px; height: auto;" id="image_output"/>
                        </div>

                        <hr>
                    ';
                }
                ?>

                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../../../script/admin/show_image.js"></script>
</body>
</html>

<?php
} else {
    header("Location: ../../wp-admin.php");
    exit();
}
?>