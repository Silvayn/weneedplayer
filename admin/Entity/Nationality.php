<?php

namespace Entity;

use App\Entity;

class Nationality extends Entity {
    
    private $libelle;
    private $image;

    public function getLibelle() {
        return $this->libelle;
    }

    public function getImage() {
        return $this->image;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }
    
}
