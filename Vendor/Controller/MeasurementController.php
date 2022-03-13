<?php
    namespace Vendor\Controllers;

    require "../candidateTest/Vendor/Controllers/ConversationController.php";
    require "../candidateTest/Database/Connection/Connection.php";

    use Database\Connection\Connection;
    use Vendor\Controllers\Conversation;

    class Measurement
    {
        private $converter;
        private $dbh;

        function __construct()
        {
            $this->converter = new Conversion();
            $this->dbh = new Connection();
        }

        public function setMeasurementUnit($unitType, $depthType, $width, $length, $depth)
        {

        }

        private function setDepthMeasurementUnit($depthType, $width, $length, $depth)
        {

        }

        private function setDimension($width, $length, $depth)
        {

        }

        public function calculateNeededBagQuantityCoverForDimensions($width, $length, $depth, $lastInsertId)
        {

        }

        public function saveResults($query)
        {
            
        }
    }

?>