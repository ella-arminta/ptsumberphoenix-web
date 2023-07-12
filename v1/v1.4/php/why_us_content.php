<?php
include 'connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $title_1 = $_POST['title_1'];
    $title_2 = $_POST['title_2'];
    $title_3 = $_POST['title_3'];
    $title_4 = $_POST['title_4'];

    $description_1 = $_POST['description_1'];
    $description_2 = $_POST['description_2'];
    $description_3 = $_POST['description_3'];
    $description_4 = $_POST['description_4'];

    $title = array($title_1, $title_2, $title_3, $title_4);
    $description = array($description_1, $description_2, $description_3, $description_4);

    $sql = "SELECT * FROM why_us_content WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 0) {
        for ($x = 0; $x < 4; $x++) {
            $sql = "INSERT INTO why_us_content (login_id, title, description) VALUES ('$id', '$title[$x]', '$description[$x]')";
            mysqli_query($conn, $sql);   
        }
    } else {
        for ($x = 0; $x < 4; $x++) {
            $content_id = $x + 1;
            $sql = $sql = "UPDATE why_us_content SET title = '$title[$x]', description = '$description[$x]' WHERE login_id = '$id' AND why_us_content_id = $content_id";
            mysqli_query($conn, $sql);
        }
    }

    header("location: ../templates/admin/home/why_us.php?success=1");
}
?>