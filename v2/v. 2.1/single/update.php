<?php
include '../api/connect.php';
if(!isset($_GET['id'])){
    header('Location: ../update.php');
}
$upd_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM updates where upd_id =?");
$berhasil = $stmt->execute([$upd_id]);
if(!$berhasil || $stmt->rowCount() <= 0){
    header('Location: ../update.php');
}
$row = $stmt->fetch();
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
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/copyright.css">
    <link rel="stylesheet" href="../style/nav_templates.css">

    <link rel="stylesheet" href="../style/updates/page.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix Makmur | Update</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="paragraph">
                <a href="../index.php">Home </a>
                <span>/</span> 
                <a href="../update.php">Updates </a>
                <span>/</span> 
                <strong class="contact">Update Page</strong></div>
            <div class="sub-heading">Update Page</div>
        </div>
    </nav>

    <!-- Update Section -->
    <section class="update-section section-extra">
        <div class="container-fluid">
            <!-- update information -->
            <div class="heading"><?= $row['upd_title'] ?></div>
            <div class="sub-heading update-description"><?= $row['upd_sub'] ?></div>
            <div class="date sub-heading"><?php 
                $timeStamp = $row['timestamp'];
                $timeStamp = date( "M d, Y", strtotime($timeStamp));
                echo $timeStamp;
            ?></div>

            <!-- update content -->
            <img src="../<?= $row['upd_pict'] ?>" alt="" class="update-image">
            <pre class="content" style="text-align: justify">
                <?= $row['upd_body'] ?>
            </pre>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../bottombar.php' ?>

    <footer class="copyright-footer">
        <div class="container-fluid">
            <div class="copyright paragraph">
                <i class="fa-solid fa-copyright"></i>
                Copyright <strong>PT Sumber Phoenix Makmur</strong>. All Rights Reserved
            </div>
            <div class="copyright-social-media">
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-instagram"></a>
                </div>
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-linkedin"></a>
                </div>
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-facebook"></a>
                </div>
                <div class="icon-container-box">
                    <a href="#" class="fa-brands fa-twitter"></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../script/nav.js"></script>
    <script src="../script/update/updates.js"></script>
    <!-- <script src="../script/contact/contact.js"></script> -->
</body>
</html>
