<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_SESSION['admin_id'])){
        echo 'loginFirst';
        exit;
    }
    $proId = $_POST['proId'];
    $proName = $_POST['proName'];
    $proDesc = $_POST['isi'];
    // echo $proDesc;
    if(!isset($_POST['subs'])){
        $response = 'Choose 1 category minimal';
    }else{
        $subcats = $_POST['subs'];
    }
    
    $response='success';

    if(isset($subcats)){
        // cek ada gk sub nya?
        foreach($subcats as $sub){
            $stmt = $conn->prepare('SELECT * FROM subcategories where sub_code =? and status = 1');
            $stmt->execute([$sub]);
            if($stmt->rowCount() <= 0){
                // $response = 'Failed. Subcategory that checked is not valid';
                $response = 'subcatNotValid';
                echo 'subcatNotValid';
                exit();
            }
        }
    }
    
    // Update products
    try{
        $stmt = $conn->prepare('UPDATE products set product_name=?,product_desc=? where product_id=?');
        $berhasil= $stmt->execute([$proName,$proDesc,$proId]);
            
        // delete subcats sebelumnya
        $stmt = $conn->prepare("DELETE FROM `product_subcategory` WHERE product_id =?");
        $stmt->execute([$proId]);
        // tambah subcat yang baru
        foreach($subcats as $sub){
            $stmt = $conn->prepare('INSERT INTO product_subcategory (product_id,subcategory_id) values (?,(select sub_id from subcategories where sub_code =? and status = 1))');
            $berhasil = $stmt->execute([$proId,$sub]);

            if($berhasil){
                // add to admin log
                $adm_id = $_SESSION['admin_id'];
                $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
                $stmt->execute([$adm_id]);
                $name = $stmt->fetch();
                $namaAdm = $name['adm_name'];
        
                $desc = $namaAdm.' has edited a product with the code '.$proId;
                $action = 'edit product';
                $prevData = $proId;
                $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
                $stmt->execute([$action,$desc,$adm_id,$prevData]);
                // end admin log
            }else{
                $response = 'failed to upload to database';
                echo 'failed upload to database';
                exit;
            }
        }

        // add image
        if (isset($_FILES['proImg']) && !empty($_FILES['proImg']['tmp_name'])) {
            $target_dir = "../../../data/product/";
            $rename = time().'-'.basename($_FILES["proImg"]["name"]);
            $target_file = $target_dir . $rename;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $img_name = 'data/product/'.$rename;

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                echo 'imageType';
                exit;
            } else {
                    if (move_uploaded_file($_FILES["proImg"]["tmp_name"], $target_file)) {
                        $stmt = $conn->prepare("UPDATE products set product_img =? where product_id=?");
                        $stmt->execute([$img_name,$proId]);

                    }else{
                        $response = 'Failed To Upload Image';
                        echo 'failedImageUpload';
                        exit;
                    }
            }
        }


    }catch (PDOException $e) {
    // Rollback the transaction if an exception occurs
        $conn->rollback();
        // Handle the exception
        echo 'error';
        exit;
    }
    
    echo $response;
}
?>