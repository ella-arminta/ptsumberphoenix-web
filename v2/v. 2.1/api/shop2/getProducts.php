<?php
header('Content-Type: application/json');
include '../connect.php';
// card/products ini isi nya product_code,product_img,product_name,product_id
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $_SESSION['cat'] = 'RI';
    // echo $_SESSION['cat'];
    $proPerFetch = 3;
    // if(!isset($_SESSION['cat']) && !isset($_SESSION['subcat'])){
    //     $_SESSION['cat'] = 'random';
    // }
    $shown = json_decode($_POST['shown'],true);

    
    // KALO GET PRODUCTS BY SUBCATEGORY
    if(isset($_SESSION['subcat'])){

    }

    // KALO GET PRODUCTS BY CATEGORY
    else if(isset($_SESSION['cat'])){
        $category = $_SESSION['cat'];
        
        $stmt = $conn->prepare("SELECT * FROM `products` p 
        join  product_subcategory ps on (p.product_id = ps.product_id)
        join  subcategories sub on (ps.subcategory_id = sub.sub_id)
        join categories cat on (sub.cat_id = cat.cat_id)
        where cat_code = ? and p.status = 1
        order by RAND()");
        $stmt->execute([$category]);
        $newCount = 0;
        while($row = $stmt->fetch()){
            $newProId = $row['product_id'];
            $ada = False;
            for ($i=0; $i < count($shown); $i++) { 
                if($shown[$i]['product_id'] == $newProId){
                    $ada = True;
                }
            }
            if(!$ada){
                array_push($shown,
                [
                    "product_id"=>$row['product_id'],
                    "product_name"=>$row['product_name'],
                    "product_code"=>$row['product_code'],
                    "product_img"=>$row['product_img'],
                    "id_gabungan"=>$row['id_gabungan'],
                    "subcategory_id"=>$row['subcategory_id'],
                    "cat_id"=>$row['cat_id'],
                    "sub_code"=>$row['sub_code'],
                    "sub_name"=>$row['sub_name'],
                    "cat_code"=>$row['cat_code'],
                    "cat_name"=>$row['cat_name']
                ]
                );
                $newCount+=1;
            }
            if($newCount >= $proPerFetch){
                break;
            }
        }
        echo json_encode($shown);
    }
    
}