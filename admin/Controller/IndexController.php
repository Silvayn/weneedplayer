<?php

namespace Controller;

use App\Controller;
use App\Response;
use const RACINE_MAJ;


class IndexController extends Controller {
    
    public function notFound(): Response {
        
        return $this->render('index/404.html.php');
    }
    
}
