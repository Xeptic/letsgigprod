<?php
include_once 'functions.php';
include_once 'follow.php';

sec_session_start();

$me = $_SESSION['username'];
$theirid = $_GET['id'];
$myid = $_SESSION['user_id'];
$them = $_GET['name'];
$do = $_GET['do'];

switch ($do){
	
	case "unfollow":
		unfollow_user($theirid, $me, $them, $mysqli);
		$msg = "You have unfollowed " . $them;
	break;
	
	case "follow":
		follow_user($theirid, $myid, $me, $them, $mysqli);
		$msg = "You have followed " . $them;
	break;
	
	default:
		$msg = "";

}

$_SESSION['message'] = $msg;

$backURL = empty($_SESSION['backURL']) ? '/' : $_SESSION['backURL'];
unset($_SESSION['backURL']);
header('Location: ' . $backURL);

?>