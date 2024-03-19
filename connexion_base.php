<?php 
include_once 'config.php';
class database{
    private $serveur;
    private $username;
    private $password;
    private $dbname;

    public function __construct($serveur,$username,$password,$dbname){
        $this->serveur = DB_SERVER;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->dbname = DB_NAME;
    }

    public function connect(){
        try{
            $dsn=("mysql:host=".$this->serveur.";dbname=".$this->dbname);
            $pdo=new PDO($dsn,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo "Erreur de connexion:".$e->getMessage();
        }
    }

}
?>
