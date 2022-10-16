<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $proName = $_POST['proName'];
    $proDesc = $_POST['isi'];
    $proDeli = $_POST['proDelv'];
    $custServ = $_POST['custServ'];
    if(!isset($_POST['subs'])){
        $response = 'Choose 1 category minimal';
    }else{
        $subcats = $_POST['subs'];
    }
    $proCode = strtoupper($_POST['proCode']);
    
    $response='lanjut';

    // cek proCode udah dipakai belum?
    $stmt = $conn->prepare("SELECT product_id FROM products where UPPER(product_code) =?");
    $stmt->execute([$proCode]);
    if($stmt->rowCount() > 0 ){
        $response = 'Failed to post product. Product code already used, please pick another code for the product.';
    }

    if(isset($subcats)){
        // cek ada gk sub nya?
        foreach($subcats as $sub){
            $stmt = $conn->prepare('SELECT * FROM subcategories where sub_code =?');
            $stmt->execute([$sub]);
            if($stmt->rowCount() <= 0){
                $response = 'Failed. Subcategory that checked is not valid';
            }
        }
    }
    
    
    if($response == 'lanjut'){
        // add image
        $target_dir = "../../../data/product/";
        $target_file = $target_dir . basename($_FILES["proImg"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $img_name = 'data/product/'.basename($_FILES["proImg"]["name"]);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }elseif (empty($proName) || empty($proDesc) || empty($proDeli) || empty($custServ) || empty($subcats) ||empty($proCode) ) {
            $response ='Failed , please fill out all the data';
        }else {
                if (move_uploaded_file($_FILES["proImg"]["tmp_name"], $target_file)) {
                    // insert into products
                    $stmt = $conn->prepare('INSERT INTO products (product_name,product_code,product_img,product_desc,product_delivery,customer_service) values (?,?,?,?,?,?)');
                    $berhasil= $stmt->execute([$proName,$proCode,$img_name,$proDesc,$proDeli,$custServ]);

                    if($berhasil){ // tambahkan ke product_subcategories.
                        foreach($subcats as $sub){
                            $stmt = $conn->prepare('INSERT INTO product_subcategory (product_id,subcategory_id) values ((select product_id from products where product_code=?),(select sub_id from subcategories where sub_code =?))');
                            $berhasil = $stmt->execute([$proCode,$sub]);

                            if($berhasil){
                                $response = 'success';
                            }else{
                                $response = 'failed'; 
                            }
                        }
                    }else{
                        $response = 'failed to upload to database';
                    }
                }else{
                    $response = 'Failed To Upload Image';
                }
        }
        
    }    

    echo $response;
}
?>