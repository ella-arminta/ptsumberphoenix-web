<?php 
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $client_name = $_POST['clientName'];

    $target_dir = "../../../src/client/";
    $target_file = $target_dir . basename($_FILES["imageClient"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $img_name = basename($_FILES["imageClient"]["name"]);

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["imageClient"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO clients (client_logo,client_name) values (?,?)");
            $stmt->execute(['client/'.$img_name,$client_name]);
            $response[0] = 'success';

            $stmt = $conn->prepare("SELECT * from clients where client_name = ?");
            $stmt->execute([$client_name]);
            $resp = $stmt->fetch();
            $response[1] = $resp['client_id'];
            $response[2] = $resp['client_name'];
            $response[3] = $resp['client_logo'];

            // add admin log
            $adm_id = $_SESSION['admin_id'];
            $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
            $stmt->execute([$adm_id]);
            $name = $stmt->fetch();
            $namaAdm = $name['adm_name'];

            $desc = $namaAdm.' added '.$response[2].' to client list.';
            $action = 'Add Client';
            $prevData = 'none';
            $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
            $stmt->execute([$action,$desc,$adm_id,$prevData]);
            // end admin log

        }else{
            $response[0] = 'Failed To Upload';
        }
    }
    echo json_encode($response);
}
?>