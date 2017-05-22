<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/follow.php';
include_once 'includes/showposts.php';
//include_once 'search.php';

sec_session_start();

if(empty($_SESSION['username'])) {
   header("Location: index.php");
}

$current_user = $_SESSION['username'];
$users = show_users($mysqli);
$following = following($_SESSION['user_id'], $mysqli);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Home Page</title>
    </head>
    <body>




        <?php if (login_check($mysqli) == true) : ?>
            <p><h1>Welcome <a href="profile.php?username=<?php echo $current_user;?>"><?php echo $current_user;?></a>!</h1></p>
			<a href="edit-profile.php">Edit Your Profile</a>
			<h2>LIST OF BANDS</h2>
<?php
    //$current_user = mysqli_real_escape_string($mysqli,$_SESSION['username']);
    //$sql = "SELECT * FROM bands WHERE username != '$current_user' order by id desc";
    //$result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    //while($rws = mysqli_fetch_array($result)):         
?>
			<!--<p><span>Band Name: <a href="profile.php?username=<?php //echo $rws['username'];?>"><?php //echo $rws['bandname'];?></a></span></p>-->
             <?php //endwhile; ?>
<?php
if (count($users)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
$_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
foreach ($users as $key => $value){
	echo "<tr valign='top'>\n";
	echo "<td>".$key ."</td>\n";
	echo "<td> <a href='profile.php?username=$value'> $value</a>\n";
	if (in_array($key, $following)){
		echo " <small>
		<a href='includes/action.php?name=$value&id=$key&do=unfollow'>unfollow</a>
		</small>";
	}else{
		echo " <small>
		<a href='includes/action.php?name=$value&id=$key&do=follow'>follow</a>
		</small>";
	}
	echo "</td>\n";
	echo "</tr>\n";
}
?>
</table>
<?php
}
?>
			
			<p><a href="includes/logout.php">Log out</a>.</p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
		
<?php
	if (isset($_SESSION['message'])){
		echo "<b>". $_SESSION['message']."</b>";
		unset($_SESSION['message']);
}
?>

<h2>Users you're following</h2>

<?php
$fusers = show_followed($_SESSION['user_id'], $mysqli);

if (count($fusers)){
?>
<ul>
<?php
foreach ($fusers as $key => $value){
	echo "<li>".$value."</li>\n";
}
?>
</ul>
<?php
}else{
?>
<p><b>You're not following anyone yet!</b></p>
<?php
}
?>
<?php
$fusers = show_followed($_SESSION['user_id'], $mysqli);
//echo $_SESSION['error'];
if (count($fusers)){
	$myusers = array_keys($fusers);
}else{
	$myusers = array();
}
$myusers[] = $_SESSION['user_id'];

$posts = show_posts($myusers,5,$mysqli);
?>
<a href="newevent.php">Create New Event</a>
<?php
if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
    echo "<th>Event Owner</th>\n";
    echo "<th>Event Title</th>\n";	
    echo "<th>Event Date</th>\n";
	echo "<th>Event Time</th>\n";
	echo "<th>Details</th>\n";
	echo "</tr>\n";
foreach ($posts as $key => $list){
	//echo "<td>".$list['user_id'] ."</td>\n";
	echo "<td><a href='profile.php?username=".$list['username']."'>".$list['username']."</a>\n";
	echo "<td>".$list['title'] ."<br/>\n";
	echo "<td>".$list['eventdate'] ."<br/>\n";
	echo "<td>".$list['eventtime'] ."<br/>\n";
	echo "<td>".$list['details'] ."<br/>\n";
	//echo "<small>".$list['stamp'] ."</small></td>\n";
	echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>No new events!</b></p>
<?php
}
?>


    </body>
</html>