<?php

namespace Entity;

use App\Entity;

class Categorie extends Entity {
    
    private $libelle;

    function getLibelle() {
        return $this->libelle;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }
    
}
