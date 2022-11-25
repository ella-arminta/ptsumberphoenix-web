<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cats = $_POST['cats'];
    $success = TRUE;
    for ($i=1; $i <= count($cats) ; $i++) { 
        $stmt = $conn->prepare("UPDATE categories set order_by = ? where cat_id = ?");
        $berhasil = $stmt->execute([$i,$cats[$i-1]]);
        if(!$berhasil){
            $success = FALSE;
        }
    }
    if($success){
        echo 'success';

        // add to admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' has reordered the category.';
        $action = 'reorder category';
        $prevData = '';
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log
    }else{
        echo 'gagal';
    }
}
?>