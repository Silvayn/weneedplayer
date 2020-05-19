<?php

require_once '../App/autoload.php';

session_start();

define('RACINE', '/weneedplayer/');
define('RACINE_MAJ', '/weneedplayer/admin/');
define('RACINE_CONTROLLER', RACINE . 'Controller/');
define('RACINE_CSS', RACINE . 'public/css/');
define('RACINE_JS', RACINE . 'public/js/');
define('RACINE_IMG', RACINE . 'public/images/');
define('RACINE_IMG_WEB', RACINE . 'public/images/web/');
define('RACINE_IMG_UPLOADS', RACINE . 'public/images/uploads/');
define('RACINE_MAJ_IMG_UPLOADS', RACINE_MAJ . 'public/images/uploads/');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$request = New \App\Request();

if($request->getUrl() === RACINE){
    $chemin = new \Controller\IndexController($request);
    $response = $chemin->index();
}elseif($request->getUrl() === RACINE . 'connexion'){
        if($request->getSessionData('auth') == true){
            $chemin = new \Controller\IndexController($request);
            $response = $chemin->index();
        }else{
            $chemin = new Controller\IndexController($request);
            $response = $chemin->connexion();
        }
}elseif($request->getUrl() === RACINE . 'deconnexion'){
   $_SESSION = array();
    setcookie('PHPSESSID', '', time() - 3600, '/');
    session_destroy();
    $chemin = new \Controller\IndexController($request);
    $response = $chemin->index();
}elseif($request->getUrl() === RACINE . 'profil' && $request->getSessionData('id')){
    $chemin = new \Controller\IndexController($request);
    $response = $chemin->edit($request->getSessionData('id'));
}elseif($request->getUrl() === RACINE . 'mes-annonces' && $request->getSessionData('id')){
        if($request->getSessionData('auth') == true){
            $chemin = new Controller\IndexController($request);
            $response = $chemin->myAdds($request->getSessionData('id'));
        }else{
            $chemin = new Controller\IndexController($request);
            $response = $chemin->connexion();
        }
}elseif($request->getUrl() === RACINE . 'inscription'){
    $chemin = new \Controller\IndexController($request);
    $response = $chemin->inscription();
}elseif($request->getUrl() === RACINE . 'archives-equipes' && $request->getGetData('id')){
    $chemin = new \Controller\ArchivesController($request);
    $response = $chemin->archivesClassements($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'archives-classements' && $request->getGetData('id')){
    $chemin = new \Controller\ArchivesController($request);
    $response = $chemin->archivesClassements($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'actualites'){
    $chemin = new \Controller\ActualitesController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->actualities($page);
}elseif($request->getUrl() === RACINE . 'detail-actualite' && $request->getGetData('id')){
    $chemin = new \Controller\ActualitesController($request);
    $response = $chemin->detailActuality($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'add-annonce'){
    $chemin = new \Controller\AnnoncesController($request);
    if($request->getSessionData('auth') === true){
        $response = $chemin->addAnnonce();
    }else{
        $chemin = new \Controller\IndexController($request);
        $response = $chemin->connexion();
    }
}elseif($request->getUrl() === RACINE . 'edit-annonce' && $request->getGetData('id') && $request->getSessionData('id')){
    $chemin = new \Controller\AnnoncesController($request);
    if($request->getSessionData('auth') === true){
        $response = $chemin->editAnnonce($request->getGetData('id'), $request->getSessionData('id'));
    }else{
        $chemin = new \Controller\IndexController($request);
        $response = $chemin->connexion();
    }
}elseif($request->getUrl() === RACINE . 'delete-annonce' && $request->getGetData('id') && $request->getSessionData('id')){
    $chemin = new \Controller\AnnoncesController($request);
    if($request->getSessionData('auth') === true){
        $response = $chemin->deleteAnnonce($request->getGetData('id'), $request->getSessionData('id'));
    }else{
        $chemin = new \Controller\IndexController($request);
        $response = $chemin->connexion();
    }
}elseif($request->getUrl() === RACINE . 'annonces'){
    $chemin = new \Controller\AnnoncesController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->annonces($page);
}elseif($request->getUrl() === RACINE . 'detail-annonce' && $request->getGetData('id')){
    if($request->getSessionData('auth') === true){
        if(!is_numeric($request->getGetData('id')) || empty($request->getGetData('id'))){
            $chemin = new Controller\IndexController($request);
            $response = $chemin->notFound();
        }else{
            $chemin = new \Controller\AnnoncesController($request);
            $response = $chemin->detailAnnonce($request->getGetData('id'));
        }
    }else{
        $chemin = new \Controller\IndexController($request);
        $response = $chemin->connexion();
    }
}elseif($request->getUrl() === RACINE . 'equipes' && $request->getGetData('id')){
    $chemin = new \Controller\EquipesController($request);
    $response = $chemin->equipes($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'detail-equipe' && $request->getGetData('id')){
    $chemin = new \Controller\EquipesController($request);
    $response = $chemin->detailEquipe($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'classements' && $request->getGetData('id')){
    $chemin = new \Controller\EquipesController($request);
    $response = $chemin->classements($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'ajaxAnnonce' && $request->getGetData('id')){
    $chemin = new \Controller\AnnoncesController($request);
    $response = $chemin->ajaxAnnonce($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'AjaxActuality' && $request->getGetData('id')){
    $chemin = new \Controller\ActualitesController($request);
    $response = $chemin->ajaxActuality($request->getGetData('id'));
}elseif($request->getUrl() === RACINE . 'ajaxLogin'){
    $chemin = new \Controller\indexController($request);
    $response = $chemin->ajaxLogin();
}else{
    $chemin = new Controller\IndexController($request);
    $response = $chemin->notFound();
}

$response->send();
