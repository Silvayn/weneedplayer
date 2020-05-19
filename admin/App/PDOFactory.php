<?php

namespace App;
    
    use PDO;

abstract class PDOFactory{
    /**
     *
     * @var PDO
     */
    private static $pdo = null;
    
    public static function getPDO() {
        try{
            if(self::$pdo === null){
                self::$pdo = self::$pdo = new PDO('mysql:host=localhost;dbname=weneedplayer;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            }
            return self::$pdo;
        } catch (\PDOException $e) {
            echo 'Impossible d\'obtenir une connexion !';
            die();
        }
    }
    
}
