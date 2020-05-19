<?php

namespace Entity;

use App\Entity;

class Classement extends Entity {
    
    private $ordre;
    private $team;
    private $archive;
    
    public function getOrdre() {
        return $this->ordre;
    }

    public function getTeam() {
        return $this->team;
    }

    public function getArchive() {
        return $this->archive;
    }

    public function setOrdre($ordre) {
        $this->ordre = $ordre;
        return $this;
    }

    public function setTeam($team) {
        $this->team = $team;
        return $this;
    }

    public function setArchive($archive) {
        $this->archive = $archive;
        return $this;
    }
    
}
