<?php

namespace Controller;

use App\Controller;
use App\Response;
use EntityManager\LigueManager;

class LigueController extends Controller {
    
    public function ligue(int $id): Response {
        $LigueManager = new LigueManager();
        $ligues = $LigueManager->getLigueById($id);
        
        return $this->render('ligues/ligues.html.php', ['ligues' => $ligues,
            
                ]);
    }
    
}
