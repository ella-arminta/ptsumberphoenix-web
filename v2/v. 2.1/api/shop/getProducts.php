<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $conn -> beginTransaction();

    try {
        $code = $_POST['code'];

        if ($code == 'all') 
        {
            $sql = "SELECT product_name, product_code, product_img FROM products where status = 1";
            
            // run sql script
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
        }
        else if (substr($code, 0, 3) == 'cat')
        {
            $sql = "SELECT product_code, product_img, product_name from products a join product_subcategory b on a.product_id = b.product_id join subcategories c on c.sub_id = b.subcategory_id join categories d on d.cat_id = c.cat_id where (a.status = 1 and c.status = 1 and d.status = 1) and d.cat_code = ?";

            // run sql script
            $stmt = $conn -> prepare($sql);
            $stmt -> execute([substr($code, 3)]);
        }
        else
        {
            $sql = "SELECT product_code, product_img, product_name FROM products a join product_subcategory b on a.product_id = b.product_id join subcategories c on c.sub_id = b.subcategory_id where (c.status = 1 and c.sub_code = ?) and a.status = 1 order by product_name";
            
            // run sql script
            $stmt = $conn -> prepare($sql);
            $stmt -> execute([$code]);
        }

        // Fetch the data
        $cards = [];
        while($product = $stmt->fetch())
        {
            $card = array(
                "product_code" => $product['product_code'],
                "product_img" => $product['product_img'],
                "product_name" => $product['product_name']
            );

            array_push($cards, $card);
        }

        $response = $cards;
        $conn -> commit();
        echo json_encode($response);

    } catch (Exception $exception) {
        $response = 'error';
        $conn -> rollback();
        echo json_encode($response);
    }
}
?>