<?php
 function crypted($str)
 {
   $cryptPass = password_hash($str,PASSWORD_BCRYPT);
   return $cryptPass;
 }

 function verify($password, $cryptPass) {
    password_verify($password, $cryptPass);
 }
$str = "sup";
 crypted($str);



//class dataBase {
//    public $bdd;
//    public $error;
//    private $dsn = "mysql:host=localhost:dbname=my_meetic";
//    private $username = "azumi";
//    private $password = "azumi";
//
//    public function __construct()
//    {
//        try{
//            $this->bdd = new PDO($this->dsn, $this->username, $this->password);
//        } catch(PDOException $e){
//            echo "Connection failed:" . $e->getMessage();
//        }
//        return $this->bdd;
//    }
//    public function validation($field) {
//        $count = 0;
//        foreach ($field as $key => $value) {
//            if (empty($value)) {
//                $count++;
//                $this->error .=   $key . "is missing";
//            }
//        }
//        if($count == 0) {
//            return true;
//        }
//    }
//
////    public function login(){
////
////    }
//}