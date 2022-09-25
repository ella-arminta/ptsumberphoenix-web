<?php
include "connect.php";
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $title = str_replace("'", "\'", $title);

    $tmp_file = $_FILES["image"]["tmp_name"];
    $image_name = $_FILES["image"]["name"];
    $image_type = $_FILES["image"]["type"];

    $ext = pathinfo($image_name, PATHINFO_EXTENSION);

    $upload_dir = 'data/business_fields';
    $file_name = md5($image_name);
    $file_name = $file_name.'.'.$ext;

    $file_path = $upload_dir.'/'.$file_name;

    try {
        $sql = "INSERT INTO business_fields (login_id, title, image) VALUES ('$id', '$title', '$file_path')";
        $result = mysqli_query($conn, $sql);
        move_uploaded_file($tmp_file, "../".$file_path);
    } catch(Exception $e) {
        header("location: ../templates/admin/home/business_fields.php?error=0");
    }

    header("location: ../templates/admin/home/business_fields.php?success=1");
}
?>