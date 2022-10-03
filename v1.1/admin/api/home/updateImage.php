<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$target_dir = "../../../data/home/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img_name = basename($_FILES["image"]["name"]);
$response = [];

// prev data
$stmt = $conn->prepare('SELECT fitur_data FROM company_profile where fitur_name = ?');
$stmt->execute(['home_image']);
$prevData = $stmt->fetch();
$prevData = $prevData['fitur_data'];

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        
        $stmt = $conn->prepare("UPDATE company_profile set fitur_data = ? where fitur_name = ?");
        $stmt->execute(['data/home/'.$img_name,'home_image']);

        $response[0] = 'success';
        $response[1] = 'data/home/'.$img_name;

        // add admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' updated home image';
        $action = 'update image';
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log

    } else {
       $response = 'Failed To Upload';
    }
}    

echo json_encode($response);
}else{
    header('Location: ../');
}
?>