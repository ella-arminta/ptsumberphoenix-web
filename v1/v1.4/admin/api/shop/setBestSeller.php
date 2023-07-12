<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $bool = $_POST['bool'];
    $code = $_POST['code'];
    $stmt = $conn->prepare("UPDATE products set best_seller = ? where product_code = ? and status = 1");
    $berhasil = $stmt->execute([$bool,$code]);
    if($berhasil){
        echo 'success';
        // product name
        $stmt = $conn->prepare("SELECT * from products where product_code = ? and status = 1");
        $product = $stmt->execute([$code]);
        $proName = $stmt->fetch();
        $proName = $proName['product_name'];
         // add to admin log
         $adm_id = $_SESSION['admin_id'];
         $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
         $stmt->execute([$adm_id]);
         $name = $stmt->fetch();
         $namaAdm = $name['adm_name'];

         if($bool == 1){
            $desc = $namaAdm.' has set best seller for product named '.$proName;
            $action = 'set bestseller';
         }else{
            $desc = $namaAdm.' has remove best seller for product named '.$proName;
            $action = 'remove bestseller';
         }
         
         $prevData = $code;
         $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
         $stmt->execute([$action,$desc,$adm_id,$prevData]);
         // end admin log
    }else{
        echo 'gagal';
    }
}
?>