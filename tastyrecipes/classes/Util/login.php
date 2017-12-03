<?php
session_start();

include '../Controller/controller.php';
use ContrHandler\Controller as logContr;

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$contr = new logContr();
$result = $contr->getUser($uid, $pwd);

if($result = false){
	echo "Your username or password is incorrect";
}

header("Location: ../../resources/views/index.php");

?>