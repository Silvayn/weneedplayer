<?php

namespace Entity;

use App\Entity;

class Utilisateur extends Entity {

    private $nom;
    private $prenom;
    private $adresse;
    private $ville;
    private $mail;
    private $phone;
    private $user_team;
    private $ligue;
    private $photo;
    private $login;
    private $pwd;

    /* -------------------------- GETTERS -------------------------- */

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getUser_team() {
        return $this->user_team;
    }

    public function getLigue() {
        return $this->ligue;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPwd() {
        return $this->pwd;
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

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
        return $this;
    }

    public function setVille($ville) {
        $this->ville = $ville;
        return $this;
    }

    public function setMail($mail) {
        $this->mail = $mail;
        return $this;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function setUser_team($user_team) {
        $this->user_team = $user_team;
        return $this;
    }

    public function setLigue($ligue) {
        $this->ligue = $ligue;
        return $this;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }

    public function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
        return $this;
    }

}
