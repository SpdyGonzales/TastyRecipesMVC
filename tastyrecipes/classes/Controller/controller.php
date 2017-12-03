<?php
namespace ContrHandler;
require($_SERVER['DOCUMENT_ROOT'].'/tastyrecipes/classes/Integration/userHandler.php');
require($_SERVER['DOCUMENT_ROOT'].'/tastyrecipes/classes/Integration/comments.inc.php');
use UserHandler\userHandler as logUser;
use ComHandlr\commentsHandler as logCom;

class Controller {

	private $userContr;
	private $comContr;

	public function __construct()
    {
        $this->userContr = new logUser();
        $this->comContr = new logCom();

    }

	public function storeUser(string $first, string $last, string $uid, string $hashedPwd){
		$this->userContr->storeUser($first, $last, $uid, $hashedPwd);
	}

	public function getUser(string $uid, string $pwd){
		$loginStatus = $this->userContr->fetchUser($uid, $pwd);
		return $loginStatus;
	}

	public function getComments(string $recipesite){
		$result = $this->comContr->getComments($recipesite);
		return $result;
	}

	public function setComments($recipesite, $uid, $date, $message){
		$this->comContr->setComments($recipesite, $uid, $date, $message);
	}

	public function delComments($cId){
		$delResult = $this->comContr->deleteComment($cId);
		return $delResult;
	}

}