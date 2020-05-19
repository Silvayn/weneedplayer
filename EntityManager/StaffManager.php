<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Staff;
use PDO;

class StaffManager extends EntityManager {
    
    public function getStaffByTeams($id) {
        $req = 'SELECT staff.id, nom, prenom, position.libelle as position, team_id, nationality.libelle as nationality, nationality.image as image FROM staff JOIN nationality ON staff.nationality_id = nationality.id JOIN position ON position_id = position.id WHERE team_id = ? ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $staffs = $PDOSt->fetchAll();
        return $staffs;
    }
    
}
