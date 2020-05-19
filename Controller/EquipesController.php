<?php

namespace Controller;

use App\Controller;
use App\Response;
use EntityManager\LigueManager;
use EntityManager\PlayerManager;
use EntityManager\TeamManager;

class EquipesController extends Controller {
    
    public function equipes(int $id): Response {
        $LigueManager = new LigueManager();
        $ligues = $LigueManager->getLigueById($id);
        $TeamsManager = new TeamManager();
        $teams = $TeamsManager->getAllTeamsByLigue($id);
        $teamsD1Champion = $TeamsManager->getAllTeamsByLigueD1Champion($id);
        $teamsD1Challenger = $TeamsManager->getAllTeamsByLigueD1Challenger($id);
        $teamsD2 = $TeamsManager->getAllTeamsByLigueD2($id);
        $teamsD3 = $TeamsManager->getAllTeamsByLigueD3($id);
        $teamsD4 = $TeamsManager->getAllTeamsByLigueD4($id);
        return $this->render('equipes/equipes.html.php', [
            'ligues' => $ligues,
            'teams' => $teams,
            'teamsD1Champion' => $teamsD1Champion,
            'teamsD1Challenger' => $teamsD1Challenger,
            'teamsD2' => $teamsD2,
            'teamsD3' => $teamsD3,
            'teamsD4' => $teamsD4
                ]);
    }
    
    public function detailEquipe(int $id): Response {
        $TeamsManager = new TeamManager();
        $team = $TeamsManager->getTeamsById($id);
        $PlayerManager = new PlayerManager();
        $players = $PlayerManager->getPlayersByTeams($id);
        $StaffManager = new \EntityManager\StaffManager();
        $staffs = $StaffManager->getStaffByTeams($id);
        return $this->render('equipes/detail-equipe.html.php', [
            'team' => $team, 
            'players' => $players, 
            'staffs' => $staffs
                ]);
    }
    
    public function classements(int $id): Response {
        $LigueManager = new LigueManager();
        $ligues = $LigueManager->getLigueById($id);
        $ClassementManager = new \EntityManager\ClassementManager();
        $classements = $ClassementManager->getClassementByLigue($id);
        $classementsD1 = $ClassementManager->getClassementD1($id);
        $classementsD1Challenger = $ClassementManager->getClassementD1Challenger($id);
        $classementsD2 = $ClassementManager->getClassementD2($id);
        $classementsD3 = $ClassementManager->getClassementD3($id);
        $classementsD4 = $ClassementManager->getClassementD4($id);
        return $this->render('equipes/classements.html.php', [
            'classements' => $classements,
            'classementsD1' => $classementsD1,
            'classementsD1Challenger' => $classementsD1Challenger,
            'classementsD2' => $classementsD2,
            'classementsD3' => $classementsD3,
            'classementsD4' => $classementsD4,
            'ligues' => $ligues
                ]);
    }
    
}
