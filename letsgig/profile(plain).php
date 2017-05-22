<?php
include 'includes/db_connect.php';
include 'includes/follow.php';
include 'includes/profiles.php';
include 'includes/showposts.php';
include 'includes/functions.php';

sec_session_start();

if(empty($_SESSION['username'])) {
   header("Location: index.php");
}else{
	$username = mysqli_real_escape_string($mysqli,$_REQUEST['username']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $username;?>'s Profile</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
		<?php if (empty($username)){
			
			echo "show an error here about not finding a user";
		
		
		}else{
		?>
        <?php if (login_check($mysqli) == true) { ?>
		<?php if ($username == $_SESSION['username']) { ?>
		This is your profile, please wait while this is worked on!
		<?php }else{ ?>
<?php
$info = user_profile($username, $mysqli);

if(count($info)){
	foreach ($info as $key => $value){
		echo "<h2> " . $value['bandname'] . "</h2>";
		echo "Name " . $value['firstname'] . $value['lastname'] . "<br></br>";
		echo "Genre: " . $value['genre'] . "<br></br>";
		echo "Bio: " . $value['bio'] . "<br></br>";
		echo "Location: " . $value['location'] . "<br></br>";
		echo "Website: " . $value['website'] . "<br></br>";
		echo "Facebook: " . $value['facebook'] . "<br></br>";
		echo "Soundcloud: " . $value['soundcloud'] . "<br></br>";
		echo "Twitter: " . $value['twitter'] . "<br></br>";
		echo "Youtube: " . $value['youtube'] . "<br></br>";
		echo "Mixcloud: " . $value['mixcloud'] . "<br></br>";
		$id = $value['id'];
		$name = $value['username'];
	}
}
?>
<h2>EVENTS</h2>
<?php
$myusers[] = $id;
$posts = show_posts($myusers,5,$mysqli);
if (count($posts)){
	foreach ($posts as $key => $list){
		echo $list['title'];
		echo "<br></br>";
	}
}else{
?>
No Events To Show<br></br>
<?php
}
	if (is_following($_SESSION['user_id'], $id, $mysqli)){
				echo "<a href='includes/action.php?name=$name&id=$id&do=unfollow'>unfollow</a>";
		}else{
				echo "<a href='includes/action.php?name=$name&id=$id&do=follow'>follow</a>";
		}
	//show_error($mysqli);
?>

<?php	

//$value = $row['username'];
//$key = $row['id'];
//$current_user = $_SESSION['user_id'];


$_SESSION['backURL'] = $_SERVER['REQUEST_URI'];

		
		if (isset($_SESSION['same'])){
		echo "<b>". $_SESSION['same']."</b>";
		unset($_SESSION['same']);
}
?>
		<?php } ?>
			<p></p>			
			<p><a href="includes/logout.php">Log out</a><br></br>
				<a href="home.php">Home</a>
			</p>
        <?php }else{ ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php } ?>
		<?php } ?>
    </body>
</html>