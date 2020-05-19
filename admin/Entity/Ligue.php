<?php

namespace Entity;

class Ligue extends \App\Entity {
    
    private $libelle;
    
    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }
    
}
