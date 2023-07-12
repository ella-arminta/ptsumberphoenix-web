<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $response = [];
    $idtesti = $_POST['id'];
    $stmt=$conn->prepare('SELECT * FROM testimonials where testi_id=? and status != 0');
    $stmt->execute([$idtesti]);
    
    if($stmt->rowCount() == 1){
        $testi = $stmt->fetch();
        $response[0] = 'success';
        $response[1] = htmlspecialchars($testi['testi_name']);
        $response[2] = htmlspecialchars($testi['testi_intro']);
        $response[3] = htmlspecialchars($testi['testi_isi']);
        $response[4] = $testi['testi_id'];
        echo json_encode($response);
    }else{
        $response[0] = 'gagal';
        echo json_encode($response);
    }

    
}

?>