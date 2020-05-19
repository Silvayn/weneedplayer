<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Utilisateur;
use PDO;

class UserManager extends EntityManager {

    public function add(Utilisateur $user) {
        $req = 'INSERT INTO user VALUES (null, :nom, :prenom, null, null, :mail, null, null, null, :photo, :login, :pwd)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':nom' => ucfirst($user->getNom()),
            ':prenom' => ucfirst($user->getPrenom()),
            ':mail' => $user->getMail(),
            ':photo' => 'user-icon.png',
            ':login' => $user->getLogin(),
            ':pwd' => password_hash($user->getPwd(), PASSWORD_BCRYPT)
        ]);
        $PDOSt->execute();
        $user->setId($this->pdo->lastInsertId());
    }
    
    public function update(Utilisateur $user, $update = true) {
        $execute = [
            ':nom' => ucfirst($user->getNom()),
            ':prenom' => ucfirst($user->getPrenom()),
            ':adresse' => $user->getAdresse(),
            ':ville' => ucfirst($user->getVille()),
            ':mail' => $user->getMail(),
            ':phone' => $user->getPhone(),
            ':user_team' => ucwords($user->getUser_team()),
            ':ligue' => $user->getLigue()->getId(),

            ':id' => $user->getId()->getId()
        ];
        if($update){
            $req = 'UPDATE user SET nom = :nom, prenom = :prenom, adresse = :adresse, ville = :ville, mail = :mail, phone = :phone, user_team = :user_team, ligue_id = :ligue, photo = :photo WHERE id = :id';
            $execute[':photo' ] = $user->getPhoto();
        }else{
           $req = 'UPDATE user SET nom = :nom, prenom = :prenom, adresse = :adresse, ville = :ville, mail = :mail, phone = :phone, user_team = :user_team, ligue_id = :ligue WHERE id = :id';
        }
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute($execute);
    }
    
    public function getUser($login){
        $req = 'SELECT id, nom, prenom, adresse, ville, mail, phone, user_team, ligue_id AS ligue, photo, login, pwd FROM user WHERE login = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([$login]);
        return $PDOSt->fetch();
    }
    
    public function getUserById($id) {
        $req = 'SELECT id, nom, prenom, adresse, ville, mail, phone, user_team, ligue_id as ligue, photo, login FROM user WHERE id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);
        return $PDOSt->fetch();
    }
    
    public function UserMail($userMail) {
        $req = 'SELECT mail FROM user WHERE mail = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $userMail);
        $PDOSt->execute();
        if(count($PDOSt) == 1){
            $errors = 'Mail déjà utilisé !';
        }
        return $errors;
    }
    
    public function CheckLogin(string $userLogin) {
        $req = 'SELECT COUNT(*) AS nbr FROM user WHERE login = :login';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(':login', $userLogin, PDO::PARAM_STR);
        $result = $PDOSt->execute();
        return $result;
    }
    
    public function CheckLoginWithAjax(string $login) {
        $req = 'SELECT COUNT(*) AS nbr FROM user WHERE login = :login';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(':login', $login, PDO::PARAM_STR);
        $PDOSt->execute();
        $account_free=($PDOSt->fetchColumn()==0)?1:0;
        if(!$account_free)
        {
            $check = true;
        }else{
            $check = false;
        }
        return $check;
    }

}
