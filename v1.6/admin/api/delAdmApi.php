<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $adm_id = $_POST['admId'];
    // cari namanya dulu
    $stmt = $conn->prepare("SELECT adm_name from admin where adm_id=?");
    $stmt->execute([$adm_id]);
    $name = $stmt->fetch();
    $name = $name['adm_name'];

    $stmt = $conn->prepare("DELETE FROM admin where adm_id =?");
    $berhasil = $stmt->execute([$adm_id]);
    if($berhasil){
        echo 'success';
         // add admin log
         $adm_id = $_SESSION['admin_id'];
         $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
         $stmt->execute([$adm_id]);
         $namaAdm = $stmt->fetch();
         $namaAdm = $namaAdm['adm_name'];
 
         $desc = $namaAdm.' deleted '. $name.' from admin';
         $action = 'delete admin';
         $prevData = $name;
         $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
         $stmt->execute([$action,$desc,$adm_id,$prevData]);
         // end admin log
    }else{
        echo 'gagal';
    }
}
?>