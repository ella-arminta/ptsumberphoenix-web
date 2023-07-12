<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_testi'];
    $bool = $_POST['bool'];
    if($bool == 1){
        //set published
        $bool = 2;
    }else{
        // set private/not published
        $bool = 1;
    }
    $stmt = $conn->prepare("UPDATE testimonials set status = ? where testi_id=?");
    $berhasil = $stmt->execute([$bool,$id]);
    if($berhasil){
        echo 'success';
    }else{
        echo 'gagal';
    }
}
?>