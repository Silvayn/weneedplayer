<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Team;
use PDO;

class TeamManager extends EntityManager {
    
    public function add(Team $team) {
        $req = 'INSERT INTO team VALUES(Null, :nom, :ville, :photo, :ligue_id, :archive_id, :format_d1_id)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':nom' => $team->getNom(),
            ':ville' => $team->getVille(),
            ':photo' => $team->getPhoto(),
            ':ligue_id' => $team->getLigue()->getId(),
            ':archive_id' => $team->getArchive(),
            ':format_d1_id' => $team->getFormat_d1()
        ]);
    }
    
    public function update(Team $team, $id, $update=true) {
        $execute = [
            ':nom' => $team->getNom(),
            ':ville' => $team->getVille(),

            ':ligue' => $team->getLigue()->getId(),
            ':archive' => $team->getArchive(),
            ':format_d1' => $team->getFormat_d1(),
            ':id' => $id
        ];
        if($update){
            $req = 'UPDATE team SET nom = :nom, ville = :ville, photo = :photo, ligue_id = :ligue, archive_id = :archive, format_d1_id = :format_d1 WHERE id = :id';
            $execute[':photo' ] = $team->getPhoto();
        }else{
           $req = 'UPDATE team SET nom = :nom, ville = :ville, ligue_id = :ligue, archive_id = :archive, format_d1_id = :format_d1 WHERE id = :id';
        }
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute($execute);
    }
    
    public function delete($id) {
        $req = 'DELETE FROM team WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
    }

    public function getAllTeams() {
        $req = 'SELECT team.id, nom, ville, photo, ligue.libelle AS ligue, archive.annee AS archive FROM team JOIN archive ON team.archive_id = archive.id JOIN ligue ON ligue_id = ligue.id ORDER BY annee DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getAllTeamsWithPagination($offset, $limit): ?array {
        $req = 'SELECT team.id, nom, ville, photo, ligue.libelle AS ligue, archive.annee AS archive FROM team JOIN archive ON team.archive_id = archive.id JOIN ligue ON ligue_id = ligue.id ORDER BY annee DESC LIMIT ? OFFSET ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function count() {
        $req = 'SELECT count(*) FROM team';
        $PDOSt = $this->pdo->query($req);
        return $PDOSt->fetchColumn();
    }
    
    public function getAllTeamsByLigue($id) {
        $req = 'SELECT team.id, nom, ville, blason, photo, ligue_id, archive_id FROM team WHERE ligue_id = ? ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
  
    
    public function getAllTeamsByLigueD1Champion($id) {
        $req = 'SELECT team.id, nom, ville, blason, photo, ligue_id, archive_id, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 7 ORDER BY nom ASC';
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
        $req = 'SELECT team.id, nom, ville, blason, photo, ligue_id, archive_id, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 8 AND archive_id =' . $annee . ' ORDER BY nom ASC';
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
        $req = 'SELECT team.id, nom, ville, blason, photo, ligue_id, archive_id, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 6 AND archive_id =' . $annee . ' ORDER BY nom ASC';
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
        $req = 'SELECT team.id, nom, ville, blason, photo, ligue_id, archive_id, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 5 AND archive_id=' . $annee . ' ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getAllTeamsByLigueD4($id) {
        $req = 'SELECT team.id, nom, ville, blason, photo, ligue_id, archive_id, format.libelle FROM team RIGHT JOIN format_team ON team.id = format_team.team_id RIGHT JOIN format ON format_team.format_id = format.id WHERE ligue_id = ? AND format_team.format_id = 4 ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        $teams = $PDOSt->fetchAll();
        return $teams;
    }
    
    public function getTeamsById($id) {
        $req = 'SELECT id, nom, ville, photo, ligue_id AS ligue, archive_id AS archive, format_d1_id AS format_d1 FROM team WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Team::class);
        return $PDOSt->fetch();
    }
    
}
