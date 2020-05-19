<?php

namespace Entity;

class Format extends \App\Entity {
    
    private $libelle;
    private $taille_field;
    private $nb_players;
    private $pbs;
    private $tps_play;
    
    public function getLibelle() {
        return $this->libelle;
    }

    public function getTaille_field() {
        return $this->taille_field;
    }

    public function getNb_players() {
        return $this->nb_players;
    }

    public function getPbs() {
        return $this->pbs;
    }

    public function getTps_play() {
        return $this->tps_play;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }

    public function setTaille_field($taille_field) {
        $this->taille_field = $taille_field;
        return $this;
    }

    public function setNb_players($nb_players) {
        $this->nb_players = $nb_players;
        return $this;
    }

    public function setPbs($pbs) {
        $this->pbs = $pbs;
        return $this;
    }

    public function setTps_play($tps_play) {
        $this->tps_play = $tps_play;
        return $this;
    }
    
}
