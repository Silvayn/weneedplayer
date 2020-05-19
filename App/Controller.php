<?php

namespace App;

class Controller {
    /**
     *
     * @var \App\Request
     */
    protected $request;
    
    public function __construct(\App\Request $request) {
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
    protected function renderJSON(array $data = []): Response {
        extract($data);
        $response = new Response(json_encode($data));
        $response->setHeader(['Content-Type: application/json']);
        
        return  $response;
    }
    
    protected function isSecure(){
        if($this->request->getSessionData('auth') != true){
            header('Location: ' . RACINE . 'connexion');
        }
    }
    
}
