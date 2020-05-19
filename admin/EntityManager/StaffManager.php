<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Staff;
use PDO;

class StaffManager extends EntityManager {
    
    public function add(Staff $staff) {
        $req = 'INSERT INTO staff VALUES(NULL, :nom, :prenom, :ville, :position_id, :team_id, :nationality_id)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':nom' => $staff->getNom(),
            ':prenom' => $staff->getPrenom(),
            ':ville' => $staff->getVille(),
            ':position_id' => $staff->getPosition()->getId(),
            ':team_id' => $staff->getTeam()->getId(),
            ':nationality_id' => $staff->getNationality()->getId()
        ]);
    }
    
    public function update(Staff $staff, $id) {
        $req = 'UPDATE staff SET nom = :nom, prenom = :prenom, ville = :ville, position_id = :position, team_id = :team, nationality_id = :nationality WHERE id = :id';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':nom' => $staff->getNom(),
            ':prenom' => $staff->getPrenom(),
            ':ville' => $staff->getVille(),
            ':position' => $staff->getPosition()->getId(),
            ':team' => $staff->getTeam()->getId(),
            ':nationality' => $staff->getNationality()->getId(),
            ':id' => $id
        ]);
    }
    
    public function delete($id) {
        $req = 'DELETE FROM staff WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
    }
    
    public function getAllStaffs() {
        $req = 'SELECT staff.id, staff.nom, prenom, staff.ville, position_id, team.nom AS teamName, nationality_id, archive.annee FROM staff JOIN team ON staff.team_id = team.id JOIN archive ON team.archive_id = archive.id ORDER BY archive.annee DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $players = $PDOSt->fetchAll();
        return $players;
    }
    
    public function getStaffById($id) {
        $req = 'SELECT id, nom, prenom, ville, position_id AS position, team_id AS team, nationality_id AS nationality FROM staff WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Staff::class);
        return $PDOSt->fetch();
    }
    
    public function getStaffByTeams($id) {
        $req = 'SELECT staff.id, nom, prenom, ville, position.libelle as position, team_id, nationality.libelle as nationality, nationality.image as image FROM staff JOIN nationality ON staff.nationality_id = nationality.id JOIN position ON position_id = position.id WHERE team_id = ? ORDER BY nom ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $staffs = $PDOSt->fetchAll();
        return $staffs;
    }
    
    public function getAllStaffsWithPagination($offset, $limit): ?array {
        $req = 'SELECT staff.id, staff.nom, prenom, staff.ville, position_id, team.nom AS teamName, nationality_id, archive.annee FROM staff JOIN team ON staff.team_id = team.id JOIN archive ON team.archive_id = archive.id ORDER BY archive.annee DESC LIMIT ? OFFSET ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $staffs = $PDOSt->fetchAll();
        return $staffs;
    }
    
    public function count() {
        $req = 'SELECT count(*) FROM player';
        $PDOSt = $this->pdo->query($req);
        return $PDOSt->fetchColumn();
    }
    
}
