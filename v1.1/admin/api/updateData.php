<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $newData = $_POST['new'];
    $row = $_POST['col'];
    $response = [];

    $stmt = $conn->prepare("UPDATE company_profile SET fitur_data =? WHERE fitur_name = ?");
    $berhasil = $stmt->execute([$newData,$row]);
    if($berhasil){
        $response[0] = 'success';

        $stmt = $conn->prepare("SELECT * FROM company_profile WHERE fitur_name = ?");
        $stmt->execute([$row]);
        $data = $stmt->fetch();
        $response[1] = $data['fitur_data'];
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