<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class loggedOn {
    public $bdd;
    public $error;
    private $dsn = "mysql:host=localhost;dbname=my_meetic";
    private $name = "azumi";
    private $passwordBdd = "azumi";

    public function __construct()
    {
        try{
            $this->bdd = new PDO($this->dsn, $this->name, $this->passwordBdd);
        } catch(PDOException $e){
            echo "Connection failed:" . $e->getMessage();
        }
        return $this->bdd;
    }

    public function getInfo()
    {
        session_start();
        $infoSession = $_SESSION["login_user"];
        $sqlLine = "SELECT * FROM users WHERE mail = '$infoSession'";
        $prepare = $this->bdd->prepare($sqlLine);
        $prepare->execute();
        $finalstat = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $finalstat;

    }

}
