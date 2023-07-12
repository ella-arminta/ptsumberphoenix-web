<?php
// perjanjian tampilin di php nya pake Code. tp di database mysql pake id
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catCode = strtoupper($_POST['catCode']);
    $subName = $_POST['subName'];
    $subCode = strtoupper($_POST['subCode']);
    // cari catId
    $stmt = $conn->prepare('SELECT cat_id from categories where cat_code=? and status = 1');
    $stmt->execute([$catCode]);
    if($stmt->rowCount() > 0){ //apakah category ada?
        // jika ada
        $catId = $stmt->fetch();
        $catId = $catId['cat_id'];

        // cek apakah sub_name udah ada di category itu 
        $stmt =$conn->prepare("SELECT * from subcategories where UPPER(sub_name)=? and cat_id = (SELECT cat_id from categories where cat_code=? and status = 1) and status = 1");
        $stmt->execute([strtoupper($subName),$catCode]);
        if($stmt->rowCount() > 0){ // jika sub name udah ada
            $response[0] = 'Subcategory name is already used';
        }else{
            // cek apakah sub_code udah ada
            $stmt =$conn->prepare("SELECT * From subcategories where sub_code=? and status = 1");
            $stmt->execute([$subCode]);
            if($stmt->rowCount() > 0){ // jika sub name udah ada
                $response[0] = 'Subcategory code is already used';
            }else{
                $stmt= $conn->prepare("INSERT INTO subcategories (cat_id,sub_code,sub_name) values (?,?,?)");
                $berhasil = $stmt->execute([$catId,$subCode,$subName]);
                if($berhasil){
                    $response[0] = 'success';
                    $response[1] = $subName;
                    $response[2] = $subCode;
                    $response[3] = $catCode;

                    // add to admin log
                    $adm_id = $_SESSION['admin_id'];
                    $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
                    $stmt->execute([$adm_id]);
                    $name = $stmt->fetch();
                    $namaAdm = $name['adm_name'];
            
                    $desc = $namaAdm.' has added a subcategori named '.$subName;
                    $action = 'add subcategory';
                    $prevData = $subName;
                    $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
                    $stmt->execute([$action,$desc,$adm_id,$prevData]);
                    // end admin log

                }else{
                    $response[0] = 'failed';
                }
            }  
        }
    }else{
        $response[0] = 'Category tidak ditemukan';
    }

    echo json_encode($response);
}
?>