<?php
session_start();
include_once 'connexion_base.php';

class seConnecter{
    private $login;
    private $password;

    public function __construct($login,$password){
        $this->login=$login;
        $this->password=$password;
    }

    public function connection(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form
            $login = $_POST["login"];
            $password = $_POST["password"];
    
            $conn = new database('localhost','root','root','livreor');
            $pdo = $conn->connect();
            $sql = "SELECT * FROM user WHERE login = '$login' and password = '$password'";
            $result = $pdo->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            //si le login et egale au login de la base de donnée et le mot de passe et egale au mot de passe de la base de donnée
            if ($login == $row['login'] && $password == $row['password']) {
                $_SESSION['user_infos']= $row;
                header("location: index.php");
                
            } else {
                $error = "Your Login Name or Password is invalid";
            }    
        }
    }
    
}
if(isset($_POST['login']) && isset($_POST['password']))
{
    $login = new seConnecter($_POST['login'],$_POST['password']);
    $login->connection();
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
    <form method="POST" action="connexion.php">
        <h1>Se Connecter</h1>
            <div class="textbox">
                <p><i class="fa-brands fa-google"></i></p>
                <p><i class="fa-brands fa-facebook"></i></p>
                <p><i class="fa-brands fa-twitter"></i></p>
                <p><i class="fa-brands fa-youtube"></i></p>
            </div>
            <p class="mail"> ou utiliser mon login :</p>
            <div class="inputs">
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="password" placeholder="password">


            </div>
            <div class="remember">
                <button class="btn" type="submit">se connecter</button>
                <button class="btn"><a href="inscription.php">s'inscrire</a></button>
            </div>
    </form>
</body>