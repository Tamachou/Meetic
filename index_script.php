<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class connexion {
    public $bdd;
    public $error;
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

    public function identification(){
        if (!empty($_POST["username"]) && !empty($_POST["password"]))
        {
            $tryMail = $_POST["username"];
            $tryPass = $_POST["password"];


            $prepare = $this->bdd->prepare("SELECT * FROM users WHERE mail=?");
            $prepare->execute([$tryMail]);
            $finalstat = $prepare->fetchAll(PDO::FETCH_ASSOC);


            $cryptPass = $finalstat[0]["password"];
            $active = $finalstat[0]["active"];
            //var_dump(password_verify($tryPass, $cryptPass));
            if(password_verify($tryPass, $cryptPass) && $active === "1")
            {
                session_start();
                $_SESSION["login_user"] = $_POST["username"];
                print_r($finalstat);
            } else {
                return false;
            }
        }
    }

}
$var = new connexion();
$var->identification();
