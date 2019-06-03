<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class register {
    public $bdd;
//    public $error;
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

    public function checkRegistration(){


        if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["birthdate"])
            && !empty($_POST["gender"]) && !empty($_POST["city"]) && !empty($_POST["mail"]) && !empty($_POST["password"]))
        {
            $saveName = $_POST["firstName"];
            $saveLast = $_POST["lastName"];

            $savedate = $_POST["birthdate"];
            $birthDate = new DateTime($savedate);
            $now = new DateTime();
            $difference = $now->diff($birthDate);
            $age = $difference->y;
            if ($age < 18) {
                die();
            } else {
                $savegender = $_POST["gender"];

                $savecity = strtolower($_POST["city"]);

                $savemail = $_POST["mail"];

                $savepass = $_POST["password"];
                $savepass = password_hash($savepass,PASSWORD_BCRYPT);

                $prepare = $this->bdd->prepare("INSERT INTO users VALUES (NULL, ?, ?, ?, ?, ?, NULL, ?, ?, ?)");
                $prepare->execute([$saveLast, $saveName, $savedate, $savegender, $savecity, $savemail, $savepass, '1' ]);
                var_dump("piou");
            }
        }
    }

}
$var = new register();
$var->checkRegistration();