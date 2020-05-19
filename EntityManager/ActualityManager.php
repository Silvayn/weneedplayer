<?php

namespace EntityManager;

use App\EntityManager;
use DateTime;
use Entity\Actuality;
use Tools\Base;
use PDO;

class ActualityManager extends EntityManager {

    use Base;
    
    public function getAllActualities(): ?array {
        $req = 'SELECT actuality.id, date AS date_actuality, title, contenu, photo, ligue.libelle AS ligue FROM actuality JOIN ligue ON ligue_id = ligue.id ORDER BY date DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Actuality::class);
        $actualities = $PDOSt->fetchAll();
        foreach ($actualities as $value) {
            $date = new DateTime($value->date_actuality);
            $value->setDate($date);
            unset($value->date_actuality);
        }
        return $actualities;
    }
    
    public function getAllActualitiesLimit3(): ?array {
        $req = 'SELECT actuality.id, date AS date_actuality, title, contenu, photo, ligue.libelle AS ligue FROM actuality JOIN ligue ON ligue_id = ligue.id ORDER BY date DESC LIMIT 3';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Actuality::class);
        $actualities = $PDOSt->fetchAll();
        foreach ($actualities as $value) {
            $date = new DateTime($value->date_actuality);
            $value->setDate($date);
            unset($value->date_actuality);
        }
        return $actualities;
    }
    
    public function getActualityById(int $id) {
        $req = 'SELECT actuality.id, date AS date_actuality, title, contenu, photo, ligue_id AS ligue FROM actuality JOIN ligue ON ligue_id = ligue.id WHERE actuality.id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Actuality::class);
        return $PDOSt->fetch();
    }
    
    public function getAllActualitiesWithPagination($offset, $limit): ?array {
        $sql = 'SELECT actuality.id, date AS date_actuality, title, contenu, photo, ligue.libelle AS ligue FROM actuality JOIN ligue ON ligue_id = ligue.id ORDER BY date DESC LIMIT ? OFFSET ?';
        $PDOSt = $this->pdo->prepare($sql);
        $PDOSt->bindValue(1, $limit, PDO::PARAM_INT);
        $PDOSt->bindValue(2, $offset, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Actuality::class);
        $actualities = $PDOSt->fetchAll();
        foreach ($actualities as $value) {
            $date = new DateTime($value->date_actuality);
            $value->setDate($date);
            unset($value->date_actuality);
        }
        return $actualities;
    }
    
    public function count() {
        $req = 'SELECT count(*) FROM actuality';
        $PDOSt = $this->pdo->query($req);
        return $PDOSt->fetchColumn();
    }
    
    public function getActualityByLigueIdWithAjax(int $id) {
        $req = 'SELECT actuality.id, date AS date_actuality, title, contenu, photo, ligue.libelle AS ligue FROM actuality JOIN ligue ON ligue_id = ligue.id WHERE actuality.ligue_id = ? ORDER BY date DESC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_ASSOC);
        $list = $PDOSt->fetchAll();
        foreach ($list as &$value) {
            $value['date_actuality'] = ucwords($this->getFrenchDate( new \DateTime($value['date_actuality'])));
            $value['contenu'] = $this->getExtract($value['contenu']);
        }
        return $list;
    }
    
}
