<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $upd_id = $_POST['upd_id'];
    $stmt = $conn->prepare("UPDATE updates set status = 'deleted' where upd_id =?");
    $berhasil = $stmt->execute([$upd_id]);
    if($berhasil){
        echo 'success';
    }else{
        echo 'gagal';
    }
}?>