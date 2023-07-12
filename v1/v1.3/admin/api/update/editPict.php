<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $upd_id = $_POST['pictId'];
    if ($_FILES['pict']['size'] == 0 ){
        echo 'kosong';
    }else{
        // add picture
        $target_dir = "../../../data/update/";
        $rename = time().'-'.basename($_FILES["pict"]["name"]);
        $target_file = $target_dir . $rename;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $img_name = 'data/update/'.$rename;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $response = "salahTipeIMG";
        }else {
                if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
                    $stmt = $conn->prepare('UPDATE updates set upd_pict = ? where upd_id = ?');
                    $berhasil = $stmt->execute([$img_name,$upd_id]);
                    if($berhasil){
                        echo 'success';
                    }else{
                        echo 'gagal';
                    }
                }
                else{
                    $response='gagal upload foto';
                }
        }
    }
    
}
?>