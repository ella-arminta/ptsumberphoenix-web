<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    $catCode = strtoupper($_POST['catCode']);

    // cek apakah category nama udah ada?
    $stmt =$conn->prepare('SELECT * FROM categories where UPPER(cat_name) =?');
    $stmt->execute([strtoupper($catName)]);
    if($stmt->rowCount() > 0){
        $response[0] = 'Category name is already used';
    }else{
        // cek apakah category code udah ada?
        $stmt =$conn->prepare('SELECT * FROM categories where cat_code =?');
        $stmt->execute([$catCode]);
        if($stmt->rowCount() > 0){
            $response[0] = 'Category code is already used';
        }else{
            $stmt =$conn->prepare('INSERT INTO categories (cat_name,cat_code) values (?,?)');
            $berhasil=$stmt->execute([$catName,$catCode]);
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
                $response[0] = 'failed';
            }
        }
    }
    echo json_encode($response);
}
?>