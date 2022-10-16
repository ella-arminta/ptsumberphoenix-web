<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $conn->prepare("SELECT * FROM subcategories order by cat_id");
    $stmt->execute();
    $i = 0;
    while($cat = $stmt->fetch()){
        $subCode[$i] = $cat['sub_code'];
        $subName[$i++] = $cat['sub_name'];
    }
    $response[0] = $subCode;
    $response[1] = $subName;

    // jumlah categori
    $stmt = $conn->prepare('SELECT s.cat_id as catId,count(s.cat_id) as count,c.cat_name as catName from subcategories s join categories c on (c.cat_id = s.cat_id) group by s.cat_id;');
    $stmt->execute();
    $j = 0;
    while($subCatCount = $stmt->fetch()){
        $catCount[$j] =  $subCatCount['count'];
        $catName[$j++] = $subCatCount['catName'];
    }
    $response[2] = $catName;
    $response[3] = $catCount;

    echo json_encode($response);
}