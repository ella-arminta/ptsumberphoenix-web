<?php
include 'connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $description = $_POST['description'];

    $sql = "SELECT * FROM why_us WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO why_us (login_id, description) VALUES ('$id', '$description')";
    } else {
        $sql = "UPDATE why_us SET description = '$description' WHERE login_id = '$id'";
    }

    mysqli_query($conn, $sql);
    header("location: ../templates/admin/home/why_us.php?success=1");
}
?>