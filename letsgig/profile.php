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
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Giggit temp profile page</title>
  <meta name="author" content="Giggit co.">
  <link rel="shortcut icon" href="">
  <link rel="icon" href="">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>
  
  <div id="topbar">
	<nav id="mainlinks">
		<ul class="clearfix">
			<li><a href="home.php">Home</a></li>
			<li><a href="near.php">Nearby Events</a></li>
			<li><a href="#">Bands</a></li>
			<li><a href="#">Venues</a></li>
		</ul>
	</nav>
  </div>
  
  <div id="w">
    <div id="content" class="clearfix">
	<?php if (empty($username)){
			
			echo "show an error here about not finding a user";
		
		
		}else{
		?>
        <?php if (login_check($mysqli) == true) { ?>
		<?php if ($username == $_SESSION['username']) { ?>
		<!--CURENTLY LOGGED IN USERS HOME PAGE-->
		<nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#events" class="sel">Events</a></li>
          <li><a href="#music">Music</a></li>
		  <li><a href="#bio">Bio</a></li>
		  <li><a href="#friends">Friends</a></li>
        </ul>
      </nav>
      
      <section id="events">
        <p>Upcoming Events Booked:</p>
<table>
<?php 
//Pull user info and define variables for later user
$info = user_profile($username, $mysqli);

if(count($info)){
	foreach ($info as $key => $value){
		$id = $value['id'];
		$name = $value['username'];
	}
}



	$myusers[] = $id;
	$posts = show_posts($myusers,5,$mysqli);
	
	if (count($posts)){
		echo "<th>Event Owner</th>\n";
		echo "<th>Event Title</th>\n";	
		echo "<th>Event Date</th>\n";
		echo "<th>Event Time</th>\n";
		echo "<th>Details</th>\n";
		echo "</tr>\n";
		
		foreach ($posts as $key => $list){
			echo "<td>".$list['username']."\n";
			echo "<td>".$list['title'] ."<br/>\n";
			echo "<td>".$list['eventdate'] ."<br/>\n";
			echo "<td>".$list['eventtime'] ."<br/>\n";
			echo "<td>".$list['details'] ."<br/>\n";
			echo "</tr>\n";
			}
?>
</table>
<?php }else{ ?>
No Events To Show<br></br>

<?php } ?>
      </section>		
		<!--CURENTLY LOGGED IN USERS HOME PAGE ENDS-->
		<?php }else{ ?>
      <!--<div id="userphoto"></div>-->
      <h1><?php echo $username; ?></h1>

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#events" class="sel">Events</a></li>
          <li><a href="#music">Music</a></li>
		  <li><a href="#bio">Bio</a></li>
		  <li><a href="#friends">Friends</a></li>
        </ul>
      </nav>
      
      <section id="events">
        <p>Upcoming Events Booked:</p>
		
<table>
<?php 
//Pull user info and define variables for later user
$info = user_profile($username, $mysqli);

if(count($info)){
	foreach ($info as $key => $value){
		$id = $value['id'];
		$name = $value['username'];
	}
}



	$myusers[] = $id;
	$posts = show_posts($myusers,5,$mysqli);
	
	if (count($posts)){
		echo "<th>Event Owner</th>\n";
		echo "<th>Event Title</th>\n";	
		echo "<th>Event Date</th>\n";
		echo "<th>Event Time</th>\n";
		echo "<th>Details</th>\n";
		echo "</tr>\n";
		
		foreach ($posts as $key => $list){
			echo "<td>".$list['username']."\n";
			echo "<td>".$list['title'] ."<br/>\n";
			echo "<td>".$list['eventdate'] ."<br/>\n";
			echo "<td>".$list['eventtime'] ."<br/>\n";
			echo "<td>".$list['details'] ."<br/>\n";
			echo "</tr>\n";
			}
?>
</table>
<?php }else{ ?>
No Events To Show<br></br>

<?php } ?>
      </section>
	  
	  <section id="bio" class="hidden">
        NO BIO CURRENTLY
      </section>
	  
      <section id="music" class="hidden">
        <p>User Soundcloud:</p>
        
        <p class="setting"><span>E-mail Address <img src="images/edit.png" alt="*Edit*"></span> lolno@gmail.com</p>
        
        <p class="setting"><span>Language <img src="images/edit.png" alt="*Edit*"></span> English(US)</p>
        
        <p class="setting"><span>Profile Status <img src="images/edit.png" alt="*Edit*"></span> Public</p>
        
        <p class="setting"><span>Update Frequency <img src="images/edit.png" alt="*Edit*"></span> Weekly</p>
        
        <p class="setting"><span>Connected Accounts <img src="images/edit.png" alt="*Edit*"></span> None</p>
      </section>
	  
      <section id="friends" class="hidden">
        <p>Friends list:</p>
        
        <ul id="friendslist" class="clearfix">
          <li><a href="#"><img src="images/avatar.png" width="22" height="22"> Username</a></li>
          <li><a href="#"><img src="images/avatar.png" width="22" height="22"> SomeGuy123</a></li>
          <li><a href="#"><img src="images/avatar.png" width="22" height="22"> PurpleGiraffe</a></li>
        </ul>
      </section>
      
    </div><!-- @end #content -->
  </div><!-- @end #w -->
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
<?php } ?>
<?php }else{ ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php } ?>
		<?php } ?>
</body>
</html>