<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $subCode = $_POST['code'];

    // hapus dari product_subcategories dulu
    $stmt = $conn->prepare("DELETE FROM `product_subcategory` WHERE subcategory_id = (select sub_id from subcategories where sub_code = ?)");
    // $stmt = $conn->prepare('UPDATE product_subcategory  ps join subcategories s on (ps.subcategory_id = s.sub_id) set ps.subcategory_id =? where s.sub_code =?');
    $berhasil = $stmt->execute([$subCode]);
    if($berhasil){
        $stmt = $conn->prepare('UPDATE subcategories set status=0 where sub_code=? and status = 1');
        $berhasil = $stmt->execute([$subCode]);
        if($berhasil){
            $response = 'success';

            // add to admin log
            $adm_id = $_SESSION['admin_id'];
            $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
            $stmt->execute([$adm_id]);
            $name = $stmt->fetch();
            $namaAdm = $name['adm_name'];
    
            $desc = $namaAdm.' has delete a subcategory named '.$subCode;
            $action = 'delete subcategory';
            $prevData = $subCode;
            $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
            $stmt->execute([$action,$desc,$adm_id,$prevData]);
            // end admin log

        }else{
            $response ='Failed to delete subcategory because of subcategories foreign key';
        }
    }else{
        $response = 'Failed to delete subcategory because of product_subcategory foreign key';
    }
    echo $response;
}
?>