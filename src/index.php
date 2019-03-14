<?php
/**
 * Created by PhpStorm.
 * User: matthieuKoskas
 * Date: 14/03/2019
 * Time: 14:26
 */
include "../vendor/autoload.php";
use App\Utilisateur;
use App\DataBase\UtilisateurDBUtil;
//session_start();
//$user = new Utilisateur("rico", 987, "mdpcool");
//UtilisateurDBUtil::addUtilisateur($user);
var_dump(UtilisateurDBUtil::getUtilisateurWithLogin("bob"));
?>
<!DOCTYPE html>
<html>
<body>

<h2>Inscription</h2>

<form action="/inscription.php" method="post">
    Login (adresse mail):<br>
  <input type="text" name="login" value="Entrez votre email">
  <br>
    Mot de passe:<br>
  <input type="text" name="lastname" value="Choisissez un mdp">
  <br><br>
  <input type="submit" value="Submit">
</form>

<h2>Connexion</h2>

<form action="/connexion.php" method="post">
    Login (adresse mail):<br>
    <input type="text" name="login" value="Votre login(email)">
    <br>
    Mot de passe:<br>
    <input type="text" name="lastname" value="Votre mdp">
    <br><br>
    <input type="submit" value="Submit">
</form>