<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['submit'])) {
	
    $username = $_POST['username'];
    $password = $_POST['password'];
	//$url = urlencode('index.php?error=' . $error);
 
    if (login($username, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../home.php');
    } else {
		$error = $_GET['error'];
        // Login failed 
		header("Location: index.php?error=$error");
        //header($url);
    }
}
?>