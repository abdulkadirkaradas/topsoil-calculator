<?php
    namespace Vendor\Controllers;

    require "../topsoilCalculator/Database/Connection/Connection.php";
    use Database\Connection\Connection;

    class Basket
    {
        private $dbh;

        function __construct()
        {
            $this->dbh = new Connection();
        }
        
        public function addToBasket($lastInsertId, $quantityOfBags, $totalCostOfTopsoil)
        {
            $query = 
            "INSERT INTO 
                basket(measurement_unit_id, needed_bags_quantity, total_cost_of_topsoil) 
                VALUES('" . $lastInsertId . "', " . $quantityOfBags . ", " . $totalCostOfTopsoil . ")
            ";

            $record = $this->saveResults($query);

            print_r(json_encode(array(
                "status" => "0_SUCCESS",
                "basketItemCount" => $record
            )));
        }

        private function saveResults($query)
        {
            $this->dbh->exec($query);
            return $this->dbh->getRecordCountFromBasketTable();
        }
    }
?>