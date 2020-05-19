<?php

namespace Controller;

use App\Controller;
use App\Response;
use Entity\Ligue;
use Entity\Utilisateur;
use EntityManager\AnnonceManager;
use EntityManager\LigueManager;
use EntityManager\UserManager;
use const RACINE;
use finfo;

class IndexController extends Controller {
    
    public function index(): Response {
        $AnnonceManager = new AnnonceManager();
        $annonces = $AnnonceManager->getAnnoncesLimit4();
        return $this->render('index/index.html.php', ['annonces' => $annonces]);
    }
    
    public function connexion() {
        if($this->request->getPost()){            
            $login = $this->request->getPostData('login');
            $pwd = $this->request->getPostData('pwd');
            if($login == '' || $pwd == ''){
                $this->request->addFlash('errors', 'Votre identifiant ou votre mot de passe est incorrect !');
            }else{
                $user = (new UserManager())->getUser($login);
                if(isset($user)){
                    if(password_verify($pwd, $user['pwd'])){
                        $this->request->setSessionData('auth', true);
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['nom'] = $user['nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        $_SESSION['login'] = $login;
                        // ENCRYPTION OF THE TOKEN
                        $token = sha1(uniqid());
                        // TIME TIME OF THE TOKEN
                        $tokenTime = time();
                        $_SESSION['token'] = $token;
                        $_SESSION['tokenTime'] = $tokenTime;
                        header('Location: ' . RACINE);
                        exit;
                    }else{
                       $this->request->addFlash('errors', 'Votre identifiant ou votre mot de passe est incorrect.');
                    }
                }else{
                    $this->request->addFlash('errors', 'Votre identifiant ou votre mot de passe est incorrect.');
                }
            }
        }
        return $this->render('index/connexion.html.php');
    }
    
    public function inscription() {
        if($this->request->isPost()){
            $user = new Utilisateur($this->request->getPost());
            $UserManager = new UserManager();
            $login = htmlentities($this->request->getPostData('login'));
            $pwd = $this->request->getPostData('pwd');
            $pwdCheck = $this->request->getPostData('pwdCheck');
            $LoginCheck = $UserManager->CheckLogin($login);
            if($LoginCheck === 1){
                $user->addErrors('Login déjà utilisé !');
            }
            if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$#', $pwd)){
                $user->addErrors('Le mot de passe doit contenir au moins 6 caractères, une majuscule, un chiffre et des caratères spéciaux !');
            }
            if(isset($pwdCheck) && $pwdCheck !== '' && $pwd === $pwdCheck){
                if($user->getErrors() == []){
                    $UserManager->add($user);
                    if(isset($user)){
                        $this->request->setSessionData('auth', true);
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['nom'] = $user->getNom();
                        $_SESSION['prenom'] = $user->getPrenom();
                        $_SESSION['login'] = $user->getLogin();
                        $token = sha1(uniqid()); // CRYPTAGE DU JETON
                        $tokenTime = time(); // TIME TEMPS DU JETON
                        $_SESSION['token'] = $token;
                        $_SESSION['tokenTime'] = $tokenTime;
                    }
                    header('Location:' . RACINE . 'profil');
                    exit;
                }else{
                    //MESSAGE FLASH ERROR
                    $this->request->addFlash('errors', implode('<br>', $user->getErrors()));
                }
            }else{
                //MESSAGE FLASH ERROR
                $this->request->addFlash('errors', 'Les 2 mots de passes ne sont pas identiques !');
            }
        }
        return $this->render('index/inscription.html.php');
    }
    
    public function ajaxLogin() {
        $login = htmlentities($_POST['login']);
        $UserManager = new UserManager();
        $check = $UserManager->CheckLoginWithAjax($login);
        return $this->renderJson([
            'check' => $check
            ]);
    }
    
    public function edit($id): Response{
        $this->isSecure();
        $UserManager = new UserManager();
        $userEditOriginal = $UserManager->getUserById($id);
        if($this->request->isPost()){
            $userUpdate = new Utilisateur($this->request->getPost());
            if($this->request->getPostData('delete-photo') != null){
                $chemin = __DIR__.'/../public/images/uploads/users/' . $userEditOriginal->getPhoto();
                unlink($chemin);
            }
            $photo = $this->request->getFilesData('photo');
            if( $photo['error'] != 4){
                if($photo['error'] == 0){
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $formats = ['image/png', 'image/gif', 'image/jpeg'];
                    if(!in_array($finfo->file($photo['tmp_name']), $formats)){
                        $userUpdate->addErrors('Format Image !');
                    }
                }else{
                    if($photo['error'] == UPLOAD_ERR_FORM_SIZE || $photo['error'] == UPLOAD_ERR_INI_SIZE){
                        $userUpdate->addErrors('Taille de l\'image trop grande !');
                    }else{
                        $userUpdate->addErrors('Erreur image !');
                    }
                }
            }
            // LIGUE_ID
            if($this->request->getPostData('ligue')){
                $ligue = new Ligue(['id' => $this->request->getPostData('ligue')]);
                $userUpdate->setLigue($ligue);
            }else{
                $userUpdate->addErrors('Choisissez votre Ligue !');
            }
            // USER_ID
            if(isset($_SESSION['auth']) && $_SESSION['auth'] === true){
                $user_id = new Utilisateur(['id' => $this->request->getSessionData('id')]);
                $userUpdate->setId($user_id);
            }
            if($userUpdate->getErrors() === []){
                if($photo['error'] == 0){
                    $filename = md5(uniqid(rand(), true)) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($photo['tmp_name'], __DIR__ . '/../public/images/uploads/users/' . $filename);
                    $chemin =__DIR__ . '/../public/images/uploads/users/' . $userEditOriginal->getPhoto();
                    if (is_file($chemin) && $userEditOriginal->getPhoto() != 'user-icon.png'){
                        unlink($chemin);
                    }
                    $userUpdate->setPhoto($filename);
                }
                $userManager = new UserManager();
                $update = $userUpdate->getPhoto()?true:false;
                $userManager->update($userUpdate, $update);
                $this->request->addFlash('success', 'Profil bien modifié !');
                header('Location: '. RACINE . 'profil');
                exit;
            }else{
                //MESSAGE FLASH ERROR
                $this->request->addFlash('errors', implode('<br>', $userUpdate->getErrors()));
            }
        }
        
        $LigueManager = new LigueManager();
        $ligues = $LigueManager->getAllLigue();
        return $this->render('index/profil.html.php', [
            'userEdit' => $userEditOriginal,
            'ligues' => $ligues,
            ]);
    }
    
    public function myAdds($id){
        $AnnonceManager = new AnnonceManager();
        $annonces = $AnnonceManager->getAnnonceByUserId($id);
        return $this->render('index/mes-annonces.html.php', [
            'annonces' => $annonces
            ]);
    }
    
    public function notFound(){
        
        return $this->render('index/404.html.php', [
            
            ]);
    }

}
