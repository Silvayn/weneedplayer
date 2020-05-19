<?php

namespace Controller;

use App\Controller;
use App\Response;

class FormatTeamController extends Controller {
    
    public function formats(int $page): Response {
        $FormatTeamManager = new \EntityManager\FormatTeamManager();
        //PAGINATION
        $offset = \Entity\FormatTeam::LIMIT * ($page - 1);
        // COUNT NUMBER PAGE ALL YOU NEED
        $total = ceil($FormatTeamManager->count() / \Entity\FormatTeam::LIMIT);
        $formats = $FormatTeamManager->getAllFormatTeamWithPagination($offset, \Entity\FormatTeam::LIMIT);
        return $this->render('formatTeam/formats.html.php', [
            'formats' => $formats,
            'total' => $total,
            'page' => $page
        ]);
    }
    
    public function addFormat(): Response {
        if($this->request->isPost()){
            $formatTeam = new \Entity\FormatTeam($this->request->getPost());
            // FORMAT_ID
            if($this->request->getPostData('format')){
                $format = new \Entity\FormatTeam(['id' => $this->request->getPostData('format')]);
                $formatTeam->setFormat($format);
            }else{
                $formatTeam->addErrors('Choir un Format !');
            }
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new \Entity\Team(['id' => $this->request->getPostData('team')]);
                $formatTeam->setTeam($team);
            }else{
                $formatTeam->addErrors('Choir une Equipe !');
            }
            if($formatTeam->getErrors() == []){
                $FormatTeamManager = new \EntityManager\FormatTeamManager();
                $FormatTeamManager->add($formatTeam);
                $this->request->addFlash('success', 'Format - équipe ajouter !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $formatTeam->getErrors()));
            }
        }
        
        $TeamManager = new \EntityManager\TeamManager();
        $teams = $TeamManager->getAllTeams();
        $FormatManager = new \EntityManager\FormatManager();
        $formats = $FormatManager->getAllFormats();
        return $this->render('formatTeam/add-format.html.php', [
            'teams' => $teams,
            'formats' => $formats
        ]);
    }
    
    public function updateFormat($id): Response {
        if($this->request->isPost()){
            $formatTeam = new \Entity\FormatTeam($this->request->getPost());
            // FORMAT_ID
            if($this->request->getPostData('format')){
                $format = new \Entity\FormatTeam(['id' => $this->request->getPostData('format')]);
                $formatTeam->setFormat($format);
            }else{
                $formatTeam->addErrors('Choir un Format !');
            }
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new \Entity\Team(['id' => $this->request->getPostData('team')]);
                $formatTeam->setTeam($team);
            }else{
                $formatTeam->addErrors('Choir une Equipe !');
            }
            if($formatTeam->getErrors() == []){
                $FormatTeamManager = new \EntityManager\FormatTeamManager();
                $FormatTeamManager->update($formatTeam, $id);
                $this->request->addFlash('success', 'Format - équipe modifier !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $formatTeam->getErrors()));
            }
        }
        
        $FormatTeamManager = new \EntityManager\FormatTeamManager();
        $format = $FormatTeamManager->getFormatById($id);
        $TeamManager = new \EntityManager\TeamManager();
        $teams = $TeamManager->getAllTeams();
        $FormatManager = new \EntityManager\FormatManager();
        $formats = $FormatManager->getAllFormats();
        return $this->render('formatTeam/update-format.html.php', [
            'format' => $format,
            'formats' => $formats,
            'teams' => $teams
        ]);
    }
    
    public function deleteFormat($id): Response {
        $FormatTeamManager = new \EntityManager\FormatTeamManager();
        $FormatTeamManager->delete($id);
        header('Location: ' . RACINE_MAJ . 'formats');
        return $this->render('formatTeam/formats.html.php');
    }
    
}
