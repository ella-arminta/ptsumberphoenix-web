<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $body = $_POST['content'];
    $title = $_POST['title'];
    $capt = $_POST['capt'];
    $upd_id = $_POST['id'];
    if(!empty($body) && !empty($title) && !empty($capt)){
        $stmt = $conn->prepare("UPDATE updates set upd_title = ?,upd_sub= ?,upd_body= ? where upd_id = ?");
        $berhasil = $stmt->execute([$title,$capt,$body,$upd_id]);
        if($berhasil){
            echo 'success';
        }else{
            echo 'error';
        }
    }else{
        echo 'kosong';
    }
}