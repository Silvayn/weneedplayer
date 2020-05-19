<?php

namespace Controller;

use App\Controller;
use Entity\Actuality;
use Entity\Annonce;
use EntityManager\ActualityManager;
use EntityManager\LigueManager;

class ActualitesController extends Controller{
    
    public function actualities(int $page): \App\Response {
        $ActualityManager = new ActualityManager();
        //PAGINATION
        $offset = Annonce::LIMIT * ($page - 1);
        // COUNT NUMBER PAGE ALL YOU NEED
        $total = ceil($ActualityManager->count() / Actuality::LIMIT);
        $actualities = $ActualityManager->getAllActualitiesWithPagination($offset, Actuality::LIMIT);
        $LigueManager = new LigueManager();
        $ligues = $LigueManager->getAllLigue();
        return $this->render('actualites/actualites.html.php', [
            'actualities' => $actualities,
            'ligues' => $ligues,
            'total' => $total,
            'page' => $page
            ]);
    }
    
    public function detailActuality(int $id): \App\Response {
        $ActualityManager = new ActualityManager();
        $actuality = $ActualityManager->getActualityById($id);
        return $this->render('actualites/detail-actualite.html.php', [
            'actuality' => $actuality
        ]);
    }
    
    public function AjaxActuality(int $id) {
        $ActualityManager = new ActualityManager();
        $list = $ActualityManager->getActualityByLigueIdWithAjax($id);
        if($list !== []){
            $test = true;
        }else{
            $test = false;
            $list = 'Pas d\'actualités pour cette ligue pour le moment !';
        }
        return $this->renderJson([
            'list' => $list, 
            'test' => $test
            ]);
    }
    
}
