<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_POST);
class location {
    public $bdd;
    private $dsn = "mysql:host=localhost;dbname=my_meetic";
    private $name = "name";
    private $passwordBdd = "password";

    public function __construct()
    {
        try{
            $this->bdd = new PDO($this->dsn, $this->name, $this->passwordBdd);
        } catch(PDOException $e){
            echo "Connection failed:" . $e->getMessage();
        }
        return $this->bdd;
    }

    public function getAllCity()
    {
        $sqlLine = $this->bdd->query("SELECT DISTINCT city FROM users ORDER BY city ASC");
        return $sqlLine;
    }

}
