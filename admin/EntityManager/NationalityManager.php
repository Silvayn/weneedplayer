<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Nationality;
use PDO;

class NationalityManager extends EntityManager {
    
    public function getAllNaionality() {
        $req = 'SELECT id, libelle FROM nationality';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Nationality::class);
        $nationalities = $PDOSt->fetchAll();
        return $nationalities;
    }
    
}
