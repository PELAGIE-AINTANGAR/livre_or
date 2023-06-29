<!DOCTYPE html>
<html lang="fr">
<head>
<title>Livre d'or</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <style type="text/css">
        form, .pages
        {
            text-align:center;
        }
        .Style1 {font-family: "Book Antiqua"}
       </style>

</head>
   
<body>
<?php
session_start();
include_once 'connexion_base.php';

// display all session variables
print_r($_SESSION);

//echo $_POST['coment'];

if (isset($_SESSION['user_infos']) AND isset($_POST['coment']))
{
  // if ($_POST['login'] != NULL AND $_POST['coment'] != NULL)
    
    // $login = htmlentities($_POST['login']);
    $user_infos = $_SESSION['user_infos'];
    $coment = htmlentities($_POST['coment']);
    $coment = nl2br($coment); 
    $pdo = (new database('localhost','root', 'root', 'livreor'))->connect();
    $pdo->beginTransaction();

    //$stmt1 = $pdo->prepare("INSERT INTO user (login, password) VALUES (:login, DEFAULT)");
   // $stmt1->bindParam(':login', $login, PDO::PARAM_STR);
    //$stmt1->execute();
    //$idUser = $pdo->lastInsertId(); // Récupérer l'ID de l'utilisateur nouvellement inséré


    $stmt2 = $pdo->prepare("INSERT INTO coment (coment,id_user, date) VALUES (:coment, :id_user, NOW())");
    $stmt2->bindParam(':coment', $coment, PDO::PARAM_STR);
    $stmt2->bindParam(':id_user', $user_infos['id'], PDO::PARAM_INT);
    $stmt2->execute();
    

    $pdo->commit();

    
}
?>
<form method="post" action=" ">
    <br />
<p>
        <span class="Style1">Pseudo :</span> 
      <input name="login" /><br />
  <br />
      <span class="Style1">Message :</span><br />
      <textarea name="coment" rows="8" cols="35"></textarea> 
      <br />
    <input type="submit" value="Envoyer" />
</p>
</form>
<?php
$pdo = (new database('localhost','root', 'root', 'livreor'))->connect();
$reponse = $pdo->query('SELECT c.*, u.login FROM coment c INNER JOIN user u ON c.id_user = u.id ORDER BY c.id DESC LIMIT 0, 10');
$rows = $reponse->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) 
{
?>
<p><strong><?php echo $row['date']; ?></strong></p>
<p><strong><?php echo $row['login']; ?></strong> : <?php echo $row['coment']; ?></p>
<?php
}
?>
</body>
</html>

