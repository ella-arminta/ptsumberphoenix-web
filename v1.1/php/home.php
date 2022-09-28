<?php
include "connect.php";
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM home WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    $title = $_POST['title'];
    $title = str_replace("'", "\'", $title);

    $sub_title = $_POST['sub-title'];
    $sub_title = str_replace("'", "\'", $sub_title);

    if (!empty($_FILES["image"]['name'])) {
        $tmp_file = $_FILES["image"]["tmp_name"];
        $image_name = $_FILES["image"]["name"];
        $image_type = $_FILES["image"]["type"];
    
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
    
        $upload_dir = 'data/home';
        $file_name = md5($image_name);
        $file_name = $file_name.'.'.$ext;
    
        $file_path = $upload_dir.'/'.$file_name;
    }
    // print_r($file_path);

    try {
        if (mysqli_num_rows($result) === 0) {
            $sql = "INSERT INTO home (login_id, title, sub_title, home_image) VALUES ('$id', '$title', '$sub_title', '$file_path')";
            mysqli_query($conn, $sql);
        } else {            
            if (!empty($_FILES['image']['name'])) {
                print_r($_FILES['image']);
                $sql = "SELECT * FROM home WHERE login_id = '$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                $file_pointer = "../".$row['home_image'];
                print_r($file_pointer);
    
                try {
                    unlink($file_pointer);
                } catch (Exception $e) {
                    header("location: ../templates/admin/home/home.php?error=0");
                }
    
                $sql = "UPDATE home SET title = '$title', sub_title = '$sub_title', home_image = '$file_path' WHERE login_id = '$id'";
            } else {
                $sql = "UPDATE home SET title = '$title', sub_title = '$sub_title' WHERE login_id = '$id'";
            }

            mysqli_query($conn, $sql);
        }

        if (!empty($_FILES['image']['name'])) {
            move_uploaded_file($tmp_file, "../".$file_path);
        }
        header("location: ../templates/admin/home/home.php?success=1");

    } catch(Exception $e) {
        header("location: ../templates/admin/home/home.php?error=0");
    }
} 
?>