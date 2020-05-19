<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Ligue;
use Entity\Team;
use PDO;

class TeamManager extends EntityManager {

    public function getAllTeams() {
        $req = 'SELECT id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive FROM team';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getAllTeamsByLigue($id) {
        $req = 'SELECT team.id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive FROM team WHERE ligue_id = ? ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
  
    
    public function getAllTeamsByLigueD1Champion($id) {
        $req = 'SELECT team.id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 7 ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getAllTeamsByLigueD1Challenger($id) {
        // 3 = 2018 - 2019 (2019)
        $annee = 3;
        $req = 'SELECT team.id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 8 AND archive_id =' . $annee . ' ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getAllTeamsByLigueD2($id) {
        // 3 = 2018 - 2019 (2019)
        $annee = 3;
        $req = 'SELECT team.id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 6 AND archive_id =' . $annee . ' ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getAllTeamsByLigueD3($id) {
        // 3 = 2018 - 2019 (2019)
        $annee = 3;
        $req = 'SELECT team.id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 5 AND archive_id=' . $annee . ' ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getAllTeamsByLigueD4($id) {
        $req = 'SELECT team.id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 4 ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getTeamsById($id) {
        $req = 'SELECT id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive FROM team WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        return $PDOSt->fetch();
    }
    
}
