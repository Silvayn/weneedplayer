<?php

namespace Controller;

use App\Controller;
use App\Response;

class ClassementController extends Controller {
    
    public function classements(int $page): Response {
        $ClassementManager = new \EntityManager\ClassementManager();
        //PAGINATION
        $offset = \Entity\Classement::LIMIT * ($page - 1);
        // COUNT NUMBER PAGE ALL YOU NEED
        $total = ceil($ClassementManager->count() / \Entity\Classement::LIMIT);
        $classements = $ClassementManager->getAllClassementsWithPagination($offset, \Entity\Classement::LIMIT);
        return $this->render('classement/classements.html.php', [
            'classements' => $classements,
            'total' => $total,
            'page' => $page
        ]);
    }
    
    public function addClassement(): Response {
        if($this->request->isPost()){
            $classement = new \Entity\Classement($this->request->getPost());
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new \Entity\Team(['id' => $this->request->getPostData('team')]);
                $classement->setTeam($team);
            }else{
                $classement->addErrors('Choir une Equipe !');
            }
            // ARCHIVE_ID
            if($this->request->getPostData('archive')){
                $archive = new \Entity\Archive(['id' => $this->request->getPostData('archive')]);
                $classement->setArchive($archive);
            }else{
                $classement->addErrors('Choir une année !');
            }
            if($classement->getErrors() == []){
                $ClassementManager = new \EntityManager\ClassementManager();
                $ClassementManager->add($classement);
                $this->request->addFlash('success', 'Classement ajouter !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $classement->getErrors()));
            }
        }
        
        $TeamManager = new \EntityManager\TeamManager();
        $teams = $TeamManager->getAllTeams();
        $ArchiveManager = new \EntityManager\ArchiveManager();
        $archive = $ArchiveManager->getAllArchives();
        return $this->render('classement/add-classement.html.php', [
            'teams' => $teams,
            'archive' => $archive
        ]);
    }
    
    public function updateClassement(int $id): Response {
        if($this->request->isPost()){
            $classement = new \Entity\Classement($this->request->getPost());
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new \Entity\Team(['id' => $this->request->getPostData('team')]);
                $classement->setTeam($team);
            }else{
                $classement->addErrors('Choir une Equipe !');
            }
            // ARCHIVE_ID
            if($this->request->getPostData('archive')){
                $archive = new \Entity\Archive(['id' => $this->request->getPostData('archive')]);
                $classement->setArchive($archive);
            }else{
                $classement->addErrors('Choir une année !');
            }
            if($classement->getErrors() == []){
                $ClassementManager = new \EntityManager\ClassementManager();
                $ClassementManager->update($classement, $id);
                $this->request->addFlash('success', 'Classement modifier !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $classement->getErrors()));
            }
        }
        
        $ClassementManager = new \EntityManager\ClassementManager();
        $classementId = $ClassementManager->getClassementById($id);
        $TeamManager = new \EntityManager\TeamManager();
        $teams = $TeamManager->getAllTeams();
        $ArchiveManager = new \EntityManager\ArchiveManager();
        $archive = $ArchiveManager->getAllArchives();
        return $this->render('classement/update-classement.html.php', [
            'classementId' => $classementId,
            'archive' => $archive,
            'teams' => $teams
        ]);
    }
    
    public function deleteClassement(int $id): Response {
        $ClassementManager = new \EntityManager\ClassementManager();
        $ClassementManager->delete($id);
        header('Location: ' . RACINE_MAJ . 'classements');
        return $this->render('classement/classements.html.php');
    }
    
}