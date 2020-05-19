<?php

namespace EntityManager;

use App\EntityManager;
use DateTime;
use Entity\Comment;
use PDO;

class CommentManager extends EntityManager {
    
    public function add(Comment $comment) {
        $req = 'INSERT INTO comment VALUES(Null, now(), :content, :annonce_id, :user_id, :parent_id, :depth)';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->execute([
            ':content' => $comment->getContent(),
            ':annonce_id' => $comment->getAnnonce()->getId(),
            ':user_id' => $comment->getUser()->getId(),
            ':parent_id' => $comment->getParent(),
            ':depth' => $comment->getDepth()
        ]);
    }
    
    public function getAllComments(): ?array {
        $req = 'SELECT comment.id, datec AS date_comment, content, user.login AS user, annonce_id AS annonce, parent_id AS parent FROM comment JOIN user ON comment.user_id = user.id ORDER BY date DESC';
        $PDOSt = $this->pdo->query($req);
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::class);
        $comments = $PDOSt->fetchAll();
        foreach ($comments as $value) {
            $date = new DateTime($value->date_comment);
            $value->setDate($date);
            unset($value->date_comment);
        }
        return $comments;
    }
    
    public function getCommentById(int $id) {
        $req = 'SELECT comment.id, depth, datec AS date_comment, content, user.login AS user, annonce_id AS annonce, parent_id AS parent FROM comment JOIN user ON comment.user_id = user.id JOIN annonce ON annonce_id = annonce.id WHERE annonce.id = ? ORDER BY comment.id ASC';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id, PDO::PARAM_INT);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::class);
        $comments = $PDOSt->fetchAll();
        foreach ($comments as $value) {
            $date = new DateTime($value->date_comment);
            $value->setDatec($date);
            unset($value->date_comment);
        }
        $comments_by_id = [];
        foreach ($comments as $comment){
            $comments_by_id[$comment->getId()] = $comment;
        }
        foreach ($comments as $k => $comment){
            if($comment->getParent() != 0){
                $comments_by_id[$comment->getParent()]->children[] = $comment;
                unset($comments[$k]);
            }
        }
        return $comments;
    }
    
    public function getCommentByParentId($id) {
        $req = 'SELECT comment.id, depth FROM comment WHERE comment.id = ?';
        $PDOSt = $this->pdo->prepare($req);
        $PDOSt->bindValue(1, $id);
        $PDOSt->execute();
        $PDOSt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::class);
        $comments = $PDOSt->fetch();
        return $comments;
    }
    
}
