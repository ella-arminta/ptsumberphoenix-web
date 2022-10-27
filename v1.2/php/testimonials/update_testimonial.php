<?php
include '../connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['update'])) {
    print_r($_POST);
    $testimonial_id = $_POST['testimonial_id'];

    if (isset($_POST['highlight'])) {
        $sql = "UPDATE testimonial SET display = '1' WHERE testimonial_id = '$testimonial_id'";
    } else {
        $sql = "UPDATE testimonial SET display = '0' WHERE testimonial_id = '$testimonial_id'";
    }

    mysqli_query($conn, $sql);
    header("location: ../../templates/admin/home/testimonials.php?success=1");
}
?>