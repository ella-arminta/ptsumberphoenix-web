<?php
include "connect.php";
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    print_r('hi');
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "SELECT * FROM business_fields_information WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 0) {
        $sql = "INSERT INTO business_fields_information (login_id, title, description) VALUES ('$id', '$title', '$description')";
    } else {
        $sql = "UPDATE business_fields_information SET title = '$title', description = '$description' WHERE login_id = '$id'";
    }

    mysqli_query($conn, $sql);
    header("location: ../templates/admin/home/business_fields.php?success=1");
}
?>