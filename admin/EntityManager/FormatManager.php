<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Format;
use PDO;

class FormatManager extends EntityManager {
    
    public function getAllFormats() {
        $req = 'SELECT id, libelle, taille_field, nb_players, pbs, tps_play FROM format';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Format::class);
        $formats = $PDOSt->fetchAll();
        return $formats;
    }
    
}
