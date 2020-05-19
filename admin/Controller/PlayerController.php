<?php

namespace Controller;

use App\Controller;
use App\Response;
use Entity\Nationality;
use Entity\Player;
use Entity\Position;
use Entity\Team;
use EntityManager\NationalityManager;
use EntityManager\PlayerManager;
use EntityManager\PositionManager;
use EntityManager\TeamManager;
use const RACINE_MAJ;


class PlayerController extends Controller {
    
    public function players(int $page): Response {
        $PlayerManager = new PlayerManager();
        //PAGINATION
        $offset = \Entity\Player::LIMIT * ($page - 1);
        // COUNT NUMBER PAGE ALL YOU NEED
        $total = ceil($PlayerManager->count() / \Entity\Player::LIMIT);
        $players = $PlayerManager->getAllPlayersWithPagination($offset, \Entity\Player::LIMIT);
        return $this->render('player/players.html.php', [
            'players' => $players,
            'total' => $total,
            'page' => $page
        ]);
    }
    
    public function addPlayer(): Response {
        if($this->request->isPost()){
            //var_dump($this->request->getPost());
            $player = new Player($this->request->getPost());
            // POSITION_ID
            if($this->request->getPostData('position')){
                $position = new Position(['id' => $this->request->getPostData('position')]);
                $player->setPosition($position);
            }else{
                $player->addErrors('Choir une Position !');
            }
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new Team(['id' => $this->request->getPostData('team')]);
                $player->setTeam($team);
            }else{
                $player->addErrors('Choir une Equipe !');
            }
            // NATIONALITY_ID
            if($this->request->getPostData('nationality')){
                $nationality = new Nationality(['id' => $this->request->getPostData('nationality')]);
                $player->setNationality($nationality);
            }else{
                $player->addErrors('Choir une Nationalitée !');
            }
            //var_dump($player);
            if($player->getErrors() == []){
                $PlayerManager = new PlayerManager();
                $PlayerManager->add($player);
                $this->request->addFlash('success', 'Joueur ajouter !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $player->getErrors()));
            }
        }
        
        $PositionManager = new PositionManager();
        $positions = $PositionManager->getAllPosition();
        $TeamManager = new TeamManager();
        $teams = $TeamManager->getAllTeams();
        $NationalityManager = new NationalityManager();
        $nationalities = $NationalityManager->getAllNaionality();
        return $this->render('player/add-player.html.php', [
            'positions' => $positions,
            'teams' => $teams,
            'nationalities' => $nationalities
        ]);
    }
    
    public function updatePlayer($id): Response {
        if($this->request->isPost()){
            $player = new Player($this->request->getPost());
            // POSITION_ID
            if($this->request->getPostData('position')){
                $position = new Position(['id' => $this->request->getPostData('position')]);
                $player->setPosition($position);
            }else{
                $player->addErrors('Choir une Position !');
            }
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new Team(['id' => $this->request->getPostData('team')]);
                $player->setTeam($team);
            }else{
                $player->addErrors('Choir une Equipe !');
            }
            // NATIONALITY_ID
            if($this->request->getPostData('nationality')){
                $nationality = new Nationality(['id' => $this->request->getPostData('nationality')]);
                $player->setNationality($nationality);
            }else{
                $player->addErrors('Choir une Nationalitée !');
            }
            //var_dump($player);
            if($player->getErrors() == []){
                $PlayerManager = new PlayerManager();
                $PlayerManager->update($player, $id);
                $this->request->addFlash('success', 'Joueur modifier !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $player->getErrors()));
            }
        }
        
        $PlayerManager = new PlayerManager();
        $player = $PlayerManager->getPlayerById($id);
        $PositionManager = new PositionManager();
        $positions = $PositionManager->getAllPosition();
        $TeamManager = new TeamManager();
        $teams = $TeamManager->getAllTeams();
        $NationalityManager = new NationalityManager();
        $nationalities = $NationalityManager->getAllNaionality();
        return $this->render('player/update-player.html.php', [
            'player' => $player,
            'positions' => $positions,
            'teams' => $teams,
            'nationalities' => $nationalities
        ]);
    }
    
    public function deletePlayer($id): Response {
        $PlayerManager = new PlayerManager();
        $PlayerManager->delete($id);
        header('Location: ' . RACINE_MAJ . 'players');
        return $this->render('player/players.html.php');
    }
    
}
