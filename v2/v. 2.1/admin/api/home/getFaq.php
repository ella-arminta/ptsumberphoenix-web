<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $response = [];
    $idFaq = $_POST['faq_id'];
    $stmt=$conn->prepare('SELECT * FROM faq where faq_id=?');
    $stmt->execute([$idFaq]);
    $faq = $stmt->fetch();
    $response[0] = $faq['faq_thumbnail'];
    $response[1] = $faq['faq_desc'];
    $response[2] = 'success';

    echo json_encode($response);
}

?>