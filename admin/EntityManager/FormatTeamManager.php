<?php

namespace EntityManager;

use App\EntityManager;
use Entity\FormatTeam;
use PDO;

class FormatTeamManager extends EntityManager {
    
    public function add(FormatTeam $formatTeam) {
        $req = 'INSERT INTO format_team VALUES(NULL, :format_id, :team_id)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':format_id' => $formatTeam->getFormat()->getId(),
            ':team_id' => $formatTeam->getTeam()->getId()
        ]);
    }
    
    public function update(FormatTeam $formatTeam, $id) {
        $req = 'UPDATE format_team SET format_id = :format ,team_id = :team WHERE id = :id';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':format' => $formatTeam->getFormat()->getId(),
            ':team' => $formatTeam->getTeam()->getId(),
            ':id' => $id
        ]);
    }
    
    public function delete($id) {
        $req = 'DELETE FROM format_team WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
    }
    
    public function getAllFormatTeam() {
        $req = 'SELECT format_team.id, format.libelle AS format, team.nom AS team, archive.annee FROM format_team JOIN format ON format_id = format.id JOIN team ON team_id = team.id JOIN archive ON team.archive_id = archive.id ORDER BY format_team.id DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $formats = $PDOSt->fetchAll();
        return $formats;
    }
    
    public function getAllFormatTeamWithPagination($offset, $limit): ?array {
        $req = 'SELECT format_team.id, format.libelle AS format, team.nom AS team, archive.annee FROM format_team JOIN format ON format_id = format.id JOIN team ON team_id = team.id JOIN archive ON team.archive_id = archive.id ORDER BY format_team.id DESC LIMIT ? OFFSET ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $formats = $PDOSt->fetchAll();
        return $formats;
    }
    
    public function count() {
        $req = 'SELECT count(*) FROM format_team';
        $PDOSt = $this->pdo->query($req);
        return $PDOSt->fetchColumn();
    }
    
    public function getFormatById($id) {
        $req = 'SELECT id, format_id AS format ,team_id AS team FROM format_team WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, FormatTeam::class);
        return $PDOSt->fetch();
    }
    
}
