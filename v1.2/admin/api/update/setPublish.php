<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $upd_id = $_POST['upd_id'];
    $bool = $_POST['boole'];
    if($bool == 0){
        $stat = 'draft';
    }else if($bool == 1){
        $stat = 'published';
    }else{
        $stat = 'tdkLanjut';
    }
    if($stat != 'tdkLanjut'){
        $stmt = $conn->prepare("UPDATE updates set status = ? where upd_id =?");
        $berhasil = $stmt->execute([$stat,$upd_id]);
        if($berhasil){
            echo 'success';
        }else{
            echo 'gagal';
        }
    }else{
        echo 'gagal';
    }
   
}?>