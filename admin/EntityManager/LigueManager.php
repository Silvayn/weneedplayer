<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Ligue;
use PDO;

class LigueManager extends EntityManager {
    
    public function getAllLigues() {
        $req = 'SELECT id, libelle FROM ligue';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Ligue::class);
        $ligues = $PDOSt->fetchAll();
        return $ligues;
    }
    
}
