<?php

namespace Entity;

use App\Entity;
use DateTime;
use Tools\Base;

class Comment extends Entity {
    
     use Base;
    /**
     *
     * @var DateTime
     */
    private $datec;
    private $content;
    private $annonce;
    private $user;
    private $parent;
    private $depth;


    public function __construct(array $data = []) {
        $this->datec = new DateTime();
        parent::__construct($data);
    }
    
    /* -------------------- GETTERS -------------------- */
    
    public function getDatec(): DateTime {
        return $this->datec;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAnnonce() {
        return $this->annonce;
    }

    public function getUser() {
        return $this->user;
    }

    public function getParent() {
        return $this->parent;
    }

    public function getDepth() {
        return $this->depth;
    }

    public function setDatec(DateTime $datec) {
        $this->datec = $datec;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setAnnonce($annonce) {
        $this->annonce = $annonce;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    public function setParent($parent) {
        $this->parent = $parent;
        return $this;
    }

    public function setDepth($depth) {
        $this->depth = $depth;
        return $this;
    }

}
