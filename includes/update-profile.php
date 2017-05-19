<?php
require 'db_connect.php';
require 'functions.php';

sec_session_start();

if(isset($_POST['submit'])){
	
	$username = $_SESSION['username'];
	$id = $_SESSION['user_id'];
	//$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    //$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	$bandname = filter_input(INPUT_POST, 'bandname', FILTER_SANITIZE_STRING);
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
	$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
	$genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
	$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
	//$password=$_POST['password'];
	$bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
	$genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
	$website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_STRING);
	$soundcloud = filter_input(INPUT_POST, 'soundcloud', FILTER_SANITIZE_STRING);
	$twitter = filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_STRING);
	$youtube = filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_STRING);
	$mixcloud = filter_input(INPUT_POST, 'mixcloud', FILTER_SANITIZE_STRING);
	$facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE bands SET 
			firstname = '$firstname', 
			lastname = '$lastname', 
			bandname = '$bandname', 
			email = '$email', 
			bio = '$bio', 
			genre = '$genre', 
			location = '$location', 
			website = '$website', 
			soundcloud = '$soundcloud',
			facebook = '$facebook',
			twitter = '$twitter', 
			youtube = '$youtube', 
			mixcloud = '$mixcloud' 
			WHERE id = '$id'";
			
	mysqli_multi_query($mysqli,$sql);
	
	//show_error($mysqli);
	
            header("location:../profile.php?username=$username");
}
?>