<?php

namespace Entity;

use App\Entity;
use DateTime;
use Tools\Base;

class Player extends Entity {
    
    use Base;
    
    private $nom;
    private $prenom;
    /**
     *
     * @var DateTime
     */
    private $naissance;
    private $ville;
    private $numero;
    private $position;
    private $team;
    private $nationality;
    
    /* -------------------------- GETTERS -------------------------- */
    
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNaissance(): DateTime {
        return $this->naissance;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getNumero() {
        return $this->numero;
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
    
    /* -------------------------- SETTERS -------------------------- */

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNaissance(DateTime $naissance) {
        $this->naissance = $naissance;
        return $this;
    }

    public function setVille($ville) {
        $this->ville = $ville;
        return $this;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
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
