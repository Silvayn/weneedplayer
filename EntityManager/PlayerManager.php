<?php

namespace EntityManager;

use App\EntityManager;
use DateTime;
use PDO;

class PlayerManager extends EntityManager {
    
    public function getPlayersByTeams($id) {
        $req = 'SELECT player.id, nom, prenom, ville, numero, position.libelle as position, team_id, nationality.libelle as nationality, nationality.image as image FROM player JOIN nationality ON player.nationality_id = nationality.id JOIN position ON position_id = position.id WHERE team_id = ? ORDER BY numero ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $players = $PDOSt->fetchAll();
        return $players;
    }
    
}
