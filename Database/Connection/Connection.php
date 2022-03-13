<?php

    namespace Database\Connection;

    use \PDO;

    class Connection
    {
        private $dbh;

        function __construct()
        {
            $host = "mysql:host=localhost;";
            $database = "dbname=bags;";
            $dsn = $host.$database;
            $user = "root";
            $password = "";

            try {
                $this->dbh = new PDO($dsn, $user, $password);
                $this->dbh->exec("SET NAMES 'UTF8'; SET CHARSET 'UTF8'");
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (\PDOException $e) {
                print $e->getMessage();
            }
        }

        public function exec($query)
        {
            $this->dbh->exec($query);
        }

        public function getLastInsertId()
        {
            return $this->dbh->lastInsertId();
        }
    }

?>