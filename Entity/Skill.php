<?php

namespace Entity;

class Skill extends \App\Entity {

    private $libelle;

    /* -------------------------- GETTERS -------------------------- */

    public function getLibelle() {
        return $this->libelle;
    }

    /* -------------------------- SETTERS -------------------------- */

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }

}
