<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['submit'])) {
	
	$title = $_POST['title'];
	$eventdate = $_POST['eventdate'];
	$eventtime = $_POST['eventtime'];
	$details = $_POST['details'];
	$eventowner = $_SESSION['username'];
	$user_id = $_SESSION['user_id'];
	
	$sql = "INSERT INTO	events (user_id, eventdate, eventtime, title, details, username, dateadded) VALUES ($user_id, $eventdate, $eventtime, $title, $details, $eventowner, now())";
	$result = mysqli_query($mysqli, $sql);
	
	if($result){
		echo "event added";		
	}else{
		echo "event not added";
			}
	
}

?>