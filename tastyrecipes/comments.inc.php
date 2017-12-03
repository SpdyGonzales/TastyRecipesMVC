<?php
include './dbhmes.inc.php';
namespace ComHandlr;

class commentsHandler{

	function setComments($conn, $recipesite, $uid, $date, $message){

		$sql = "INSERT INTO commentsnew (uid, date, message, site) 
		VALUES ('$uid', '$date', '$message','$recipesite')";
		$result = mysqli_query($conn,$sql);
	}

	function getComments($conn, $recipesite){
		$sql = "SELECT * FROM commentsnew";
		$result = $conn->query($sql);
		return $result;
	}

	function deleteComment($conn, $cId) {
		$sql = "DELETE FROM commentsnew WHERE cid='$cId'";
		$delResult = $conn->query($sql);
		return $delResult;
	}
}