<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $upd_id = $_GET['upd_id'];
    $stmt= $conn->prepare("SELECT * FROM updates where upd_id = ?");
    $stmt->execute([$upd_id]);
    $row = $stmt->fetch();
    echo json_encode([$row['upd_title'],$row['upd_body']]);
}
?>