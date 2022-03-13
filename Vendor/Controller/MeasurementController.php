<?php
    namespace Vendor\Controllers;

    require "../topsoilCalculator/Vendor/Controller/ConversionController.php";
    require "../topsoilCalculator/Database/Connection/Connection.php";

    use Database\Connection\Connection;
    use Vendor\Controllers\Conversion;

    class Measurement
    {
        private $unitType;
        private $depthType;
        private $width;
        private $length;
        private $depth;
        private $converter;
        private $dbh;

        function __construct()
        {
            $this->converter = new Conversion();
            $this->dbh = new Connection();
        }

        public function setMeasurementUnit($unitType, $depthType, $width, $length, $depth)
        {
            $this->unitType = $unitType;
            $this->setDepthMeasurementUnit($depthType, $width, $length, $depth);
        }

        private function setDepthMeasurementUnit($depthType, $width, $length, $depth)
        {
            $this->depthType = $depthType;
            $this->setDimension($width, $length, $depth);
        }

        private function setDimension($width, $length, $depth)
        {
            if($this->unitType == "metres") {
                $this->width = $width;
                $this->length = $length;
                $this->depth = $this->converter->measurementConverter($this->depthType, $this->unitType, $depth);
            } else {
                $this->width = $this->converter->measurementConverter($this->unitType, "metres", $width);
                $this->length = $this->converter->measurementConverter($this->unitType, "metres", $length);
                $this->depth = $this->converter->measurementConverter($this->depthType, "metres", $depth);
            }

            $query = 
                "INSERT INTO
                    measurement_units(unit_type, width, unit_length, depth)
                    VALUES('" . $this->unitType. "', '" . $this->width. "', '" . $this->length. "', '" . $this->depth. "')
                ";
            $lastInsertId = $this->saveResults($query);

            $this->calculateNeededBagQuantityCoverForDimensions($this->width, $this->length, $this->depth, $lastInsertId);
        }

        public function calculateNeededBagQuantityCoverForDimensions($width, $length, $depth, $lastInsertId)
        {
            $meterSquare = $width * $length;
            $x = $meterSquare * $depth;
            $y = $x * 1.4;
            $quantityOfBags = round($y);
            $totalCostOfTopSoil = $quantityOfBags * 72;

            print_r(json_encode(array(
                "quantityOfBags" => $quantityOfBags,
                "totalCostOfTopSoil" => $totalCostOfTopSoil,
                "lastInsertId" => $lastInsertId
            )));
        }

        public function saveResults($query)
        {
            $this->dbh->exec($query);
            return $this->dbh->getLastInsertId();
        }
    }

?>