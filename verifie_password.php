<?php
class verifi_password{

//creation de la fonction qui verifie le mot de passe
    public function verifi_password($password){
        $maj= preg_match('@[A-Z]@', $password);
        $min= preg_match('@[a-z]@', $password);
        $spe= preg_match('@[^\w]@', $password);
        $chiffre= preg_match('@[0-9]@', $password);

        if(!$maj || !$min || !$spe || !$chiffre || strlen($password) < 8) {
            return false;
        }else{
            return true;
        }
    }
  

}
?>