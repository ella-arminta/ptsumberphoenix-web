<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $bool = $_POST['bool'];
    $code = $_POST['code'];
    $stmt = $conn->prepare("UPDATE products set best_seller = ? where product_code = ? and status = 1");
    $berhasil = $stmt->execute([$bool,$code]);
    if($berhasil){
        echo 'success';
    }else{
        echo 'gagal';
    }
}
?>