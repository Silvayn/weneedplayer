<?php

namespace Entity;

use App\Entity;
use DateTime;
use Tools\Base;

class Annonce extends Entity {
    
    const LIMIT = 10;
    
    use Base;
    /**
     *
     * @var DateTime
     */
    private $date;
    private $title;
    private $contenu;
    private $category;
    private $skill;
    private $ligue;
    private $user;
    
    public function __construct(array $data = []) {
        $this->date = new DateTime();
        parent::__construct($data);
    }

    /* -------------------- GETTERS -------------------- */
    
    public function getDate(): \DateTime {
        return $this->date;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getSkill() {
        return $this->skill;
    }

    public function getLigue() {
        return $this->ligue;
    }

    public function getUser() {
        return $this->user;
    }
    
    /* -------------------- SETTERS -------------------- */

    public function setDate(\DateTime $date) {
        $this->date = $date;
        return $this;
    }

    public function setTitle($title) {
        if (strlen($title) >= 3){
            $this->title = $title;
        } else {
            $this->errors[] = 'Titre trop court !';
        }
        return $this;
    }

    public function setContenu($contenu) {
        if (strlen($contenu) != ''){
            $this->contenu = $contenu;
        }else{
            $this->errors[] = 'Cotenu vide !';
        }
        return $this;
    }

    public function setCategory($category){
        $this->category = $category;
        return $this;
    }

    public function setSkill($skill) {
        $this->skill = $skill;
        return $this;
    }

    public function setLigue($ligue){
        $this->ligue = $ligue;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

}
