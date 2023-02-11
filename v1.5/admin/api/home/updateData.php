<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $newData = $_POST['new'];
    $row = $_POST['col'];
    $response = [];

    // ambil prev Data
    $stmt = $conn->prepare("SELECT * FROM company_profile WHERE fitur_name = ?");
    $stmt->execute([$row]);
    $data = $stmt->fetch();
    $prevData = $data['fitur_data'];

    // ngeset new Data
    $stmt = $conn->prepare("UPDATE company_profile SET fitur_data =? WHERE fitur_name = ?");
    $berhasil = $stmt->execute([$newData,$row]);
    if($berhasil){
        $response[0] = 'success';

        // return response
        $stmt = $conn->prepare("SELECT * FROM company_profile WHERE fitur_name = ?");
        $stmt->execute([$row]);
        $data = $stmt->fetch();
        $response[1] = $data['fitur_data'];

        // add to admin log
        $adm_id = $_SESSION['admin_id'];
        $stmt = $conn->prepare('SELECT adm_name from admin where adm_id =?');
        $stmt->execute([$adm_id]);
        $name = $stmt->fetch();
        $namaAdm = $name['adm_name'];

        $desc = $namaAdm.' updated '.$row;
        $action = 'update';
        $stmt = $conn->prepare('INSERT INTO admin_log (action,log_desc,admin_id,prev_data) values (?,?,?,?)');
        $stmt->execute([$action,$desc,$adm_id,$prevData]);
        // end admin log

    }else{
        $response[0] = 'Failed to Update Data. Please Try Again.';

        $stmt = $conn->prepare("SELECT * FROM company_profile WHERE fitur_name = ?");
        $stmt->execute([$row]);
        $data = $stmt->fetch();
        $response[1] = $data['fitur_data'];
    }
    

    echo json_encode($response);
}else{
    header('Location: ../');
}
?>