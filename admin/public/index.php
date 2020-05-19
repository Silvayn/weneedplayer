<?php

require_once '../App/autoload.php';

define('RACINE', '/weneedplayer/');
define('RACINE_MAJ', '/weneedplayer/admin/');
define('RACINE_MAJ_CSS', RACINE_MAJ . 'public/css/');
define('RACINE_MAJ_JS', RACINE_MAJ . 'public/js/');
define('RACINE_IMG', RACINE . 'public/images/');
define('RACINE_IMG_WEB', RACINE . 'public/images/web/');
define('RACINE_IMG_UPLOADS', RACINE . 'public/images/uploads/');
define('RACINE_MAJ_IMG_UPLOADS', RACINE_MAJ . 'public/images/uploads/');

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$request = new App\Request();

if($request->getUrl() === RACINE_MAJ){
    $chemin = new Controller\ActualityController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->actualities($page);
}elseif($request->getUrl() === RACINE_MAJ . 'actualities'){
    $chemin = new Controller\ActualityController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->actualities($page);
}elseif($request->getUrl() === RACINE_MAJ . 'add-actuality'){
    $chemin = new Controller\ActualityController($request);
    $response = $chemin->addActuality();
}elseif($request->getUrl() === RACINE_MAJ . 'update-actuality' && $request->getGetData('id')){
    $chemin = new Controller\ActualityController($request);
    $response = $chemin->updateActuality($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'delete-actuality' && $request->getGetData('id')){
    $chemin = new Controller\ActualityController($request);
    $response = $chemin->deleteActuality($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'players'){
    $chemin = new Controller\PlayerController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->players($page);
}elseif($request->getUrl() === RACINE_MAJ . 'add-player'){
    $chemin = new Controller\PlayerController($request);
    $response = $chemin->addPlayer();
}elseif($request->getUrl() === RACINE_MAJ . 'update-player' && $request->getGetData('id')){
    $chemin = new Controller\PlayerController($request);
    $response = $chemin->updatePlayer($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'delete-player' && $request->getGetData('id')){
    $chemin = new Controller\PlayerController($request);
    $response = $chemin->deletePlayer($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'staffs'){
    $chemin = new Controller\StaffController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->staffs($page);
}elseif($request->getUrl() === RACINE_MAJ . 'add-staff'){
    $chemin = new Controller\StaffController($request);
    $response = $chemin->addStaff();
}elseif($request->getUrl() === RACINE_MAJ . 'update-staff' && $request->getGetData('id')){
    $chemin = new Controller\StaffController($request);
    $response = $chemin->updateStaff($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'delete-staff' && $request->getGetData('id')){
    $chemin = new Controller\StaffController($request);
    $response = $chemin->deleteStaff($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'teams'){
    $chemin = new Controller\TeamController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->teams($page);
}elseif($request->getUrl() === RACINE_MAJ . 'add-team'){
    $chemin = new Controller\TeamController($request);
    $response = $chemin->addTeam();
}elseif($request->getUrl() === RACINE_MAJ . 'update-team' && $request->getGetData('id')){
    $chemin = new Controller\TeamController($request);
    $response = $chemin->updateTeam($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'delete-team' && $request->getGetData('id')){
    $chemin = new Controller\TeamController($request);
    $response = $chemin->deleteTeam($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'formats'){
    $chemin = new Controller\FormatTeamController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->formats($page);
}elseif($request->getUrl() === RACINE_MAJ . 'add-format'){
    $chemin = new Controller\FormatTeamController($request);
    $response = $chemin->addFormat();
}elseif($request->getUrl() === RACINE_MAJ . 'update-format' && $request->getGetData('id')){
    $chemin = new Controller\FormatTeamController($request);
    $response = $chemin->updateFormat($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'delete-format' && $request->getGetData('id')){
    $chemin = new Controller\FormatTeamController($request);
    $response = $chemin->deleteFormat($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'classements'){
    $chemin = new Controller\ClassementController($request);
    // ?? FUSION'S OPERATOR
    $page = $request->getGetData('page') ?? 1;
    $response = $chemin->classements($page);
}elseif($request->getUrl() === RACINE_MAJ . 'add-classement'){
    $chemin = new Controller\ClassementController($request);
    $response = $chemin->addClassement();
}elseif($request->getUrl() === RACINE_MAJ . 'update-classement' && $request->getGetData('id')){
    $chemin = new Controller\ClassementController($request);
    $response = $chemin->updateClassement($request->getGetData('id'));
}elseif($request->getUrl() === RACINE_MAJ . 'delete-classement' && $request->getGetData('id')){
    $chemin = new Controller\ClassementController($request);
    $response = $chemin->deleteClassement($request->getGetData('id'));
}else{
    $chemin = new Controller\IndexController($request);
    $response = $chemin->notFound();
}

$response->send();
