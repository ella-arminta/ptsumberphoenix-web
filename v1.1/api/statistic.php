<?php
include 'connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $title_1 = $_POST['title_1'];
    $title_2 = $_POST['title_2'];
    $title_3 = $_POST['title_3'];
    $title_4 = $_POST['title_4'];

    $total_1 = $_POST['total_1'];
    $total_2 = $_POST['total_2'];
    $total_3 = $_POST['total_3'];
    $total_4 = $_POST['total_4'];

    $content_1 = $_POST['content_1'];
    $content_2 = $_POST['content_2'];
    $content_3 = $_POST['content_3'];
    $content_4 = $_POST['content_4'];

    $title = array($title_1, $title_2, $title_3, $title_4);
    $total = array($total_1, $total_2, $total_3, $total_4);
    $content = array($content_1, $content_2, $content_3, $content_4);

    $sql = "SELECT * FROM statistics WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 0) {
        for ($x = 0; $x < 4; $x++) {
            $sql = "INSERT INTO statistics (login_id, title, total, content) VALUES ('$id', '$title[$x]', '$total[$x]', '$content[$x]')";
            mysqli_query($conn, $sql);  
        }
    } else {
        for ($x = 0; $x < 4; $x++) {
            $statistics_id = $x + 1;
            $sql = $sql = "UPDATE statistics SET title = '$title[$x]', content = '$content[$x]', total = '$total[$x]' WHERE login_id = '$id' AND statistics_id = $statistics_id";
            mysqli_query($conn, $sql);
        }
    }

    header("location: ../templates/admin/home/statistic.php?success=1");
}
?>