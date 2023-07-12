<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $proId = $_POST['proId'];
    $resp = [];
    $stmt = $conn->prepare("select ps.product_id,sc.sub_code as sub_code from product_subcategory ps join subcategories sc on ps.subcategory_id = sc.sub_id where ps.product_id = ?");
    $stmt->execute([$proId]);
    while($subCode = $stmt->fetch()){
        array_push($resp,$subCode['sub_code']);
    }
    echo json_encode($resp);
}