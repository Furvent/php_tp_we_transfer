<?php
/**
 * Created by PhpStorm.
 * User: matthieuKoskas
 * Date: 14/03/2019
 * Time: 14:40
 */

include "../vendor/autoload.php";
use App\Utilisateur;
use App\DataBase\UtilisateurDBUtil;

if (!empty($_POST)) {
    // First form
    if (isset($_POST['loginCreation']) && isset($_POST['passwordCreation'])) {
        if ($_POST['loginCreation'] != "" && $_POST['passwordCreation'] != "") {
            $newUser = new Utilisateur($_POST['loginCreation'], 1000, $_POST['passwordCreation']);
            UtilisateurDBUtil::addUtilisateur($newUser);
            echo "Vous êtes bien inscrits";
            $str = <<<EOD
            <form action="index.php">
                <input type="submit" value="Revenir à la page de connexion" />
            </form>
EOD;
            echo $str;
        } else {
            header('Location: index.php');
            exit();
        }
    }
    else {
        header('Location: index.php');
        exit();
    }
}