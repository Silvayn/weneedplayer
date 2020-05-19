<?php

namespace EntityManager;

use App\EntityManager;
use DateTime;
use Entity\Annonce;
use Tools\Base;
use PDO;

class AnnonceManager extends EntityManager {

    use Base;

    public function add(Annonce $annonce) {
        $req = 'INSERT INTO annonce VALUES(Null, now(), :title, :contenu, :category_id, :skill_id, :ligue_id, :user_id)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':title' => $annonce->getTitle(),
            ':contenu' => $annonce->getContenu(),
            ':category_id' => $annonce->getCategory()->getId(),
            ':skill_id' => $annonce->getSkill()->getId(),
            ':ligue_id' => $annonce->getLigue()->getId(),
            ':user_id' => $annonce->getUser()->getId()
        ]);
    }
    
    public function update(Annonce $annonce, $id) {
        $req = 'UPDATE annonce SET title = :title, contenu = :contenu, category_id = :category, skill_id = :skill, ligue_id = :ligue WHERE id = :id AND user_id = :user';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':title' => $annonce->getTitle(),
            ':contenu' => $annonce->getContenu(),
            ':category' => $annonce->getCategory()->getId(),
            ':skill' => $annonce->getSkill()->getId(),
            ':ligue' => $annonce->getLigue()->getId(),
            ':user' => $annonce->getUser()->getId(),
            ':id' => $id
        ]);
    }
    
    public function delete($id, $user) {
        $req = 'DELETE FROM annonce WHERE id = ? AND user_id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $user, PDO::PARAM_INT);
        $PDOSt->execute();
    }
    
    public function getAnnonceById(int $id) {
        $req = 'SELECT annonce.id, date, title, contenu, ligue.libelle as ligue, categorie.libelle as category, skill.libelle as skill, user.login AS user, user.photo, user_team, user.ligue_id, user.phone, user.mail FROM annonce JOIN user ON user_id = user.id JOIN categorie ON category_id = categorie.id JOIN skill ON skill_id = skill.id JOIN ligue ON annonce.ligue_id = ligue.id WHERE annonce.id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $annonce = $PDOSt->fetch();
        if(empty($annonce)){
            $annonce = false;
            return $annonce;
        }else{
            return $annonce;
        }
        
    }
    
    public function getAnnonceByUserId($id) {
        $req = 'SELECT annonce.id, date AS date_annonce, title, contenu, ligue.libelle as ligue, categorie.libelle as category, skill.libelle as skill FROM annonce JOIN categorie ON category_id = categorie.id JOIN skill ON skill_id = skill.id JOIN ligue ON ligue_id = ligue.id WHERE annonce.user_id = ? ORDER BY date DESC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Annonce::class);
        $annonces = $PDOSt->fetchAll();
        foreach ($annonces as $value) {
            $date = new DateTime($value->date_annonce);
            $value->setDate($date);
            unset($value->date_annonce);
        }
        return $annonces;
    }
    
    public function getAnnonceByIdAndUserId($id, $user) {
        $req = 'SELECT id, title, date, contenu, ligue_id AS ligue, category_id AS category, skill_id AS skill FROM annonce WHERE id = ? AND user_id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $user, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Annonce::class);
        return $PDOSt->fetch();
    }
    
    public function getAllAnnonces(): ?array {
        $req = 'SELECT annonce.id, title, date AS date_annonce, contenu, photo, ligue.libelle AS ligue, categorie.libelle as category, skill.libelle as skill, user.login AS user FROM annonce JOIN ligue ON ligue_id = ligue.id JOIN categorie ON category_id = categorie.id JOIN skill ON skill_id = skill.id JOIN user ON user_id = user.id ORDER BY date DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Annonce::class);
        $annonces = $PDOSt->fetchAll();
        foreach ($annonces as $value) {
            $date = new DateTime($value->date_annonce);
            $value->setDate($date);
            unset($value->date_annonce);
        }
        return $annonces;
    }
    
    public function getAllAnnoncesWithPagination($offset, $limit): ?array {
        $req = 'SELECT annonce.id, title, date AS date_annonce, contenu, user.photo, ligue.libelle AS ligue, categorie.libelle as category, skill.libelle as skill, user.login AS user FROM annonce JOIN ligue ON ligue_id = ligue.id JOIN categorie ON category_id = categorie.id JOIN skill ON skill_id = skill.id JOIN user ON user_id = user.id ORDER BY date DESC LIMIT ? OFFSET ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $annonces = $PDOSt->fetchAll();
        foreach ($annonces as &$value) {
            $value['date_annonce'] = ucwords($this->getFrenchDate( new \DateTime($value['date_annonce'])));
            $value['contenu'] = $this->getExtract($value['contenu']);
            $value['user'] = ucfirst($value['user']);
        }
        return $annonces;
    }
    
    public function count() {
        $req = 'SELECT count(*) FROM annonce';
        $PDOSt = $this->pdo->query($req);
        return $PDOSt->fetchColumn();
    }
    
    public function countByUserId(int $id) {
        $req = 'SELECT count(*) FROM annonce WHERE user_id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        return $PDOSt->fetchColumn();
    }

    public function getAnnoncesLimit4(): ?array {
       $req = 'SELECT annonce.id, title, date AS date_annonce, contenu, photo, ligue.libelle AS ligue, categorie.libelle as category, skill.libelle as skill, user.login AS user FROM annonce JOIN ligue ON ligue_id = ligue.id JOIN categorie ON category_id = categorie.id JOIN skill ON skill_id = skill.id JOIN user ON user_id = user.id ORDER BY date DESC LIMIT 4';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $annonces = $PDOSt->fetchAll();
        foreach ($annonces as &$value) {
            $value['date_annonce'] = ucwords($this->getFrenchDate( new \DateTime($value['date_annonce'])));
            $value['contenu'] = $this->getExtract($value['contenu']);
            $value['user'] = ucfirst($value['user']);
        }
        return $annonces;
    }

    public function getAnnonceByLigueIdWithAjax(int $id){
        $req = 'SELECT annonce.id, title, date AS date_annonce, contenu, user.photo, ligue.libelle AS ligue, categorie.libelle as category, skill.libelle as skill, user.login AS user FROM annonce JOIN ligue ON ligue_id = ligue.id JOIN categorie ON category_id = categorie.id JOIN skill ON skill_id = skill.id JOIN user ON user_id = user.id WHERE annonce.ligue_id = ? ORDER BY date DESC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $list = $PDOSt->fetchAll();
        foreach ($list as &$value) {
            $value['date_annonce'] = ucwords($this->getFrenchDate( new \DateTime($value['date_annonce'])));
            $value['contenu'] = $this->getExtract($value['contenu']);
            $value['user'] = ucfirst($value['user']);
        }
        return $list;
    }

}
