<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Classement;
use PDO;

class ClassementManager extends EntityManager {
    
    public function add(Classement $classement) {
        $req = 'INSERT INTO classement VALUES(NULL, :ordre, :team_id, :archive_id)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':ordre' => $classement->getOrdre(),
            ':team_id' => $classement->getTeam()->getId(),
            ':archive_id' => $classement->getArchive()->getId()
        ]);
    }
    
    public function update(Classement $classement, $id) {
        $req = 'UPDATE classement SET ordre = :ordre, team_id = :team, archive_id = :archive WHERE id = :id';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':ordre' => $classement->getOrdre(),
            ':team' => $classement->getTeam()->getId(),
            ':archive' => $classement->getArchive()->getId(),
            ':id' => $id
        ]);
    }
    
    public function delete(int $id) {
        $req = 'DELETE FROM classement WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
    }
    
    public function getAllClassements() {
        $req = 'SELECT classement.id, ordre, archive.annee AS archive, team.nom AS team FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id ORDER BY classement.id DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
    public function getAllClassementsWithPagination($offset, $limit): ?array {
        $req = 'SELECT classement.id, ordre, archive.annee AS archive, team.nom AS team FROM classement JOIN team ON team_id = team.id JOIN archive ON classement.archive_id = archive.id ORDER BY classement.id DESC LIMIT ? OFFSET ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $classements = $PDOSt->fetchAll();
        return $classements;
    }
    
    public function count() {
        $req = 'SELECT count(*) FROM classement';
        $PDOSt = $this->pdo->query($req);
        return $PDOSt->fetchColumn();
    }
    
    public function getClassementById(int $id) {
        $req = 'SELECT id, ordre, archive_id AS archive ,team_id AS team FROM classement WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Classement::class);
        return $PDOSt->fetch();
    }
    
}
