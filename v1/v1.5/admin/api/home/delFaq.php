<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $faq_id = $_POST['id'];

    // ambil data sebelumnya
    $stmt =$conn->prepare('SELECT * FROM faq where faq_id=?');
    $stmt->execute([$faq_id]);
    $faq = $stmt->fetch();

    // delete faq
    $stmt = $conn->prepare('DELETE FROM faq where faq_id =?');
    $berhasil = $stmt->execute([$faq_id]);
    if($berhasil){
        echo 'success';

        // add to admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' has deleted faq with the title '.$faq['faq_thumbnail'].' from faq list.';
        $action = 'delete faq';
        $prevData = $faq['faq_desc'];
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log

    }else{
        echo 'failed';
    }
}
?>