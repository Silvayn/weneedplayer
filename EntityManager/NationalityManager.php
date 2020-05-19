<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Nationality;
use PDO;

class NationalityManager extends EntityManager {
    
    public function getAllNationalites() {
        $req = 'SELECT id, libelle, image FROM nationality';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Nationality::class);
        $nationalites = $PDOSt->fetchAll();
        return $nationalites;
    }
    
}
