<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Archive;
use PDO;

class ArchiveManager extends EntityManager {
    
    public function getAllArchives() {
        $req = 'SELECT id, annee FROM archive';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Archive::class);
        $archives = $PDOSt->fetchAll();
        return $archives;
    }
    
}
