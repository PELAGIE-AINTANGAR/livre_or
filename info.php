<?php
class recu_info_user{
    public $login;
    public $prenom;
    public $nom;
    public $password;
    public function recu_info_user(){
        $base = new database('localhost','root','root','livreor');
        $pdo = $base->connect();
        $sql = "SELECT * FROM utilisateurs WHERE id = '".$_SESSION['id']."'";
        $result = $pdo->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_infos'] = $row;
        $login = $_SESSION['user_infos']['login'];
        // $prenom = $_SESSION['user_infos']['prenom'];
        // $nom = $_SESSION['user_infos']['nom'];
        $password = $_SESSION['user_infos']['password'];
    }
}
?>