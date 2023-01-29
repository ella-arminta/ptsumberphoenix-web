<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['faq_title'];
    $desc = $_POST['faq_desc'];

    $stmt = $conn->prepare('INSERT INTO faq (faq_thumbnail,faq_desc) values (?,?)');
    $berhasil = $stmt->execute([$title,$desc]);
    if($berhasil){
        echo 'success';

        // add admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' added faq with the title : '.$title.' to client list.';
        $action = 'Add Faq';
        $prevData = 'none';
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log
    }else{
        echo 'gagal';
    }
}
?>