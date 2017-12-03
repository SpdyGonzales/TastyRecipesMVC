<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../Controller/controller.php';
use ContrHandler\Controller as logContr;

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

if($first && $last && $uid && $pwd && ctype_alnum($first) && ctype_alnum($last) && ctype_alnum($uid) && ctype_alnum($pwd)) {

$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
$contr = new logContr();
$contr->storeUser($first, $last, $uid, $hashedPwd);
header("Location: ../../resources/views/index.php");

} else {
	echo "please provide information. make sure that you use only letters and digits without blank spaces";
}