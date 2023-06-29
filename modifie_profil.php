<?php
session_start();
include_once 'connexion_base.php';
include_once 'verifie_password.php';
//verifie si l'utilisateur est connecter

$base = new database('localhost','root','root','livreor');
$pdo = $base->connect();


//recupere les info de l'utilisateur
print_r($_SESSION);

if (isset($_SESSION['user_infos'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //recupere les info du formulaire
        $login = $_POST["new_login"];
        $password = $_POST["new_password"];
        $passwordconfir = $_POST["new_passwordconfir"];
    
        //verifie si le mot de passe est correct
        $verif = new verifi_password();
        // var_dump($login);
        // var_dump($password);
        //verifie si le mot de passe est identique
        if ($verif->verifi_password($password) == true){
           
            if ($password == $passwordconfir && $login != $_SESSION['user_infos']['login'] && $password != $_SESSION['user_infos']['password']){
                //ajouter l'utilisateur dans la base de donnée
                var_dump($login);
                var_dump($password);
                $sql = "UPDATE user SET login = '$login', password = '$password' WHERE id = '".$_SESSION['user_infos']['id']."'";
                $pdo->exec($sql);
                // $result = $pdo->query($sql);
                // $row = $result->fetch(PDO::FETCH_ASSOC);
                header("location: connexion.php");
            }
            
        }
            else{
                echo "Le mot de passe n'est pas correct";
            }
    }

}

   

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Profil</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/fontawesome.css">
</head>
<body>
   
    
        
        <form method="POST" action="modifie_profil.php">
        <h1>Modifier Profil</h1>
        
           <div class="textbox">
            <p><i class="fa-brands fa-google"></i></p>
            <p><i class="fa-brands fa-facebook"></i></p>
            <p><i class="fa-brands fa-twitter"></i></p>
            <p><i class="fa-brands fa-youtube"></i></p>
        </div>
        <p class="mail"> ou utiliser mon login :</p>
        <div class="inputs">

            <input type="text" name="new_login" placeholder="login " value= "<?php echo $_SESSION['user_infos']['login'] ?>">
        
            
            <input type="text" name="new_password" placeholder="password" value="<?php echo $_SESSION['user_infos']['password'] ?>">
            <input type="text" name="new_passwordconfir" placeholder="passwordconfir">
        </div>
        <div class="remember">
            <button class="btn" type="submit">Modifier</button>
        </div>
    </form>
    
 
</body>
