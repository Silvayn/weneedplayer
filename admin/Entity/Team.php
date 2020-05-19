<?php

namespace Entity;

use App\Entity;

class Team extends Entity {
    
    const LIMIT = 20;
    
    private $nom;
    private $ville;
    private $photo;
    private $ligue;
    private $archive;
    private $format_d1;

    /* -------------------- GETTERS -------------------- */

    function getNom() {
        return $this->nom;
    }

    function getVille() {
        return $this->ville;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getLigue() {
        return $this->ligue;
    }
    
    function getArchive() {
        return $this->archive;
    }
    
    public function getFormat_d1() {
        return $this->format_d1;
    }
    
    /* -------------------- SETTERS -------------------- */

    function setNom($nom) {
        if ($nom == '' || strlen($nom) < 3 && strlen($nom) > 60 ) {
            $this->errors[] = 'Nom incorrect !';
        } else{
            $this->nom = $nom;
        }
        return $this;
    }

    function setVille($ville) {
        if ($ville == '' && strlen($ville) < 3 && strlen($ville) > 60 ) {
            $this->errors[] = 'Ville incorrect !';
        } else{
            $this->ville = $ville;
        }
        return $this;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }

    function setLigue($ligue) {
        $this->ligue = $ligue;
        return $this;
    }
    
    function setArchive($archive) {
        if ($archive != intval($archive)) {
            $this->errors[] = 'Problème d\'archive !';
        } else{
            $this->archive = $archive;
        }
        return $this;
    }
    
    public function setFormat_d1($format_d1) {
        $this->format_d1 = $format_d1;
        return $this;
    }

}
