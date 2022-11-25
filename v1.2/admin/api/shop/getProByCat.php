<?php
include '../connect.php';
// card ini isi nya product_code,product_img,product_name,product_id
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $catCode = $_GET['catCode'];
    $shown = json_decode($_GET['shown']);
    $shown = json_decode(json_encode($shown), true);
    $totCard = '';

    $ids = [];
    for ($i=0; $i < count($shown); $i++) { 
        array_push($ids,$shown[$i]['product_id']);
    }
    // var_dump($ids);
    // Create an array of ? characters the same length as the number of IDs and join
    // it together with commas, so it can be used in the query string
    // if(count($ids) == 1){
    //     $placeHolders = '?';
    // }else{
        $placeHolders = implode(', ', array_fill(0, count($ids), '?'));
    // }

    if(count($ids) > 0){
        $stmt = $conn->prepare("SELECT DISTINCT p.product_id as product_id, p.product_code as product_code, p.product_name as product_name,p.product_img as product_img,p.best_seller as best_seller, p.featured as featured, c.cat_code as cat_code, c.cat_name as cat_name
        FROM products p join product_subcategory ps ON p.product_id = ps.product_id 
        join subcategories s on s.sub_id = ps.subcategory_id
        join categories c on s.cat_id =c.cat_id where c.cat_code = 'RI'  and p.product_id NOT IN ($placeHolders) and p.status = 1 ORDER BY rand() LIMIT 1");
        
        // $stmt->bindValue(1, $catCode);
        foreach ($ids as $index => $value) {
            $stmt->bindValue($index + 1, $value, PDO::PARAM_INT);
        }   
      
        // $stmt->bindValue(count($ids)+1,$catCode);
        $stmt->execute();
        // var_dump($stmt->rowCount());
    }else{
        $stmt = $conn->prepare("SELECT DISTINCT p.product_id as product_id, p.product_code as product_code, p.product_name as product_name,p.product_img as product_img,p.best_seller as best_seller, p.featured as featured, c.cat_code as cat_code, c.cat_name as cat_name
        FROM products p join product_subcategory ps ON p.product_id = ps.product_id 
        join subcategories s on s.sub_id = ps.subcategory_id
        join categories c on s.cat_id =c.cat_id where p.status = 1 and c.cat_code = ? ORDER BY rand()");    
        $stmt->execute([$catCode]);
    }

    // Iterate the IDs and bind them
    // Remember ? placeholders are 1-indexed!

    // var_dump($stmt->rowCount());
    while($product = $stmt->fetch()){
        $card = array(
            "product_id" => $product['product_id'],
            "product_code" => $product['product_code'],
            "product_name" =>$product['product_name'],
            "product_img" => $product['product_img'],
            "best_seller" => $product['best_seller'],
            "featured" => $product['featured']
        );
        array_push($shown,$card); 
    }
    $stmt2 = $conn->prepare('SELECT DISTINCT p.product_id as product_id, p.product_code as product_code, p.product_name as product_name,p.product_img as product_img,p.best_seller as best_seller, p.featured as featured, c.cat_code as cat_code, c.cat_name as cat_name
    FROM products p join product_subcategory ps ON p.product_id = ps.product_id 
    join subcategories s on s.sub_id = ps.subcategory_id
    join categories c on s.cat_id =c.cat_id where p.status = 1 and c.cat_code = ?');
    $stmt2->execute([$catCode]);
    $totCard = $stmt2->rowCount();

    $jumCard = $totCard  - count($shown);
    $stmt2 = $conn->prepare("SELECT cat_name from categories where cat_code=?");
    $stmt2->execute([$catCode]);
    $catName = $stmt2->fetch();
    if($stmt2->rowCount()>0){
        $catName = $catName['cat_name'];
    }

    // $response = ['success',$cards, sisa card
    $response = ['success',$shown,$jumCard,$catName];

    echo json_encode($response);    
}
