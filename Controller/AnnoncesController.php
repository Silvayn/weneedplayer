<?php

namespace Controller;

use App\Controller;
use App\Response;
use Entity\Annonce;
use Entity\Categorie;
use Entity\Comment;
use Entity\Ligue;
use Entity\Skill;
use Entity\Utilisateur;
use EntityManager\AnnonceManager;
use EntityManager\CategorieManager;
use EntityManager\CommentManager;
use EntityManager\LigueManager;
use EntityManager\SkillManager;
use Swoole\MySQL\Exception;
use const RACINE;

class AnnoncesController extends Controller {
    
    /**
     * @paramb int $page
     * @return Response
     */
    public function annonces(int $page): Response {
        $AnnonceManager = new AnnonceManager();
        //PAGINATION
        $offset = Annonce::LIMIT * ($page - 1);
        $total = ceil($AnnonceManager->count() / Annonce::LIMIT);
        $annonces = $AnnonceManager->getAllAnnoncesWithPagination($offset, Annonce::LIMIT);
        $LigueManager = new LigueManager();
        $ligues = $LigueManager->getAllLigue();
        return $this->render('annonces/annonces.html.php', [
            'annonces' => $annonces,
            'ligues' => $ligues,
            'total' => $total,
            'page' => $page
                ]);
    }

    public function ajaxAnnonce(int $id) {
        $AnnonceManager = new AnnonceManager();
        $list = $AnnonceManager->getAnnonceByLigueIdWithAjax($id);
        if($list != []){
            $test = true;
        }else{
            $test = false;
            $list = 'Pas d\'actualités pour cette ligue pour le moment !';
        }
        return $this->renderJson([
            'list' => $list, 
            'test' => $test
            ]);
    }
    
    public function detailAnnonce(int $id): Response {
        $AnnonceManager = new AnnonceManager();
        $annonce = $AnnonceManager->getAnnonceById($id);
        $countAnnonces = $AnnonceManager->countByUserId($this->request->getSessionData('id'));
        $CommentManager = new CommentManager();
        $comments = $CommentManager->getCommentById($id);
        // COMMENTS
        if($this->request->isPost()){
            $comment = new Comment($this->request->getPost());
            $parent = $this->request->getPostData('parent');
            $content = htmlspecialchars($this->request->getPostData('content'));
            // USER_ID
            if(isset($_SESSION['auth']) && $_SESSION['auth'] === true){
                $user_id = new Utilisateur(['id' => $this->request->getSessionData('id')]);
                $comment->setUser($user_id);
            }else{
                $comment->addErrors('Problème d\'authentification !');
            }
            // ANNONCE_ID
            if($this->request->getPostData('annonce')){
                $annonce = new Annonce(['id' => $this->request->getPostData('annonce')]);
                $comment->setAnnonce($annonce);
            }
            // PARENT_ID
            if(isset($content) && !empty($content)){
                $depth = 0;
                $parent = isset($parent) ? $parent : 0;
                if($parent != 0 || $parent != '0'){
                $result = $CommentManager->getCommentByParentId($parent);
                $parent = $result;
                $depth = $comment->getDepth() + 1;
                }
            }
            $comment->setDepth($depth);
            if($comment->getDepth() > 1){
                $comment->addErrors('Il n\'est pas possible de répondre à plus d\'une fois à un commentaire !');
            }
            if($comment->getErrors() == []){
                $CommentManager = new CommentManager();
                $CommentManager->add($comment);
                header('Location: ' . RACINE . 'detail-annonce?id=' . $id );
            }else{
                //MESSAGE FLASH ERROR
                $this->request->addFlash('errors', implode('<br>', $comment->getErrors()));
                header('Location: ' . RACINE . 'detail-annonce?id=' . $id );
            }
        }
        return $this->render('annonces/detail-annonce.html.php', [
            'annonce' => $annonce,
            'comments' => $comments,
            'count' => $countAnnonces
                ]);
    }
    
    public function addAnnonce(): Response {
        $this->isSecure();
        if($this->request->isPost()){
            //var_dump($this->request->getPost());
            $annonce = new Annonce($this->request->getPost());
            // CATEGORY_ID
            if($this->request->getPostData('category')){
                $category = new Categorie(['id' => $this->request->getPostData('category')]);
                $annonce->setCategory($category);
            }else{
                $annonce->addErrors('Choisir une catégorie !');
            }
            // SKILL_ID
            if($this->request->getPostData('skill')){
                $skill = new Skill(['id' => $this->request->getPostData('skill')]);
                $annonce->setSkill($skill);
            }else{
                $annonce->addErrors('Choisir votre niveau de jeu !');
            }
            // LIGUE_ID
            if($this->request->getPostData('ligue')){
                $ligue = new Ligue(['id' => $this->request->getPostData('ligue')]);
                $annonce->setLigue($ligue);
            }else{
                $annonce->addErrors('Choisissez votre Ligue !');
            }
            // USER_ID
            if(isset($_SESSION['auth']) && $_SESSION['auth'] === true){
                $user_id = new Utilisateur(['id' => $this->request->getSessionData('id')]);
                $annonce->setUser($user_id);
            }else{
                $annonce->addErrors('Probème de connexion !');
            }
            if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'] && time() - $_SESSION['tokenTime'] <= 10 * 60){
                if($annonce->getErrors() == []){
                    $AnnonceManager = new AnnonceManager();
                    $AnnonceManager->add($annonce);
                    $this->request->addFlash('success', 'Annonce bien ajouté !');
                }else{
                    //MESSAGE FLASH ERROR
                    $this->request->addFlash('errors', implode('<br>', $annonce->getErrors()));
                }
            }else{
                //MESSAGE FLASH ERROR
                $this->request->addFlash('errors', 'Problème de sécurité !');
            }
        }
        
        $AnnonceManager = new AnnonceManager;
        $CategoryManager = new CategorieManager;
        $SkillManager = new SkillManager;
        $LigueManager = new LigueManager();
        $categories = $CategoryManager->getAllCategorie();
        $skills = $SkillManager->getAllSkill();
        $ligues = $LigueManager->getAllLigue();
        return $this->render('annonces/addAnnonce.html.php', [
            'categories' => $categories, 
            'skills' => $skills, 
            'ligues' => $ligues 
            ]);
    }
    
    public function editAnnonce($id, $user): Response{
        $this->isSecure();
        if($this->request->isPost()){
            $annonce = new Annonce($this->request->getPost());
            // CATEGORY_ID
            if($this->request->getPostData('category')){
                $category = new Categorie(['id' => $this->request->getPostData('category')]);
                $annonce->setCategory($category);
            }else{
                $annonce->addErrors('Choisir une catégorie !');
            }
            // SKILL_ID
            if($this->request->getPostData('skill')){
                $skill = new Skill(['id' => $this->request->getPostData('skill')]);
                $annonce->setSkill($skill);
            }else{
                $annonce->addErrors('Choisir votre niveau de jeu !');
            }
            // LIGUE_ID
            if($this->request->getPostData('ligue')){
                $ligue = new Ligue(['id' => $this->request->getPostData('ligue')]);
                $annonce->setLigue($ligue);
            }else{
                $annonce->addErrors('Choisissez votre Ligue !');
            }
            // USER_ID
            if(isset($_SESSION['auth']) && $_SESSION['auth'] === true){
                $user_id = new Utilisateur(['id' => $this->request->getSessionData('id')]);
                $annonce->setUser($user_id);
            }
            if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'] && time() - $_SESSION['tokenTime'] <= 10 * 60){
                if($annonce->getErrors() === []){
                    $AnnonceManager = new AnnonceManager();
                    $AnnonceManager->update($annonce, $id);
                    $this->request->addFlash('success', 'Annonce bien modifié !');
                }else{
                    //MESSAGE FLASH ERROR
                    $this->request->addFlash('errors', implode('<br>', $annonce->getErrors()));
                }
            }else{
                //MESSAGE FLASH ERROR
                $this->request->addFlash('errors', 'Problème de sécurite !');
            }
        }
        
        $AnnonceManager = new AnnonceManager();
        $CategoryManager = new CategorieManager;
        $SkillManager = new SkillManager;
        $LigueManager = new LigueManager();
        $annonce = $AnnonceManager->getAnnonceByIdAndUserId($id, $user);
        $categories = $CategoryManager->getAllCategorie();
        $skills = $SkillManager->getAllSkill();
        $ligues = $LigueManager->getAllLigue();
        return $this->render('annonces/edit-annonce.html.php', [
            'annonce' => $annonce,
            'categories' => $categories, 
            'skills' => $skills, 
            'ligues' => $ligues
            ]);
    }
    
    public function deleteAnnonce($id, $user): Response {
        if($this->request->getSessionData('auth') === true){
            $AnnonceManager = new AnnonceManager();
            $AnnonceManager->delete($id, $user);
            header('Location: ' . RACINE . 'mes-annonces');
        }
        return $this->render('annonces/mes-annonces.html.php', [
            
            ]);
    }

    
}
