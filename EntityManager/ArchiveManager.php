<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Archive;
use PDO;

class ArchiveManager extends EntityManager {
    
    public function getAllAnnee() {
        $req = 'SELECT id, annee FROM archive ORDER BY annee DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Archive::class);
        $annees = $PDOSt->fetchAll();
        return $annees;
    }
    
}
