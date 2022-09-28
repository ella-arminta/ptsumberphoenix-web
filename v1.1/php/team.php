<?php
include 'connect.php';
session_start();

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $name_1 = $_POST['name_1'];
    $name_2 = $_POST['name_2'];
    $name_3 = $_POST['name_3'];
    $name_4 = $_POST['name_4'];
    $name = array($name_1, $name_2, $name_3, $name_4);

    $position_1 = $_POST['position_1'];
    $position_2 = $_POST['position_2'];
    $position_3 = $_POST['position_3'];
    $position_4 = $_POST['position_4'];
    $position = array($position_1, $position_2, $position_3, $position_4);

    $image_name_1 = $_FILES['image_1']['name'];
    $image_name_2 = $_FILES['image_2']['name'];
    $image_name_3 = $_FILES['image_3']['name'];
    $image_name_4 = $_FILES['image_4']['name'];
    $image_name = array($image_name_1, $image_name_2, $image_name_3, $image_name_4);

    $image_type_1 = $_FILES['image_1']['type'];
    $image_type_2 = $_FILES['image_2']['type'];
    $image_type_3 = $_FILES['image_3']['type'];
    $image_type_4 = $_FILES['image_4']['type'];
    $image_type = array($image_type_1, $image_type_2, $image_type_3, $image_type_4);

    $image_tmp_name_1 = $_FILES['image_1']['tmp_name'];
    $image_tmp_name_2 = $_FILES['image_2']['tmp_name'];
    $image_tmp_name_3 = $_FILES['image_3']['tmp_name'];
    $image_tmp_name_4 = $_FILES['image_4']['tmp_name'];
    $image_tmp_name = array($image_tmp_name_1, $image_tmp_name_2, $image_tmp_name_3, $image_tmp_name_4);

    $upload_dir = 'data/team';

    $sql = "SELECT * FROM team WHERE login_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 0) {
        for ($x = 0; $x < 4; $x++) {
            $ext = pathinfo($image_name[$x], PATHINFO_EXTENSION);
            $file_name = md5($image_name[$x]);
            $file_name = $file_name.'.'.$ext;

            $file_path = $upload_dir.'/'.$file_name;

            $sql = "INSERT INTO team (login_id, name, position, image) VALUES ('$id', '$name[$x]', '$position[$x]', '$file_path')";
            mysqli_query($conn, $sql);
            move_uploaded_file($image_tmp_name[$x], "../".$file_path);
        }
    } else {
        $sql = "SELECT * FROM team WHERE login_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $index = 0;

        while ($row = mysqli_fetch_array($result)) {
            if (!empty($image_name[$index])) {   
                $ext = pathinfo($image_name[$index], PATHINFO_EXTENSION);
                $file_name = md5($image_name[$index]);
                $file_name = $file_name.'.'.$ext;

                $file_path = $upload_dir.'/'.$file_name;

                $file_pointer = "../".$row['image'];
                unlink($file_pointer);

                $team_id = $row['team_id'];
    
                $sql = "UPDATE team SET name = '$name[$index]', position = '$position[$index]', image = '$file_path' WHERE login_id = '$id' AND team_id = '$team_id'";
                mysqli_query($conn, $sql);

                move_uploaded_file($image_tmp_name[$index], "../".$file_path);
            } else {
                $team_id = $row['team_id'];
                $sql = "UPDATE team SET name = '$name[$index]', position = '$position[$index]' WHERE login_id = '$id' AND team_id = '$team_id'";
                mysqli_query($conn, $sql);
            }
            $index++;
        }
    }

    header("location: ../templates/admin/home/team.php?success=1");
}

?>