<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $post = [];
    $stmt = $conn->prepare("SELECT * FROM updates where status ='published' order by timestamp desc LIMIT 4");
    $stmt->execute();
    while($row = $stmt->fetch()){
        array_push($post,$row);
    }
    echo json_encode($post);
}?>