<?php
/**
 * Created by PhpStorm.
 * User: matthieuKoskas
 * Date: 14/03/2019
 * Time: 11:17
 */

namespace App\DataBase;

use App\Utilisateur;
use \PDO;

class UtilisateurDBUtil
{
    public static function addUtilisateur(Utilisateur $utilisateur): void {
        $bdd = new PDO("mysql:host=".ConnexionDB::host.";dbname=".ConnexionDB::DB_NAME.";charset=utf8", ConnexionDB::LOGIN, ConnexionDB::PASSWORD);
        $addUtilisateurRequest = $bdd->prepare("INSERT INTO utilisateur values (null, :login, :mdp, " . Utilisateur::USER_MAX_QUOTA . ")");

        $login = $utilisateur->getLogin();
        $mdp = $utilisateur->getMdp();
        $addUtilisateurRequest->bindParam(':login', $login);
        $addUtilisateurRequest->bindParam(':mdp', $mdp);

        var_dump($addUtilisateurRequest->execute());
        $addUtilisateurRequest->closeCursor();
    }

    /**
     * @deprecated
     * @param int $id
     * @return string
     */
    public static function getPassword(int $id):string {
        $bdd = new PDO("mysql:host=".ConnexionDB::host.";dbname=".ConnexionDB::DB_NAME.";charset=utf8", ConnexionDB::LOGIN, ConnexionDB::PASSWORD);
        $searchPasswordUtilisateurRequest = $bdd->prepare("SELECT utilisateur.mdp FROM utilisateur WHERE utilisateur.id = ". $id .")");
        $searchPasswordUtilisateurRequest->execute();
        $password = $searchPasswordUtilisateurRequest->fetch()['mdp'];
        $searchPasswordUtilisateurRequest->closeCursor();
        return $password;
    }

    public static function getUtilisateurWithLogin(string $email):?Utilisateur {
        $bdd = new PDO("mysql:host=".ConnexionDB::host.";dbname=".ConnexionDB::DB_NAME.";charset=utf8", ConnexionDB::LOGIN, ConnexionDB::PASSWORD);
        $searchUtilisateurRequest = $bdd->prepare("SELECT * FROM utilisateur WHERE utilisateur.login = '$email'");
        $searchUtilisateurRequest->execute();
        $utilisateurRecorded = $searchUtilisateurRequest->fetch(PDO::FETCH_ASSOC);
        $utilisateur = null;
        $utilisateur = UtilisateurDBUtil::setUtilisateurWithRecord($utilisateurRecorded);
        $searchUtilisateurRequest->closeCursor();
        return $utilisateur;
    }

    private static function setUtilisateurWithRecord(array $record): Utilisateur {
        $utilisateur = new Utilisateur(
            $record['login'],
            $record['quota_restant'],
            $record['mdp'],
            $record['id']
        );
        return $utilisateur;
    }
}