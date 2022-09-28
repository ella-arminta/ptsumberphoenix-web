<?php
include '../connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $about = $_POST['about'];
    $testimonial = $_POST['testimonial'];

    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
    $upload_dir = 'data/testimonials';
    $file_name = md5($image_name);
    $file_name = $file_name.'.'.$ext;

    $file_path = $upload_dir.'/'.$file_name;
    move_uploaded_file($image_tmp_name, "../../".$file_path);

    $sql = "INSERT INTO testimonial (login_id, name, about, testimonial, image, display) VALUES ('$id', '$name', '$about', '$testimonial', '$file_path', '0')";   
    mysqli_query($conn, $sql);

    header("location: ../../templates/testimonial.php?success=1");
}
?>