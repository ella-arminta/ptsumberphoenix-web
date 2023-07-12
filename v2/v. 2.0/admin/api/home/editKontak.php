<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ig = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];

    $stmt = $conn->prepare("UPDATE company_profile set fitur_data=? where fitur_name='instagram'");
    $berhasil1 = $stmt->execute([$ig]);

    $stmt = $conn->prepare("UPDATE company_profile set fitur_data=? where fitur_name='twitter'");
    $berhasil2 = $stmt->execute([$twitter]);

    $stmt = $conn->prepare("UPDATE company_profile set fitur_data=? where fitur_name='facebook'");
    $berhasil3 = $stmt->execute([$facebook]);

    $stmt = $conn->prepare("UPDATE company_profile set fitur_data=? where fitur_name='linkedin'");
    $berhasil4 = $stmt->execute([$linkedin]);

    if($berhasil1 == true && $berhasil2 == true && $berhasil3 == true && $berhasil4 == true){
        echo 'success';
    }else{
        echo 'false';
    }
}?>