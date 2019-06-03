<?php
class remove {
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

    public function deleteProfil()
    {
        session_start();
        $infoSession = $_SESSION["login_user"];

        $sqlLine = "UPDATE users SET active = '0'";
        $sqlLine .= " WHERE  mail = '".$infoSession."'";
        $prepare = $this->bdd->prepare($sqlLine);

        $prepare->execute();
        $prepare->fetchAll(PDO::FETCH_ASSOC);
        header('Location: logOff_script.php');
    }

}

$var = new remove();
$var->deleteProfil();