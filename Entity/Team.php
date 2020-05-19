<?php

namespace Entity;

use App\Entity;

class Team extends Entity {
    
    private $nom;
    private $ville;
    private $photo;
    private $ligue;
    private $archive;
    private $formart_d1;
    
    /* -------------------- GETTERS -------------------- */
    
    public function getNom() {
        return $this->nom;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getLigue() {
        return $this->ligue;
    }

    public function getArchive() {
        return $this->archive;
    }

    public function getFormart_d1() {
        return $this->formart_d1;
    }
    
    /* -------------------- SETTERS -------------------- */

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    public function setVille($ville) {
        $this->ville = $ville;
        return $this;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }

    public function setLigue($ligue) {
        $this->ligue = $ligue;
        return $this;
    }

    public function setArchive($archive) {
        $this->archive = $archive;
        return $this;
    }

    public function setFormart_d1($formart_d1) {
        $this->formart_d1 = $formart_d1;
        return $this;
    }

}
