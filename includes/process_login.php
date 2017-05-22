<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['login'])) {
	//$error = $_GET['error'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	//$url = urlencode('index.php?error=' . $error);
 
    if (login($username, $password, $mysqli) == true) {
        // Login success 
        //header('Location: ../home.php');
		echo "ok";
    } else {
		//$error = $_GET['error'];
        // Login failed 
		//$error = "Incorrect username or password";
		//$_SESSION['error'] = $error;
		//header("Location: ../index.php");
        //header($url);
		echo "Incorrect username or password!";
    }
}
?>