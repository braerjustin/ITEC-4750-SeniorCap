<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/survey-engine/ITEC-4750-Team2-Site-Reordered/_infrastructure/db_connector.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');

class Survey {
    private $id;
    private $course;
    private $professor;
    private $name;
    private $questions;

    public function __get($property) {
        if (property_exists($this, $property)) { 
            return $this->$property;
        }
    }

    public function __construct0() {
        //professor constructor goes here
        //course constructor goes here
        $this->$questions = [];
    }

    public function __construct1($course) {
        $this->$course = $course;
        $this->$questions = [];
    }

    public function fetchById($id) {
        //sql parameterized query
        //run query, store object
        //return new Survey constructed with return stuff
    }
}

?>