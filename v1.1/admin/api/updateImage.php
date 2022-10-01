<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$target_dir = "../../data/home/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img_name = basename($_FILES["image"]["name"]);
$response = [];
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        
        $stmt = $conn->prepare("UPDATE company_profile set fitur_data = ? where fitur_name = ?");
        $stmt->execute(['data/home/'.$img_name,'home_image']);

        $response[0] = 'success';
        $response[1] = 'data/home/'.$img_name;
    } else {
       $response = 'Failed To Upload';
    }
}    

echo json_encode($response);
}else{
    header('Location: ../');
}
?>