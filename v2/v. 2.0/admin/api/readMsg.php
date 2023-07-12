<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $stmt=$conn->prepare("UPDATE messages set status = 'seen' where id_msg =? ");
    $berhasil = $stmt->execute([$id]);

    $stmt =$conn->prepare("SELECT * FROM messages where id_msg=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    $subject = $row['subject'];

    if($berhasil){
        echo 'success';
        // add admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $namaAdm = $stmt->fetch();
        $namaAdm = $namaAdm['adm_name'];

        $desc = $namaAdm.' has read the message with subject of '.$subject;
        $action = 'read message';
        $prevData = $id;
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log
    }else{
        echo 'gagal';
    }
}
?>