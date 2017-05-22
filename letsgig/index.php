<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (isset($_POST['submit'])) {
	//$error = $_GET['error'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	//$url = urlencode('index.php?error=' . $error);
 
    if (login($username, $password, $mysqli) == true) {
        // Login success 
        header('Location: home.php');
    } else {
		//$error = $_GET['error'];
        // Login failed 
		$error = "Incorrect username or password";
		$_SESSION['error'] = $error;
		header("Location: index.php");
        //header($url);
    }
}

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
<?php
	if (isset($_SESSION['error'])){
		echo "<b>". $_SESSION['error']."</b>";
		//unset($_SESSION['error']);
}
?> 
       
 
<?php if (login_check($mysqli) == true) : ?>
                        <p>
						Currently logged <?php echo $logged . ' as ' . htmlentities($_SESSION['username']); ?>
						</p>
 
            <p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>

<?php else : ?>   

		<form action="" method="post">                      
            Username: <input type="text" name="username" id="username"/>
            Password: <input type="password" name="password" id="password"/>
			<button type="submit" name="submit">Login</button>
        </form>
		
		
		<p>Currently logged <?php echo $logged; show_error($mysqli);?></p> 
        <p>If you don't have a login, please <a href='register.php'>register</a></p>
		<?php endif; ?>
    </body>
</html>