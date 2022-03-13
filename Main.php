<?php
    namespace Main;

    require "../topsoilCalculator/Database/TableBuilder/TableBuilder.php";
    use Database\TableBuilder\Builder;
    
    class Main
    {
        private $setTable;

        function __construct()
        {
            $this->setTable = new Builder();
        }

        public function init()
        {
            $this->setTable->setTable();
        }
    }

    $init = new Main();
    $init->init();
?>