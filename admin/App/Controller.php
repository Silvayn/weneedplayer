<?php

namespace App;

use const RACINE;

class Controller {
    /**
     *
     * @var Request
     */
    protected $request;
    
    public function __construct(Request $request) {
        $this->request = $request;
    }
    
    protected function render(string $view, array $data = []): Response {
        extract($data);
        
        /* MISE EN MEMOIRE TAMPON DES TEMPLATES */
        
        ob_start();
        require __DIR__ . '/../templates/' . $view;
        $buffering = ob_get_clean();
        ob_start();
        require __DIR__ . '/../templates/Base.html.php';
        $body = ob_get_clean();
        
        /* RETOURNE LE LAYOUT = $body */
        
        return new Response($body);
    }
    
    protected function isSecure(){
        if($this->request->getSessionData('auth') != true){
            header('Location: ' . RACINE . 'connexion');
        }
    }
    
}
