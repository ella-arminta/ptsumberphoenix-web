<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_POST['name'];
    $about = $_POST['about'];
    $isi = $_POST['testimonial'];
    $response = '';
    $idtesti = $_POST['id'];
    $stmt=$conn->prepare('UPDATE testimonials SET testi_name=?,testi_intro=?,testi_isi=? where testi_id=? and status != 0');
    $berhasil = $stmt->execute([$nama,$about,$isi,$idtesti]);
    if($berhasil){
        $response='success';
    }
    
    // if image not empty
    if($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0){
        // add image
        $target_dir = "../../../data/testimonials/";
        $target_file = $target_dir.$nama.$about. basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $img_name = 'data/testimonials/'.$nama.$about.basename($_FILES["image"]["name"]);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // update image
                    $stmt=$conn->prepare('UPDATE testimonials SET testi_pp=? where testi_id=? and status != 0');
                    $berhasil = $stmt->execute([$img_name,$idtesti]);
                    if($berhasil){
                        $response= 'success';
                    }else{
                        $response= 'gagal';
                    }
                   
                }else{
                    $response = 'Failed To Upload Image';
                }
        }
    }

    echo $response;    
    
}

?>