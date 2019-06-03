<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class research {
    public $bdd;
    private $dsn = "mysql:host=localhost;dbname=my_meetic";
    private $name = "name";
    private $passwordBdd = "password";
    private $_searchedAge;
    private $_searchedGender;
    private $_searchedCity;
    private $_searchedCityTwo;

    public function __construct()
    {
        try{
            $this->bdd = new PDO($this->dsn, $this->name, $this->passwordBdd);
        } catch(PDOException $e){
            echo "Connection failed:" . $e->getMessage();
        }

        $this->_searchedAge = $_POST['age'];
        $this->_searchedGender = $_POST['gender'];
        $this->_searchedCity = $_POST['city'];
        $this->_searchedCityTwo = $_POST['cityTwo'];

        return $this->bdd;
    }

    public function checkSearch(){

        if (!empty($_POST["gender"]) && !empty($_POST["age"]))
        {

            $sqlLine = "SELECT * FROM users WHERE sex = ? ";
            switch ($this->_searchedAge){
                case '18-25':
                    $sqlLine .= "AND FLOOR( DATEDIFF(CURRENT_DATE(), birth_date) / '365') >= '18' AND ".
                        "FLOOR( DATEDIFF(CURRENT_DATE(), birth_date) / '365') <= '25'";
                    break;
                case '25-35':
                    $sqlLine .= "AND FLOOR( DATEDIFF(CURRENT_DATE(), birth_date) / '365') >= '25' AND ".
                        "FLOOR( DATEDIFF(CURRENT_DATE(), birth_date) / '365') <= '35'";
                    break;
                case '35-45':
                    $sqlLine .= "AND FLOOR( DATEDIFF(CURRENT_DATE(), birth_date) / '365') >= '35' AND ".
                        "FLOOR( DATEDIFF(CURRENT_DATE(), birth_date) / '365') <= '45'";
                    break;
                case '45+':
                    $sqlLine .= "AND FLOOR( DATEDIFF(CURRENT_DATE(), birth_date)/365) >= '45'";
                    break;
            }

            if($this->_searchedCity !== 'default'){
                $sqlLine .= " AND city = '" . $_POST["city"] . "'";
            }
            if($this->_searchedCity == 'default' && $this->_searchedCityTwo !== 'default'){
                $sqlLine .= " AND city = '" . $_POST["cityTwo"] . "'";
            }
            if ($this->_searchedCity !== 'default' && $this->_searchedCityTwo !== 'default'  ){
                $sqlLine .= " OR city = '" . $_POST["cityTwo"] . "'";
            }
            $prepare = $this->bdd->prepare($sqlLine);
            $prepare->execute([$this->_searchedGender]);
//            var_dump($prepare->debugDumpParams());
           $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
           return $result;

        }
    }
    public function route($result)
    {
        $jsonResult = json_encode($result);
        echo $jsonResult;

    }

}
$var = new research();
$result = $var->checkSearch();
$var->route($result);
