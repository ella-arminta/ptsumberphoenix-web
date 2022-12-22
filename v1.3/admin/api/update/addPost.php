<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title  = $_POST['title'];
    $capt = $_POST['capt'];
    $body = $_POST['content'];
    $status = $_POST['stat'];
    $adm_id = $_SESSION['admin_id'];
    $stmt = $conn->prepare("SELECT adm_name from admin where adm_id = ?");
    $stmt->execute([$adm_id]);
    $writer = $stmt->fetch();
    $writer = $writer['adm_name'];
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
                $stmt = $conn->prepare("INSERT INTO updates (upd_title,upd_sub,adm_name,upd_pict,upd_body,status) values (?,?,?,?,?,?)");
                $berhasil = $stmt->execute([$title,$capt,$writer,$img_name,$body,$status]);
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
?>