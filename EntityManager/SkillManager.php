<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Skill;
use PDO;

class SkillManager extends EntityManager {

    public function getAllSkill() {
        $req = 'SELECT id, libelle FROM skill';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Skill::class);
        $skills = $PDOSt->fetchAll();
        return $skills;
    }

}
