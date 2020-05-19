<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Categorie;
use PDO;

class CategorieManager extends EntityManager {

    public function getAllCategorie() {
        $req = 'SELECT id, libelle FROM categorie';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Categorie::class);
        $categories = $PDOSt->fetchAll();
        return $categories;
    }
    
}
