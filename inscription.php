<?php
session_start();
include 'connexion_base.php';
include 'verifie_password.php';


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs des champs du formulaire
    $login = $_POST["new_login"];
    $password = $_POST["new_password"];
    $passwordconfir = $_POST["new_passwordconfir"];
    

    $conn = new database();
    $pdo = $conn->connect();
    $verif = new verifi_password();
    // $verif->verifi_password($password);

    if ($verif->verifi_password($password) == true) {
        if ($password == $passwordconfir && $login != $_SESSION['user_infos']['login'] && $password != $_SESSION['user_infos']['password']){
            //ajouter l'utilisateur dans la base de donnée {
            $sql = "INSERT INTO user (login, password) VALUES ('$login', '$password')";
            $pdo->exec($sql);
            // $_SESSION['user_infos']['login'] = $login;
            header("location: connexion.php");
        } else {
            echo "Les mots de passe ne sont pas identiques";
        }
    } 
   

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <form method="POST" action="inscription.php">
        <h1>Inscription</h1>
            <div class="textbox">
                <p><i class="fa-brands fa-google"></i></p>
                <p><i class="fa-brands fa-facebook"></i></p>
                <p><i class="fa-brands fa-twitter"></i></p>
                <p><i class="fa-brands fa-youtube"></i></p>
            </div>
            <p class="mail"> ou utiliser mon login :</p>
            <div class="inputs">
                <input type="text" name="new_login" placeholder="login">
                <input type="text" name="new_password" placeholder="password">
                <input type="text" name="new_passwordconfir" placeholder="passwordconfir">
            </div>
            <div class="remember">
                <button class="btn" type="submit">se Connecter</button>
            </div>

    </form>
</body>
</html>
<!-- <a href="connexion.php" >S'incrire</a> -->
