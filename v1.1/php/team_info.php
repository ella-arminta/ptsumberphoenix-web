<?php
include 'connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];

    $sql = "SELECT * FROM team_info WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 0) {
        $sql = "INSERT INTO team_info (login_id, title, sub_title) VALUES ('$id', '$title', '$sub_title')";
        mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE team_info SET title = '$title', sub_title = '$sub_title' WHERE login_id = '$id'";
        mysqli_query($conn, $sql);
    }

    header("location: ../templates/admin/home/team.php?success=1");
}
?>