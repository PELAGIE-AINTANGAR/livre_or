<?php
session_start();
include_once 'connexion_base.php';
//decconecte l'utilisateur
session_destroy();
header("location: connexion.php");

?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My First Web Page</title>
        <link rel="stylesheet" type="text/css" href="header.css"/>
    </head>
    <body>
     
        <header>
            <div class="principal">
                <div class="logo">
                    <a href="#"><img src="image/images - Copie (2).jpg" alt="logo"></a>
                </div>
                <ul>
                    <li class="active">
                        <a href="#">Accueil</a>
                    </li>
                    <li>
                        <a href="#">Classic</a>
                    </li>
                    <li>
                        <a href="#">Homme</a>
                    </li>
                    <li>
                        <a href="#">Femme</a>
                    </li>
                    <li>
                        <a href="#">Enfant</a>
                    </li>
                    <li>
                        <a href="modifie_profil.php">modifier_profil</a>
                    </li>
                    <li>
                        <a href="livre-or.php">commentaires</a>
                    </li>
                    <li>
                        <a href="deconnexion.php">deconnexion</a>
                    </li>

                </ul>
           </div>
        </header>

    