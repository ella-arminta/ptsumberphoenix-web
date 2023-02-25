<?php
include '../connect.php';
$proCard = `
    <div class="col-lg-4 col-md-6 mb-4">
    <div class="card" onclick="window.location.href='./single/product.html'">
        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
            <img src="../src/product/product-dummy-1.png" class="w-100" />
        </div>
        <!-- <hr> -->
        <div class="card-body">
            <div class="product-title">Lorem Ipsum</div>
        </div>
    </div>
    </div>
`;
// card ini isi nya product_code,product_img,product_name,product_id
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $catCode = $_GET['catCode'];
    $shown = json_decode($_GET['shown']);
    $shown = json_decode(json_encode($shown), true);

    $totCard = '';
    // GET PRODUCT RANDOM pertama kali
    if($catCode == 'random'){
        $ids = [];
        // ambil product tebaru
        if(count($ids) == 0){
            $stmt=$conn->prepare("SELECT * FROM products where status = 1 ORDER BY product_id desc");
            $stmt->execute();
            $totCard = $stmt->rowCount();
            $newest = $stmt->fetch();
            if($totCard > 0){
                $card = array(
                    "product_id" => $newest['product_id'],
                    "product_code" => $newest['product_code'],
                    "product_name" =>$newest['product_name'],
                    "product_img" => $newest['product_img'],
                    "best_seller" => $newest['best_seller'],
                    "featured" => $newest['featured']
                );
                // json_encode($card);
                array_push($shown,$card); 
            }
        }
        $ids = [];
        for ($i=0; $i < count($shown); $i++) { 
            array_push($ids,$shown[$i]['product_id']);
        }
        if($totCard > 0){
        // Create an array of ? characters the same length as the number of IDs and join
        // it together with commas, so it can be used in the query string
        $placeHolders = implode(', ', array_fill(0, count($ids), '?'));

        $stmt = $conn->prepare("SELECT * FROM `products` where product_id NOT IN ($placeHolders) and status = 1 ORDER BY rand() LIMIT 9");

        // Iterate the IDs and bind them
        // Remember ? placeholders are 1-indexed!
        foreach ($ids as $index => $value) {
            $stmt->bindValue($index + 1, $value, PDO::PARAM_INT);
        }

        $stmt->execute();

        while($product = $stmt->fetch()){
            $card = array(
                "product_id" => $product['product_id'],
                "product_code" => $product['product_code'],
                "product_name" =>$product['product_name'],
                "product_img" => $product['product_img'],
                "best_seller" => $product['best_seller'],
                "featured" => $product['featured']
            );
            // json_encode($card);
            array_push($shown,$card); 
        }
        $jumCard = intval($totCard)  - count($shown);
        // $response = ['success',$cards, sisa card
        $response = ['success',$shown,$jumCard];
    
        echo json_encode($response);    
        }else{
            echo json_encode('');
        }
        $_SESSION['cat'] = 'random';
    }else if($catCode == 'randKedua'){
        $ids = [];
        for ($i=0; $i < count($shown); $i++) { 
            array_push($ids,$shown[$i]['product_id']);
        }
        // Create an array of ? characters the same length as the number of IDs and join
        // it together with commas, so it can be used in the query string
        $placeHolders = implode(', ', array_fill(0, count($ids), '?'));
        // Prepare the statement
        if(count($ids) > 0){
            $stmt = $conn->prepare("SELECT * FROM `products` where product_id NOT IN ($placeHolders) and status = 1 ORDER BY rand() LIMIT 9");
        }else{
            $stmt = $conn->prepare("SELECT * FROM `products` where status = 1 ORDER BY rand() LIMIT 9");
        }
        
        // Iterate the IDs and bind them
        // Remember ? placeholders are 1-indexed!
        foreach ($ids as $index => $value) {
            $stmt->bindValue($index + 1, $value, PDO::PARAM_INT);
        }

        $stmt->execute();

        while($product = $stmt->fetch()){
            $card = array(
                "product_id" => $product['product_id'],
                "product_code" => $product['product_code'],
                "product_name" =>$product['product_name'],
                "product_img" => $product['product_img'],
                "best_seller" => $product['best_seller'],
                "featured" => $product['featured']
            );
            // json_encode($card);
            array_push($shown,$card); 
        }
        $stmt2 = $conn->prepare('SELECT * FROM products where status = 1');
        $stmt2->execute();
        $totCard = $stmt2->rowCount();
        $jumCard = intval($totCard)  - count($shown);
        //                     product terambil, jumlah sisa product
        $response = ['success',$shown,$jumCard];
        echo json_encode($response);    
    } else if($catCode == 'byName'){
        $proName = $_GET['proName'];
        $shown = [];
        $stmt = $conn->prepare("SELECT * FROM products where product_name like ? and status = 1");
        $stmt->execute(['%'.$proName.'%']);
        while($row = $stmt->fetch()){
            array_push($shown,$row);
        }
        $stmt2 = $conn->prepare('SELECT * FROM products where status = 1');
        $stmt2->execute();
        $totCard = $stmt2->rowCount();
        $jumCard = intval($totCard)  - count($shown);
        //                     product terambil, jumlah sisa product
        $response = ['success',$shown,$jumCard];
        echo json_encode($response);
    } else if($catCode == 'featured'){
        $proName = $_GET['proName'];
        $shown = [];
        $stmt = $conn->prepare("SELECT * FROM products where featured = 1 and status = 1");
        $stmt->execute();
        while($row = $stmt->fetch()){
            array_push($shown,$row);
        }
        $stmt2 = $conn->prepare('SELECT * FROM products where featured = 1 and status = 1');
        $stmt2->execute();
        $totCard = $stmt2->rowCount();
        $jumCard = intval($totCard)  - count($shown);
        //product terambil, jumlah sisa product
        $response = ['success',$shown,$jumCard];
        echo json_encode($response);
    }else if ($catCode == 'bestseller'){
        $proName = $_GET['proName'];
        $shown = [];
        $stmt = $conn->prepare("SELECT * FROM products where best_seller = 1 and status = 1");
        $stmt->execute();
        while($row = $stmt->fetch()){
            array_push($shown,$row);
        }
        $stmt2 = $conn->prepare('SELECT * FROM products where best_seller = 1 and status = 1');
        $stmt2->execute();
        $totCard = $stmt2->rowCount();
        $jumCard = intval($totCard)  - count($shown);
        //product terambil, jumlah sisa product
        $response = ['success',$shown,$jumCard];
        echo json_encode($response);
    }
    else{
        // $cek subcategory ada gak di database
        $stmt=$conn->prepare('SELECT * FROM subcategories where sub_code=? and status = 1');
        $stmt->execute([$catCode]);
        
        

        if($stmt->rowCount() > 0){
            // mencari total card
            $stmt=$conn->prepare("SELECT p.product_code,p.product_img,p.product_name,p.product_id,p.featured,p.best_seller FROM `product_subcategory` ps join products p on (ps.product_id = p.product_id) join subcategories s on (ps.subcategory_id = s.sub_id) where s.sub_code = ?  and p.status = 1 and s.status = 1 ORDER BY p.product_id desc");
            $stmt->execute([$catCode]);
            $totCard = $stmt->rowCount();
            $ids = [];
            for ($i=0; $i < count($shown); $i++) { 
                array_push($ids,$shown[$i]['product_id']);
            }
            if(count($ids) > 0){
                // Create an array of ? characters the same length as the number of IDs and join
                // it together with commas, so it can be used in the query string
                $placeHolders = implode(', ', array_fill(0, count($ids), '?'));
                $stmt = $conn->prepare("SELECT p.product_code,p.product_img,p.product_name,p.product_id,p.featured,p.best_seller FROM `product_subcategory` ps join products p on (ps.product_id = p.product_id) join subcategories s on (ps.subcategory_id = s.sub_id) where p.product_id NOT IN ($placeHolders) and s.sub_code = ? and p.status = 1 and s.status = 1  ORDER BY p.product_id DESC LIMIT 9");

                // Iterate the IDs and bind them
                // Remember ? placeholders are 1-indexed!
                for ($i=0; $i < count($ids); $i++) { 
                    $stmt->bindValue($i + 1, $ids[$i], PDO::PARAM_INT);
                }
                $stmt->bindValue(count($ids)+1,$catCode);

                $stmt->execute();
            }else{
                $stmt = $conn->prepare("SELECT p.product_code,p.product_img,p.product_name,p.product_id,p.featured,p.best_seller FROM `product_subcategory` ps join products p on (ps.product_id = p.product_id) join subcategories s on (ps.subcategory_id = s.sub_id) where s.sub_code = ? and p.status = 1 and s.status = 1  ORDER BY p.product_id DESC LIMIT 9");
                $stmt->execute([$catCode]);
                
            }
        
            $jumCard = 0;
            while($product = $stmt->fetch()){
                $card = array(
                    "product_id" => $product['product_id'],
                    "product_code" => $product['product_code'],
                    "product_name" =>$product['product_name'],
                    "product_img" => $product['product_img'],
                    "best_seller" => $product['best_seller'],
                    "featured" => $product['featured']
                );
                // json_encode($card);
                array_push($shown,$card); 
            }
            $stmt = $conn->prepare("SELECT s.sub_name as subName FROM products p join product_subcategory ps on (p.product_id = ps.product_id) join subcategories s on (s.sub_id = ps.subcategory_id) where s.sub_code  = ? ");
            $stmt->execute([$catCode]);
            $subName =  $stmt->fetch();
            if($stmt->rowCount() > 0){
                $subName = $subName['subName'];
            }
             // cari nama category
             $masterCatName = '';
             if(isset($_GET['masterCatId'])){
                 $stmt = $conn->prepare("SELECT cat_name from categories where cat_code = ? and status=1");
                 $stmt->execute([$_GET['masterCatId']]);
                 $masterCatName = $stmt->fetch();
                 $masterCatName = $masterCatName['cat_name'];
             }
            $jumCard = $totCard - count($shown);
            $response = ['success',$shown,$jumCard,$subName,$masterCatName];
            if (isset($_GET['masterCatId'])){
                $_SESSION['cat'] = [$_GET['masterCatId'],$_GET['catCode']];
            }
        }else{
            $response = ['fail','Subcategory not found'];
        }
        echo json_encode($response);

    }

}
?>