<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Position;
use PDO;

class PositionManager extends EntityManager {
    
    public function getAllPosition() {
        $req = 'SELECT id, libelle FROM position';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Position::class);
        $positions = $PDOSt->fetchAll();
        return $positions;
    }
    
}
