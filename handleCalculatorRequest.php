<?php
    require "../topsoilCalculator/Vendor/Controller/MeasurementController.php";

    use Vendor\Controllers\Measurement;

    $measurement = new Measurement();

    if(isset($_POST["type"])) {
        $unitType = $_POST["unitType"];
        $depthType = $_POST["depthType"];
        $width = $_POST["width"];
        $length = $_POST["length"];
        $depth = $_POST["depth"];

        $response = $measurement->setMeasurementUnit($unitType, $depthType, $width, $length, $depth);
        echo $response;
        die();
    }
?>