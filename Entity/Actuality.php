<?php

namespace Entity;

use App\Entity;
use DateTime;
use Tools\Base;

class Actuality extends Entity {
    
    const LIMIT = 10;
    
    use Base;
    /**
     *
     * @var DateTime
     */
    private $date;
    private $title;
    private $contenu;
    private $photo;
    private $ligue;
    
    public function __construct(array $data = []) {
        $this->date = new DateTime();
        parent::__construct($data);
    }
    
    /* -------------------- GETTERS -------------------- */
    
    public function getDate(): DateTime {
        return $this->date;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContenu() {
        return $this->contenu;
    }
    
    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }

    public function getLigue() {
        return $this->ligue;
    }

    public function setDate(DateTime $date) {
        $this->date = $date;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
        return $this;
    }
    
    public function getPhoto() {
        return $this->photo;
    }

    public function setLigue($ligue) {
        $this->ligue = $ligue;
        return $this;
    }

}
