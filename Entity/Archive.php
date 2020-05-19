<?php

namespace Entity;

use App\Entity;

class Archive extends Entity {
    
    private $annee;
    
    public function getAnnee() {
        return $this->annee;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
        return $this;
    }
    
}
