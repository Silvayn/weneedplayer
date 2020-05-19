<?php

namespace EntityManager;

use App\EntityManager;
use PDO;

class ClassementManager extends EntityManager {
    
    public function getClassementByLigue(int $id) {
        $req = 'SELECT classement.id, ordre, team.nom AS team, archive.annee AS archive FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id JOIN format_team ON team.id = format_team.team_id WHERE team.ligue_id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
    public function getClassementD1(int $id) {
        $years = 3;//2019
        $req = 'SELECT classement.id, ordre, team.nom AS team, archive.annee AS archive FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id JOIN format_team ON team.id = format_team.team_id WHERE team.ligue_id = ? AND format_team.format_id = 7 AND classement.archive_id = ' . $years . ' ORDER by ordre ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
    public function getClassementD1Challenger(int $id) {
        $years = 3;//2019
        $req = 'SELECT classement.id, ordre, team.nom AS team, archive.annee AS archive FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id JOIN format_team ON team.id = format_team.team_id WHERE team.ligue_id = ? AND format_team.format_id = 8 AND classement.archive_id = ' . $years . ' ORDER by ordre ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
    public function getClassementD2(int $id) {
        $years = 3;//2019
        $req = 'SELECT classement.id, ordre, team.nom AS team, archive.annee AS archive FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id JOIN format_team ON team.id = format_team.team_id WHERE team.ligue_id = ? AND format_team.format_id = 6 AND classement.archive_id = ' . $years . ' ORDER by ordre ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
    public function getClassementD3(int $id) {
        $years = 3;//2019
        $req = 'SELECT classement.id, ordre, team.nom AS team, archive.annee AS archive FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id JOIN format_team ON team.id = format_team.team_id WHERE team.ligue_id = ? AND format_team.format_id = 5 AND classement.archive_id = ' . $years . ' ORDER by ordre ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
    public function getClassementD4(int $id) {
        $years = 3;//2019
        $req = 'SELECT classement.id, ordre, team.nom AS team, archive.annee AS archive FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id JOIN format_team ON team.id = format_team.team_id WHERE team.ligue_id = ? AND format_team.format_id = 4 AND classement.archive_id = ' . $years . ' ORDER by ordre ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
}
