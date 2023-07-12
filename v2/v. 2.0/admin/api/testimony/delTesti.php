<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $testi_id = $_POST['id'];

    // ambil data sebelumnya
    $stmt =$conn->prepare('SELECT * FROM testimonials where testi_id=?');
    $stmt->execute([$testi_id]);
    $testi = $stmt->fetch();

    // delete testi
    $stmt = $conn->prepare('UPDATE testimonials set status = 0 where testi_id =?');
    $berhasil = $stmt->execute([$testi_id]);
    if($berhasil){
        echo 'success';

        // add to admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' has deleted testimony from '.$testi['testi_name'];
        $action = 'delete testi';
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$testi['testi_id']]);
        // end admin log

    }else{
        echo 'failed';
    }
}
?>