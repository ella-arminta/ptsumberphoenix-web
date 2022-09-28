<?php
include "connect.php";
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $title = str_replace("'", "\'", $title);

    $description = $_POST['description'];
    $description = str_replace("'", "\'", $description);

    $history = $_POST['history'];
    $history = str_replace("'", "\'", $history);

    $experience = $_POST['experience'];
    $experience = str_replace("'", "\'", $experience);

    $philosophy = $_POST['philosophy'];
    $philosophy = str_replace("'", "\'", $philosophy);

    $purpose = $_POST['purpose'];
    $purpose = str_replace("'", "\'", $purpose);

    $sql = "SELECT * FROM about WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    try {
        if (mysqli_num_rows($result) === 0) {
            $sql = "INSERT INTO about (login_id, title, description, history, experience, philosophy, purpose) VALUES ('$id', '$title', '$description', '$history', '$experience', '$philosophy', '$purpose')";
            mysqli_query($conn, $sql);
        } else {
            $sql = "UPDATE about SET title='$title', description='$description', history='$history', experience='$experience', philosophy='$philosophy', purpose='$purpose' WHERE login_id = '$id'";
            mysqli_query($conn, $sql);
        }
    
        header("location: ../templates/admin/home/about.php?success=1");
    } catch (Exception $e) {
        header("location: ../templates/admin/home/about.php?error=0");
    }
}
?>