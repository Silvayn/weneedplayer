<?php

namespace Entity;

use App\Entity;

class Staff extends Entity {
    
    private $nom;
    private $prenom;
    private $position;
    private $team;
    private $nationality;
    
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getTeam() {
        return $this->team;
    }

    public function getNationality() {
        return $this->nationality;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    public function setTeam($team) {
        $this->team = $team;
        return $this;
    }

    public function setNationality($nationality) {
        $this->nationality = $nationality;
        return $this;
    }
    
}
