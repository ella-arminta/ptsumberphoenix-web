<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    $catCode = strtoupper($_POST['catCode']);
    

    // cek apakah category nama udah ada?
    $stmt =$conn->prepare('SELECT * FROM categories where UPPER(cat_name) =? and status = 1');
    $stmt->execute([strtoupper($catName)]);
    if($stmt->rowCount() > 0){
        $response[0] = 'Category name is already used';
    }else{
        // cek apakah category code udah ada?
        $stmt =$conn->prepare('SELECT * FROM categories where cat_code =? and status = 1');
        $stmt->execute([$catCode]);
        if($stmt->rowCount() > 0){
            $response[0] = 'Category code is already used';
        }else{
            // cari order terbesar
            $stmt = $conn->prepare('SELECT max(order_by) as myorder from categories where status = 1');
            $stmt->execute();
            $order = $stmt->fetch();
            $order = $order['myorder']+1;

            $stmt =$conn->prepare('INSERT INTO categories (cat_name,cat_code,order_by) values (?,?,?)');
            $berhasil=$stmt->execute([$catName,$catCode,$order]);
            if($berhasil){
                // add image cat
                $target_dir = "../../../data/category/";
                $target_file = $target_dir . basename($_FILES["catImg"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $img_name = 'data/category/'.basename($_FILES["catImg"]["name"]);

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }else {
                        if (move_uploaded_file($_FILES["catImg"]["tmp_name"], $target_file)) {
                            // insert into categorys
                            $stmt = $conn->prepare('UPDATE categories set cat_img=? where cat_code =? and status = 1');
                            $berhasil= $stmt->execute([$img_name,$catCode]);

                            if($berhasil){ 
                                        $response[0] ='success';
                                        $response[1] = $catCode;
                                        $response[2] = $catName;
                                
                                        // add to admin log
                                        $adm_id = $_SESSION['admin_id'];
                                        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
                                        $stmt->execute([$adm_id]);
                                        $name = $stmt->fetch();
                                        $namaAdm = $name['adm_name'];
                                
                                        $desc = $namaAdm.' has added a category named '.$catName;
                                        $action = 'add category';
                                        $prevData = $catName;
                                        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
                                        $stmt->execute([$action,$desc,$adm_id,$prevData]);
                                        // end admin log
                            }else{
                                $response = 'failed to upload to database';
                            }
                        }else{
                            $response = 'Failed To Upload Image';
                        }
                }
                
            }else{
                $response[0] = 'failed';
            }
        }
    }
    echo json_encode($response);
}
?>