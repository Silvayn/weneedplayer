<?php

namespace EntityManager;

use App\EntityManager;
use Entity\FormatD1;
use PDO;

class FormatD1Manager extends EntityManager {
    
    public function getAllFormatD1() {
        $req = 'SELECT id, libelle FROM format_d1';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, FormatD1::class);
        $format_d1 = $PDOSt->fetchAll();
        return $format_d1;
    }
    
}
