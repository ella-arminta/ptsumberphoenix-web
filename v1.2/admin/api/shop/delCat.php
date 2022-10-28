<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catCode = $_POST['code'];

    // hapus subcategories nya
    $stmt = $conn->prepare("UPDATE subcategories set status = 0  where cat_id = (SELECT cat_id from categories where cat_code = ? and status = 1)");
    $berhasil = $stmt->execute([$catCode]);
    if($berhasil){
        // hapus category
        $stmt = $conn->prepare('UPDATE categories set status = 0 where cat_code = ? and status = 1');
        $berhasil = $stmt->execute([$catCode]);
        if($berhasil){
            $response = 'success';

            // add to admin log
            $adm_id = $_SESSION['admin_id'];
            $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
            $stmt->execute([$adm_id]);
            $name = $stmt->fetch();
            $namaAdm = $name['adm_name'];
    
            $desc = $namaAdm.' has delete a category named '.$catCode;
            $action = 'delete category';
            $prevData = $catCode;
            $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
            $stmt->execute([$action,$desc,$adm_id,$prevData]);
            // end admin log

        }else{
            $response = 'Failed to delete category';
        }
    }else{
        $response ='Failed to delete from subcategories';
    }
    echo $response;
}
?>