<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $conn->prepare("SELECT * FROM categories where status = 1");
    $stmt->execute();
    $i = 0;
    while($cat = $stmt->fetch()){
        $catCode[$i] = $cat['cat_code'];
        $catName[$i++] = $cat['cat_name'];
    }
    $response[0] = $catCode;
    $response[1] = $catName;
    echo json_encode($response);
}