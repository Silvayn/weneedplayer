<?php

namespace Entity;

use App\Entity;

class Position extends Entity {
    
    private  $libelle;
    
    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }
    
}
