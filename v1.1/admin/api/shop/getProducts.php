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
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $catCode = $_GET['catCode'];

    // GET PRODUCT RANDOM PERTAMA KALI
    if($catCode == 'random'){
        $cards = '';
        $stmt=$conn->prepare("SELECT * FROM products ORDER BY product_id desc");
        $stmt->execute();
        $newest = $stmt->fetch();
        $cards .= '
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card" onclick="window.location.href=`./single/product.html?product_code='.$newest['product_code'].'`">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                    <img src="../'.$newest['product_img'].'" class="w-100" />
                </div>
                <!-- <hr> -->
                <div class="card-body">
                    <div class="product-title">'.$newest['product_name'].'</div>
                    <div><button class="btn btn-danger delProductBut" proCode="'.$newest['product_code'].'">Delete</button></div>
                </div>
            </div>
        </div>
        ';
        $stmt = $conn->prepare("SELECT * FROM `products` where product_id != ? ORDER BY rand() LIMIT 9");
        $stmt->execute([$newest['product_id']]);
        $jumCard=0;
        while($product = $stmt->fetch()){
            $cards .= '
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="window.location.href=`./single/product.html?product_code='.$product['product_code'].'`">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                        <img src="../'.$product['product_img'].'" class="w-100" />
                    </div>
                    <!-- <hr> -->
                    <div class="card-body">
                        <div class="product-title">'.$product['product_name'].'</div>
                        <div><button class="btn btn-danger delProductBut" proCode="'.$product['product_code'].'">Delete</button></div>
                    </div>
                </div>
            </div>
            ';
            $jumCard+=1;
        }
        $response = ['success',$cards,$jumCard];
        echo json_encode($response);

    }else{
        // $cek subcategory ada gak di database
        $stmt=$conn->prepare('SELECT * FROM subcategories where sub_code=?');
        $stmt->execute([$catCode]);
        if($stmt->rowCount() > 0){
            $cards = '';
            $stmt = $conn->prepare("SELECT p.product_code,p.product_img,p.product_name FROM `product_subcategory` ps join products p on (ps.product_id = p.product_id) join subcategories s on (ps.subcategory_id = s.sub_id) where s.sub_code = ? ORDER BY p.product_id desc");
            $stmt->execute([$catCode]);
            $jumCard = 0;
            while($product = $stmt->fetch()){
                $cards .= '
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card" onclick="window.location.href=`./single/product.html?product_code='.$product['product_code'].'`">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img src="../'.$product['product_img'].'" class="w-100" />
                        </div>
                        <!-- <hr> -->
                        <div class="card-body">
                            <div class="product-title">'.$product['product_name'].'</div>
                            <div><button class="btn btn-danger delProductBut" proCode="'.$product['product_code'].'">Delete</button></div>
                        </div>
                    </div>
                </div>
                ';
                $jumCard += 1;
            }
            $response = ['success',$cards,$jumCard];
        }else{
            $response = ['fail','Subcategory not found'];
        }
        echo json_encode($response);

    }

}
?>