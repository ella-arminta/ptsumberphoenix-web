<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $client_id = $_POST['index'];

    // ambil client name
    $stmt =$conn->prepare('SELECT * from clients where client_id=?');
    $stmt->execute([$client_id]);
    $client_name = $stmt->fetch();
    $client_logo = $client_name['client_logo'];
    $client_name = $client_name['client_name'];
    

    $stmt =$conn->prepare('DELETE from clients where client_id=?');
    $berhasil = $stmt->execute([$client_id]);

    if($berhasil){
        echo 'success';
        
        // add to admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' has deleted '.$client_name.' from client list.';
        $action = 'delete client';
        $prevData = $client_logo;
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log

    }else{
        echo 'Client Image not Found';
    }
}
?>