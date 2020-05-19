<?php

namespace Controller;

use App\Controller;
use App\Response;
use Entity\Nationality;
use Entity\Position;
use Entity\Staff;
use Entity\Team;
use EntityManager\NationalityManager;
use EntityManager\PositionManager;
use EntityManager\StaffManager;
use EntityManager\TeamManager;
use const RACINE_MAJ;

class StaffController extends Controller {
    
    public function staffs(int $page): Response {
        $StaffManager = new StaffManager();
        //PAGINATION
        $offset = \Entity\Staff::LIMIT * ($page - 1);
        // COUNT NUMBER PAGE ALL YOU NEED
        $total = ceil($StaffManager->count() / \Entity\Staff::LIMIT);
        $staffs = $StaffManager->getAllStaffsWithPagination($offset, \Entity\Staff::LIMIT);
        return $this->render('staff/staffs.html.php', [
            'staffs' => $staffs,
            'total' => $total,
            'page' => $page
        ]);
    }
    
    public function addStaff(): Response {
        if($this->request->isPost()){
            $staff = new Staff($this->request->getPost());
            // POSITION_ID
            if($this->request->getPostData('position')){
                $position = new Position(['id' => $this->request->getPostData('position')]);
                $staff->setPosition($position);
            }else{
                $staff->addErrors('Choir une Position !');
            }
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new Team(['id' => $this->request->getPostData('team')]);
                $staff->setTeam($team);
            }else{
                $staff->addErrors('Choir une Equipe !');
            }
            // NATIONALITY_ID
            if($this->request->getPostData('nationality')){
                $nationality = new Nationality(['id' => $this->request->getPostData('nationality')]);
                $staff->setNationality($nationality);
            }else{
                $staff->addErrors('Choir une Nationalitée !');
            }
            if($staff->getErrors() == []){
                $StaffManager = new StaffManager();
                $StaffManager->add($staff);
                $this->request->addFlash('success', 'Staff ajouter !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $staff->getErrors()));
            }
        }
        
        $PositionManager = new PositionManager();
        $positions = $PositionManager->getAllPosition();
        $TeamManager = new TeamManager();
        $teams = $TeamManager->getAllTeams();
        $NationalityManager = new NationalityManager();
        $nationalities = $NationalityManager->getAllNaionality();
        return $this->render('staff/add-staff.html.php', [
            'positions' => $positions,
            'teams' => $teams,
            'nationalities' => $nationalities
        ]);
    }
    
    public function updateStaff($id): Response {
        if($this->request->isPost()){
            $staff = new Staff($this->request->getPost());
            // POSITION_ID
            if($this->request->getPostData('position')){
                $position = new Position(['id' => $this->request->getPostData('position')]);
                $staff->setPosition($position);
            }else{
                $staff->addErrors('Choir une Position !');
            }
            // TEAM_ID
            if($this->request->getPostData('team')){
                $team = new Team(['id' => $this->request->getPostData('team')]);
                $staff->setTeam($team);
            }else{
                $staff->addErrors('Choir une Equipe !');
            }
            // NATIONALITY_ID
            if($this->request->getPostData('nationality')){
                $nationality = new Nationality(['id' => $this->request->getPostData('nationality')]);
                $staff->setNationality($nationality);
            }else{
                $staff->addErrors('Choir une Nationalitée !');
            }
            //var_dump($staff);
            if($staff->getErrors() == []){
                $StaffManager = new StaffManager();
                $StaffManager->update($staff, $id);
                $this->request->addFlash('success', 'Staff modifier !');
            }else{
                $this->request->addFlash('errors', implode('<br>', $staff->getErrors()));
            }
        }
        
        $StaffManager = new StaffManager();
        $staff = $StaffManager->getStaffById($id);
        $PositionManager = new PositionManager();
        $positions = $PositionManager->getAllPosition();
        $TeamManager = new TeamManager();
        $teams = $TeamManager->getAllTeams();
        $NationalityManager = new NationalityManager();
        $nationalities = $NationalityManager->getAllNaionality();
        return $this->render('staff/update-staff.html.php', [
            'staff' => $staff,
            'positions' => $positions,
            'teams' => $teams,
            'nationalities' => $nationalities
        ]);
    }
    
    public function deleteStaff($id): Response {
        $StaffManager = new StaffManager();
        $StaffManager->delete($id);
        header('Location: ' . RACINE_MAJ . 'staffs');
        return $this->render('staff/staffs.html.php');
    }
    
}
