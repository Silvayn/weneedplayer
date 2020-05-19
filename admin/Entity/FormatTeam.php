<?php

namespace Entity;

use App\Entity;

class FormatTeam extends Entity {
    
    const LIMIT = 20;
    
    private $format;
    private $team;
    
    public function getFormat() {
        return $this->format;
    }

    public function getTeam() {
        return $this->team;
    }

    public function setFormat($format) {
        $this->format = $format;
        return $this;
    }

    public function setTeam($team) {
        $this->team = $team;
        return $this;
    }
    
}
