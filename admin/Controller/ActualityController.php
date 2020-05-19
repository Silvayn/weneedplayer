<?php

namespace Controller;

use App\Controller;
use App\Response;
use finfo;

class ActualityController extends Controller {

	public function actualities(int $page): Response {
		$ActualityManager = new \EntityManager\ActualityManager();
		//PAGINATION
		$offset = \Entity\Actuality::LIMIT * ($page - 1);
		// COUNT NUMBER PAGE ALL YOU NEED
		$total = ceil($ActualityManager->count() / \Entity\Actuality::LIMIT);
		$actualities = $ActualityManager->getAllActualitiesWithPagination($offset, \Entity\Actuality::LIMIT);
		return $this->render('actuality/actualities.html.php', [
			'actualities' => $actualities,
			'total' => $total,
			'page' => $page
		]);
	}
	
	public function addActuality(): Response {
		if($this->request->isPost()){
			$photo = $this->request->getFilesData('photo');
			$actuality = new \Entity\Actuality($this->request->getPost());
			// LIGUE_ID
			if($this->request->getPostData('ligue')){
				$ligue = new \Entity\Ligue(['id' => $this->request->getPostData('ligue')]);
				$actuality->setLigue($ligue);
			}else{
				$actuality->addErrors('Choisir une Ligue !');
			}
			if($photo['error'] == 0 || $photo['error'] == 4){
				if($photo['error'] == 0){
					$finfo = new finfo(FILEINFO_MIME_TYPE);
					$formats = ['image/png', 'image/gif', 'image/jpeg'];
					//$legalSize = "10000000"; // 10000000 Octets = 10 MO
					//$actualSize = $photo['size'];
					if(!in_array($finfo->file($photo['tmp_name']), $formats)){
						$actuality->addErrors('Format Image !');
					}
				}
			}else{
				if($photo['error'] == UPLOAD_ERR_FORM_SIZE || $photo['error'] == UPLOAD_ERR_INI_SIZE){
					$actuality->addErrors('Taille de l\'image trop grande !');
				}else{
					$actuality->addErrors('Erreur image !');
				}
			}
			if($actuality->getErrors() == []){
				if($photo['error'] == 0){
					$filename = md5(uniqid(rand(), true)) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
					move_uploaded_file($photo['tmp_name'], __DIR__ . '/../../public/images/uploads/actualities/' . $filename);
					$actuality->setPhoto($filename);
				}
				$ActualityManager = new \EntityManager\ActualityManager();
				$ActualityManager->add($actuality);
				$this->request->addFlash('success', 'Actualité ajoutée !');
				header('Location: '. RACINE_MAJ.'actualities');
				exit;
			}else{
				//MESSAGE FLASH ERRORS
				$this->request->addFlash('errors', implode('<br>', $actuality->getErrors()));
			}
		}

		$LigueManager = new \EntityManager\LigueManager();
		$ligues = $LigueManager->getAllLigues();
		return $this->render('actuality/add-actuality.html.php', [
			'ligues' => $ligues
		]);
	}

	public function updateActuality($id): Response {
		$ActualityManager = new \EntityManager\ActualityManager();
		$actualityOriginal = $ActualityManager->getActualityById($id);

		if($this->request->isPost()){
			$actuality = new \Entity\Actuality($this->request->getPost());
			if($this->request->getPostData('delete-photo') != null){
				$chemin = __DIR__.'/../../public/images/uploads/actualities/' . $actualityOriginal->getPhoto();
				unlink($chemin);
			} 
			$photo = $this->request->getFilesData('photo');
			if( $photo['error'] != 4){
				if($photo['error'] == 0){
					$finfo = new finfo(FILEINFO_MIME_TYPE);
					$formats = ['image/png', 'image/gif', 'image/jpeg'];
					if(!in_array($finfo->file($photo['tmp_name']), $formats)){
						$actuality->addErrors('Format Image !');
					}
				}else{
					if($photo['error'] == UPLOAD_ERR_FORM_SIZE || $photo['error'] == UPLOAD_ERR_INI_SIZE){
						$actuality->addErrors('Taille de l\'image trop grande !');
					}else{
						$actuality->addErrors('Erreur image !');
					}
				}
			}
			// LIGUE_ID
			if($this->request->getPostData('ligue')){
				$ligue = new \Entity\Ligue(['id' => $this->request->getPostData('ligue')]);
				$actuality->setLigue($ligue);
			}else{
				$actuality->addErrors('Choir une Ligue !');
			}
			if($actuality->getErrors() == []){
				if($photo['error'] == 0){
					$filename = md5(uniqid(rand(), true)) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
					move_uploaded_file($photo['tmp_name'], __DIR__ . '/../../public/images/uploads/actualities/' . $filename);
					$chemin =__DIR__ . '/../../public/images/uploads/actualities/'.$actualityOriginal->getPhoto();
					if (is_file( $chemin) && $actualityOriginal->getPhoto() !='ffp.jpg'){
						unlink($chemin);
					}
					$actuality->setPhoto($filename);
				}
				$ActualityManager = new \EntityManager\ActualityManager();
				$update = $actuality->getPhoto()?true:false;
				$ActualityManager->update($actuality, $id, $update);
				$this->request->addFlash('success', 'Actualité modifié !');
				header('Location: '. RACINE_MAJ.'actualities');
				exit;
			}else{
				
				$this->request->addFlash('errors', implode('<br>', $actuality->getErrors()));
			}
		}


		$LigueManager = new \EntityManager\LigueManager();
		$ligues = $LigueManager->getAllLigues();
		return $this->render('actuality/update-actuality.html.php', [
			'actuality' => $actualityOriginal,
			'ligues' => $ligues
		]);
	}

	public function deleteActuality($id): Response {
		$ActualityManager = new \EntityManager\ActualityManager();
		$actuality = $ActualityManager->getActualityById($id);
		$chemin =__DIR__ . '/../../public/images/uploads/actualities/' . $actuality->getPhoto();
		if(is_file($chemin) && $actualityOriginal->getPhoto() != 'ffp.jpg'){
			unlink($chemin);
		}
		$ActualityManager->delete($id);
		header('Location: ' . RACINE_MAJ . 'actualities');
		return $this->render('actuality/actualities.html.php');
	}

}
