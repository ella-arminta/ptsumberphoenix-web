<?php
include '../admin/api/connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_POST['name'];
    $about = $_POST['about'];
    $isi = $_POST['testimonial'];

    $length = str_word_count($isi);
    if($length > 150){
        $response = "Testimony not allowed longer than 150 words.";
    }else{
        if(!empty($nama) && !empty($about) &&!empty($isi) ){
            $response='lanjut';
        }else{
            $response ='Fill out all the data needed';
        }
        
        if($response == 'lanjut'){
            // add image
            $target_dir = "../data/testimonials/";
            $target_file = $target_dir .$nama.$about. basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $img_name = 'data/testimonials/'.$nama.$about.basename($_FILES["image"]["name"]);
    
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // insert into testimonial
                        $stmt = $conn->prepare('INSERT INTO testimonials (testi_name,testi_intro,testi_pp,testi_isi) values (?,?,?,?)');
                        $berhasil= $stmt->execute([$nama,$about,$img_name,$isi]);
    
                        if($berhasil){ // tambahkan ke product_subcategories.
                            $response = 'success';
                        }else{
                            $response = 'failed to upload to database';
                        }
                    }else{
                        $response = 'Failed To Upload Image';
                    }
            }
            
        }    
    }
    echo $response;
}
?>