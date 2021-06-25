<?php         
    session_start();
    $_SESSION["delete"] = 1;
    include_once 'ProductsClient.php';
    $product = new ProductsClient();
    $product->deleteFromCar($_POST["idproduct"]);
?>