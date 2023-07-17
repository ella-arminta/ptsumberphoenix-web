<?php
include '../connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $conn -> beginTransaction();

    try
    {
        $name = $_POST['name'];
        $sql = "SELECT product_code, product_img, product_name from products where product_name = ? and status = 1";

        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$name]);

        // fetch data
        $card = [];
        while($product = $stmt->fetch())
        {
            $card_data = array(
                "product_code" => $product['product_code'],
                "product_img" => $product['product_img'],
                "product_name" => $product['product_name']
            );

            array_push($card, $card_data);
        }

        $response = $card;
        $conn -> commit();
        echo json_encode($response);
    }
    catch(Exception $exception)
    {
        $response = 'error';
        $conn -> rollback();
        echo json_encode($response);
    }
}

?>