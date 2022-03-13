<?php
    require "../topsoilCalculator/Vendor/Controller/BasketController.php";
    use Vendor\Controllers\Basket;

    $basket = new Basket();

    if(isset($_POST["type"])) {
        $lastInsertId = $_POST["lastInsertId"];
        $quantityOfBags = $_POST["quantityOfBags"];
        $totalCostOfTopsoil = $_POST["totalCostOfTopsoil"];

        $response = $basket->addToBasket($lastInsertId, $quantityOfBags, $totalCostOfTopsoil);
        echo $response;
        // die();
    }
?>