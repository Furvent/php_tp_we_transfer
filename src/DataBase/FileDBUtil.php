<?php
/**
 * Created by PhpStorm.
 * User: matthieuKoskas
 * Date: 14/03/2019
 * Time: 11:17
 */

namespace App\DataBase;

use App\File;
use \PDO;

class FileDBUtil
{
    public static function addFile(File $file, int $idUser): void {
        $bdd = new PDO("mysql:host=".ConnexionDB::host.";dbname=".ConnexionDB::DB_NAME.";charset=utf8", ConnexionDB::LOGIN, ConnexionDB::PASSWORD);
        $addFileRequest = $bdd->prepare("INSERT INTO file values (null, :name, 0, :size, " . $idUser . ")");
        $addFileRequest->bindParam(':name', $file->getName());
        $addFileRequest->bindParam(':size', $file->getSize());
        $addFileRequest->execute();
        $addFileRequest->closeCursor();
    }

    public static function getAllFilesWithIdUtilisateur(int $id): array{
        $bdd = new PDO("mysql:host=".ConnexionDB::host.";dbname=".ConnexionDB::DB_NAME.";charset=utf8", ConnexionDB::LOGIN, ConnexionDB::PASSWORD);
        $searchFileWithIdRequest = $bdd->prepare("SELECT * FROM file WHERE file.id_utilisateur = ". $id .")");
        $searchFileWithIdRequest->execute();

        $listFiles = [];
        while($record = $searchFileWithIdRequest->fetch(PDO::FETCH_ASSOC)) {
            $file = FileDBUtil::setFileWithRecord($record);
            array_push($listFiles, $file);
        }

        $searchFileWithIdRequest->closeCursor();
        return $listFiles;
    }

    private static function setFileWithRecord(array $record): File {
        $file = new File(
            $record['name'],
            $record['download_number'],
            $record['size'],
            $record['id']
        );
        return $file;
    }
}