<?php 
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name =$_POST['emp-name'];
    $position =$_POST['emp-position'];
    // $insta =$_POST['emp-insta'];
    // $linkedin =$_POST['emp-linkedin'];
    // $facebook =$_POST['emp-facebook'];
    // $twitter =$_POST['emp-twitter'];
    $insta = '';
    $linkedin = '';
    $facebook = '';
    $twitter = '';

    // add image
    $target_dir = "../../../data/team/";
    $target_file = $target_dir . basename($_FILES["emp-img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $img_name = 'data/team/'.basename($_FILES["emp-img"]["name"]);

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }else {
        if (move_uploaded_file($_FILES["emp-img"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare('INSERT INTO employees (emp_name,emp_img,emp_position,emp_insta,emp_linkedin,emp_facebook,emp_twitter) 
                                                    values (?,?,?,?,?,?,?)');
            $berhasil = $stmt->execute([$name,$img_name,$position,$insta,$linkedin,$facebook,$twitter]);
            if($berhasil){
                $response = 'success';

                // add admin log
                $adm_id = $_SESSION['admin_id'];
                $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
                $stmt->execute([$adm_id]);
                $namaAdm = $stmt->fetch();
                $namaAdm = $namaAdm['adm_name'];

                $desc = $namaAdm.' added '. $name.' as a teammate';
                $action = 'insert team';
                $prevData = 'none';
                $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
                $stmt->execute([$action,$desc,$adm_id,$prevData]);
                // end admin log
                
            }else{
                $response = 'fail adding to database';
            }

        }else{
            $response = 'Failed To Upload Image';
        }
    }

    echo $response;

}
?>