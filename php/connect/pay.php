<?php         
    session_start();
    include_once 'ProductsClient.php';
    $product = new ProductsClient();
    $product->payCar($_SESSION["idUser"]);
?>