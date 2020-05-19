<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Player;
use PDO;

class PlayerManager extends EntityManager {
    
    public function add(Player $player) {
        $req = 'INSERT INTO player VALUES(NULL, :nom, :prenom, :ville, :numero, :position_id, :team_id, :nationality_id)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':nom' => $player->getNom(),
            ':prenom' => $player->getPrenom(),
            ':ville' => $player->getVille(),
            ':numero' => $player->getNumero(),
            ':position_id' => $player->getPosition()->getId(),
            ':team_id' => $player->getTeam()->getId(),
            ':nationality_id' => $player->getNationality()->getId()
        ]);
    }
    
    public function update(Player $player, $id) {
        $req = 'UPDATE player SET nom = :nom, prenom = :prenom, ville = :ville, numero = :numero, position_id = :position, team_id = :team, nationality_id = :nationality WHERE id = :id';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':nom' => $player->getNom(),
            ':prenom' => $player->getPrenom(),
            ':ville' => $player->getVille(),
            ':numero' => $player->getNumero(),
            ':position' => $player->getPosition()->getId(),
            ':team' => $player->getTeam()->getId(),
            ':nationality' => $player->getNationality()->getId(),
            ':id' => $id
        ]);
    }
    
    public function delete($id) {
        $req = 'DELETE FROM player WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
    }
    
    public function getAllPlayers() {
        $req = 'SELECT player.id, player.nom, prenom, player.ville, numero, position_id, team.nom AS teamName, nationality_id, archive.annee FROM player JOIN team ON player.team_id = team.id JOIN archive ON team.archive_id = archive.id ORDER BY archive.annee DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $players = $PDOSt->fetchAll();
        return $players;
    }
    
    public function getPlayerById($id) {
        $req = 'SELECT id, nom, prenom, ville, numero, position_id AS position, team_id AS team, nationality_id AS nationality FROM player WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Player::class);
        return $PDOSt->fetch();
    }
    
    public function getAllPlayersWithPagination($offset, $limit): ?array {
        $req = 'SELECT player.id, player.nom, prenom, player.ville, numero, position_id, team.nom AS teamName, nationality_id, archive.annee FROM player JOIN team ON player.team_id = team.id JOIN archive ON team.archive_id = archive.id ORDER BY archive.annee DESC LIMIT ? OFFSET ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $players = $PDOSt->fetchAll();
        return $players;
    }
    
    public function count() {
        $req = 'SELECT count(*) FROM player';
        $PDOSt = $this->pdo->query($req);
        return $PDOSt->fetchColumn();
    }
    
}
