<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $upd_id = $_POST['upd_id'];
    $bool = $_POST['boole'];
    if($bool == 0){
        $stat = 'published';
    }else if($bool == 1){
        $stat = 'featured';
    }else{
        $stat = 'tdkLanjut';
    }
    if($stat != 'tdkLanjut'){
        if($stat == 'featured'){
            $stmt = $conn->prepare("SELECT count(*) as count from updates where status = 'featured'");
            $stmt->execute();
            $count = $stmt->fetch();
            $countFeature = $count['count'];
            if($countFeature >= 4){
                echo 'kelebihan';
                exit();
            }
        }
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