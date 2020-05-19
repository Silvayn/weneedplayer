<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Ligue;
use PDO;

class LigueManager extends EntityManager {
    
    public function getLigueById($id) {
        $req = 'SELECT id, libelle FROM ligue WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Ligue::class);
        return $PDOSt->fetch();
    }
    
    public function getAllLigue() {
        $req = 'SELECT id, libelle FROM ligue';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Ligue::class);
        $ligues = $PDOSt->fetchAll();
        return $ligues;
    }
    
}
