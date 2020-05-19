<?php

namespace Controller;

use App\Controller;
use App\Response;
use EntityManager\ArchiveManager;
use EntityManager\LigueManager;

class ArchivesController extends Controller {
    
    public function archivesClassements(int $id): Response {
        
        return $this->render('index/underConstruction.html.php', [
            
        ]);
    }
    
}
