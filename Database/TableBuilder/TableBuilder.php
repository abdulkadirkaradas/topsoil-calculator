<?php
    namespace Database\TableBuilder;

    require "../topsoilCalculator/Database/Connection/Connection.php";
    use \Database\Connection\Connection;

    class Builder
    {
        private $dbh;

        function __construct()
        {
            $this->dbh = new Connection();
        }

        public function setTable()
        {
            $measurementUnitsTable = 
                "CREATE TABLE IF NOT EXISTS measurement_units(
                    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
                    unit_type varchar(10) NOT NULL,
                    width float NOT NULL,
                    unit_length float NOT NULL,
                    depth float NOT NULL 
                )";

            $basketTable = 
                "CREATE TABLE IF NOT EXISTS basket(
                    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
                    measurement_unit_id float NOT NULL,
                    needed_bags_quantity float NOT NULL,
                    total_cost_of_topsoil float NOT NULL
                )";

            $this->dbh->exec($measurementUnitsTable);
            $this->dbh->exec($basketTable);
        }
    }

?>