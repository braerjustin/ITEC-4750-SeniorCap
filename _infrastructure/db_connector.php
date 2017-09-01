<?php 

class DBConnector {
    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPass;

    public function __constructor($env) {
        if ($env == "prod") {
            $this->$dbHost = "localhost:3306";
            $this->$dbName = "mga_db";
            $this->$dbUser = "user1";
            $this->$dbPass = "thisuser";
        }
        else {
            $this->$dbHost = "45.55.170.45";
            $this->$dbName = "mga_db";
            $this->$dbUser = "katie";
            $this->$dbPass = "katiepass";
        }
    }

    public function getConnector() {
        $conn = new mysqli($this->$dbHost, $this->$dbUser, $this->$dbPass, $this->$dbName);
        return $conn;
    }
}

?>