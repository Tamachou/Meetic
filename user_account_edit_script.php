<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_POST);
class modify {
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

    public function editProfil()
    {
       session_start();
        $infoSession = $_SESSION["login_user"];
        echo $infoSession;
        $name = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $birth = $_POST["birthdate"];
        $sex = $_POST["gender"];
        $city = $_POST["city"];
        $mail = $_POST["mail"];
        $password = $_POST["password"];

        $sqlLine = "UPDATE users SET";

        if (!empty($name))
        {
            $sqlLine .= " name = '$name'";
            if(!empty($mail)|| !empty($password)|| !empty($city)|| !empty($sex) || !empty($birth) || !empty($lastName))
            {
                $sqlLine .= ", ";
            }

        }
        if (!empty($lastName))
        {
            $sqlLine .= " last_name = '$lastName'";
            if(!empty($mail)|| !empty($password)|| !empty($city)|| !empty($sex) || !empty($birth))
            {
                $sqlLine .= ", ";
            }
        }
        if (!empty($birth))
        {
            $sqlLine .= " birth_date = '$birth'";
            if(!empty($mail)|| !empty($password)|| !empty($city)|| !empty($sex))
            {
                $sqlLine .= ", ";
            }
        }
        if (!empty($sex))
        {
            $sqlLine .= " sex = '$sex'";
            if(!empty($mail)|| !empty($password)|| !empty($city))
            {
                $sqlLine .= ", ";
            }
        }
        if (!empty($city))
        {
            $sqlLine .= " city = '$city'";
            if(!empty($mail) || !empty($password))
            {
                $sqlLine .= ", ";
            }
        }
        if (!empty($mail))
        {
            $sqlLine .= " mail = '$mail'";
            $_SESSION['login_user'] = $this->$mail;
            if(!empty($password))
            {
                $sqlLine .= ", ";
            }
        }
        if (!empty($password))
        {
            $password = password_hash($password,PASSWORD_BCRYPT);
            $sqlLine .= " password = '$password'";
        }
        $sqlLine .= " WHERE  mail = '".$infoSession."'";
        $prepare = $this->bdd->prepare($sqlLine);

        print_r($prepare);
        $prepare->execute();
        $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $prepare;
    }

}

$var = new modify();
$var->editProfil();