<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $id = (int) $_POST['id'];

    // ambil data sebelumnya
    $stmt =$conn->prepare('SELECT * FROM faq where faq_id=?');
    $stmt->execute([$id]);
    $faq = $stmt->fetch();

    // update faq
    $stmt = $conn->prepare('UPDATE faq  set faq_thumbnail = ?, faq_desc =? where faq_id =?');
    $berhasil = $stmt->execute([$title,$desc,$id]);
    if($berhasil){
        echo 'success';

        // add to admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' has edited faq with the title '.$faq['faq_thumbnail'].' from faq list.';
        $action = 'edit faq';
        $prevData = $faq['faq_desc'];
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log
    }else{
        echo 'failed';
    }
    
}
?>