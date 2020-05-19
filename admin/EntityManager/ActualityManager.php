<?php

namespace EntityManager;

use App\EntityManager;
use Entity\Actuality;
use PDO;

class ActualityManager extends EntityManager {

    public function add(Actuality $actuality) {
        $req = 'INSERT INTO actuality VALUES(Null, now(), :title, :contenu, :photo, :ligue_id)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':title' => $actuality->getTitle(),
            ':contenu' => $actuality->getContenu(),
            ':photo' => $actuality->getPhoto(),
            ':ligue_id' => $actuality->getLigue()->getId()
        ]);
    }
    
    public function update(Actuality $actuality, $id, $update=true) {

        $execute=[
            ':title' => $actuality->getTitle(),
            ':contenu' => $actuality->getContenu(),

            ':ligue' => $actuality->getLigue()->getId(),
            ':id' => $id
        ];

        if($update){
            $req = 'UPDATE actuality SET title = :title, contenu = :contenu, photo = :photo, ligue_id = :ligue WHERE id = :id';
            $execute[':photo' ] = $actuality->getPhoto();
        }else{
           $req = 'UPDATE actuality SET title = :title, contenu = :contenu, ligue_id = :ligue WHERE id = :id';
        }
       $PDOSt = $this->pdo->prepare($req);
       $PDOSt->execute($execute);
   }

   public function delete($id) {
    $req = 'DELETE FROM actuality WHERE id = ?';
    $PDOSt = $this->pdo->prepare($req);
    $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
    $PDOSt->execute();
}

public function getAllActualities() {
    $req = 'SELECT actuality.id, date, title, contenu, photo, ligue.libelle AS ligue FROM actuality JOIN ligue ON ligue_id = ligue.id ORDER BY date DESC';
    $PDOSt = $this->pdo->query($req);
    $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
    $actualities = $PDOSt->fetchAll();
    return $actualities;
}

public function getActualityById($id) {
    $req = 'SELECT id, date, title, contenu, photo, ligue_id AS ligue FROM actuality WHERE id = ?';
    $PDOSt = $this->pdo->prepare($req);
    $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
    $PDOSt->execute();
    $PDOSt->setFetchMode(PDO::FETCH_CLASS, Actuality::class);
    return $PDOSt->fetch();
}

public function getAllActualitiesWithPagination($offset, $limit): ?array {
    $req = 'SELECT actuality.id, date, title, contenu, photo, ligue.libelle AS ligue FROM actuality JOIN ligue ON ligue_id = ligue.id ORDER BY date DESC LIMIT ? OFFSET ?';
    $PDOSt = $this->pdo->prepare($req);
    $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
    $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
    $PDOSt->execute();
    $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
    $actualities = $PDOSt->fetchAll();
    return $actualities;
}

public function count() {
    $req = 'SELECT count(*) FROM actuality';
    $PDOSt = $this->pdo->query($req);
    return $PDOSt->fetchColumn();
}

}
