<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if($_POST['for'] == 'autocomplete'){ //untuk autocomplete
        $hasil = [];
        $input = strtolower($_POST['val']);
        $stmt = $conn->prepare("SELECT * FROM products where status = 1 and lower(product_name) like ? ");
        $stmt->execute(['%'.$input.'%']);

        while($row = $stmt->fetch()){
            array_push($hasil,$row['product_name']);
        }
        echo json_encode(['success',$hasil]);
    }else{ // untuk submit search button

    }
}

?>