<?php
include "connect.php";
session_start();

$id = $_SESSION['id'];
$business_fields_id = $_POST['business_fields_id'];
$title = $_POST['title'];

if (!empty($_FILES['image']['name'])) {
    $tmp_file = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];

    $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
    $upload_dir = 'data/business_fields';
    $file_name = md5($image_name);
    $file_name = $file_name.'.'.$ext;

    $file_path = $upload_dir.'/'.$file_name;

    $sql = "SELECT * FROM business_fields WHERE business_fields_id = '$business_fields_id' AND login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    $file_pointer = "../".$row['image'];

    try {
        unlink($file_pointer);
    } catch (Exception $e) {
        header("location: ../templates/admin/home/business_fields.php?error=0");
    }

    move_uploaded_file($tmp_file, "../".$file_path);

    $sql = "UPDATE business_fields SET title = '$title', image = '$file_path' WHERE login_id = '$id' AND business_fields_id = '$business_fields_id'";
} else {
    $sql = "UPDATE business_fields SET title = '$title' WHERE login_id = '$id' AND business_fields_id = '$business_fields_id'";
}

mysqli_query($conn, $sql);
echo "success";
?>