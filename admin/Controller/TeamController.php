<?php

namespace Controller;

use App\Controller;
use App\Response;
use EntityManager\TeamManager;
use finfo;

class TeamController extends Controller {
    
    public function teams(int $page): Response {
        $TeamManager = new TeamManager();
        //PAGINATION
        $offset = \Entity\Team::LIMIT * ($page - 1);
        // COUNT NUMBER PAGE ALL YOU NEED
        $total = ceil($TeamManager->count() / \Entity\Team::LIMIT);
        $teams = $TeamManager->getAllTeamsWithPagination($offset, \Entity\Team::LIMIT);
        return $this->render('team/teams.html.php', [
            'teams' => $teams,
            'total' => $total,
            'page' => $page
        ]);
    }
    
    public function addTeam(): Response {
        if($this->request->isPost()){
            $photo = $this->request->getFilesData('photo');
            $team = new \Entity\Team($this->request->getPost());
            // LIGUE_ID
            if($this->request->getPostData('ligue')){
                $ligue = new \Entity\Ligue(['id' => $this->request->getPostData('ligue')]);
                $team->setLigue($ligue);
            }else{
                $team->addErrors('Choir une Ligue !');
            }
            if($photo['error'] == 0 || $photo['error'] == 4){
                if($photo['error'] == 0){
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $formats = ['image/png', 'image/gif', 'image/jpeg'];
                    if(!in_array($finfo->file($photo['tmp_name']), $formats)){
                        $team->addErrors('Format Image !');
                    }
                }
            }else{
                if($photo['error'] == UPLOAD_ERR_FORM_SIZE || $photo['error'] == UPLOAD_ERR_INI_SIZE){
                  $team->addErrors('Taille de l\'image trop grande !');
              }else{
               $team->addErrors('Erreur image !');
           } 
       } 
       if($team->getErrors() == []){
        if($photo['error'] == 0){
            $filename = md5(uniqid(rand(), true)) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
            move_uploaded_file($photo['tmp_name'], __DIR__ . '/../../public/images/uploads/teams/' . $filename);
            $team->setPhoto($filename);
        }
        $TeamManager = new TeamManager();
        $TeamManager->add($team);
        $this->request->addFlash('success', 'Equipe ajoutée !');
        header('Location: '. RACINE_MAJ.'teams');
        exit;
    }else{
        //MESSAGE FLASH ERRORS
        $this->request->addFlash('errors', implode('<br>', $team->getErrors()));
    }
}

$LigueManager = new \EntityManager\LigueManager();
$ligues = $LigueManager->getAllLigues();
$ArchivesManager = new \EntityManager\ArchiveManager();
$archives = $ArchivesManager->getAllArchives();
$FormatD1Manager = new \EntityManager\FormatD1Manager();
$format_d1 = $FormatD1Manager->getAllFormatD1();
return $this->render('team/add-team.html.php', [
    'ligues' => $ligues,
    'archives' => $archives,
    'format_d1' => $format_d1
]);
}

public function updateTeam($id): Response {
    $TeamNanager = new \EntityManager\TeamManager();
    $teamOriginal = $TeamNanager->getTeamsById($id);
    if($this->request->isPost()){
        $team = new \Entity\Team($this->request->getPost());
        if($this->request->getPostData('delete-photo') != null){
            $chemin = __DIR__.'/../../public/images/uploads/teams/' . $teamOriginal->getPhoto();
            unlink($chemin);
        }
        $photo = $this->request->getFilesData('photo');
        if( $photo['error'] != 4){
            if($photo['error'] == 0){
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $formats = ['image/png', 'image/gif', 'image/jpeg'];
                if(!in_array($finfo->file($photo['tmp_name']), $formats)){
                    $team->addErrors('Format Image !');
                }
            }else{
                if($photo['error'] == UPLOAD_ERR_FORM_SIZE || $photo['error'] == UPLOAD_ERR_INI_SIZE){
                    $team->addErrors('Taille de l\'image trop grande !');
                }else{
                    $team->addErrors('Erreur image !');
                }
            }
        }
        // LIGUE_ID
        if($this->request->getPostData('ligue')){
            $ligue = new \Entity\Ligue(['id' => $this->request->getPostData('ligue')]);
            $team->setLigue($ligue);
        }else{
            $team->addErrors('Choir une Ligue !');
        }
        if($team->getErrors() == []){
            if($photo['error'] == 0){
                $filename = md5(uniqid(rand(), true)) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
                move_uploaded_file($photo['tmp_name'], __DIR__ . '/../../public/images/uploads/teams/' . $filename);
                $chemin =__DIR__ . '/../../public/images/uploads/teams/'.$teamOriginal->getPhoto();
                if (is_file($chemin) && $teamOriginal->getPhoto() !='ffp.jpg'){
                    unlink($chemin);
                }
                $team->setPhoto($filename);
            }
            $TeamManager = new TeamManager();
            $update = $team->getPhoto()?true:false;
            $TeamManager->update($team, $id, $update);
            $this->request->addFlash('success', 'Equipe modifiée !');
            header('Location: '. RACINE_MAJ.'teams');
            exit;
        }else{
            //MESSAGE FLASH ERRORS
            $this->request->addFlash('errors', implode('<br>', $team->getErrors()));
        }
    }
    
    $LigueManager = new \EntityManager\LigueManager();
    $ligues = $LigueManager->getAllLigues();
    $ArchivesManager = new \EntityManager\ArchiveManager();
    $archives = $ArchivesManager->getAllArchives();
    $FormatD1Manager = new \EntityManager\FormatD1Manager();
    $format_d1 = $FormatD1Manager->getAllFormatD1();
    return $this->render('team/update-team.html.php', [
        'team' => $teamOriginal,
        'ligues' => $ligues,
        'archives' => $archives,
        'format_d1' => $format_d1
    ]);
}

public function deleteTeam($id): Response {
    $TeamManager = new \EntityManager\TeamManager();
    $team = $TeamManager->getTeamsById($id);
    $chemin = __DIR__ . '/../../public/images/uploads/teams/' . $team->getPhoto();
    if (is_file($chemin) && $teamOriginal->getPhoto() != 'ffp.jpg'){
        unlink($chemin);
    }
    $TeamManager->delete($id);
    header('Location: ' . RACINE_MAJ . 'teams');
    return $this->render('team/teams.html.php');
}

}
