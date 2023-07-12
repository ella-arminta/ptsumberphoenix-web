<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $proCode = $_POST['code'];

    // hapus product nya
    $stmt = $conn->prepare("UPDATE products set status = 0  where product_code = ? and status = 1");
    $berhasil = $stmt->execute([$proCode]);
    if($berhasil){
            $response = 'success';

            // add to admin log
            $adm_id = $_SESSION['admin_id'];
            $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
            $stmt->execute([$adm_id]);
            $name = $stmt->fetch();
            $namaAdm = $name['adm_name'];
    
            $desc = $namaAdm.' has delete a product with the code '.$proCode;
            $action = 'delete product';
            $prevData = $proCode;
            $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
            $stmt->execute([$action,$desc,$adm_id,$prevData]);
            // end admin log
    }else{
        $response ='Failed to delete product';
    }
    echo $response;
}
?>