<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

$current_user = $_SESSION['username'];

if (isset($_POST['submit'])) {
	
	$title = $_POST['title'];
	$eventdate = $_POST['eventdate'];
	$eventtime = $_POST['eventtime'];
	$details = $_POST['details'];
	$eventowner = $_SESSION['username'];
	$user_id = $_SESSION['user_id'];
	
	$sql = "INSERT INTO	events (user_id, eventdate, eventtime, title, details, username, dateadded) 
			VALUES ('$user_id', STR_TO_DATE('$eventdate', '%m/%d/%Y'), '$eventtime', '$title', '$details', '$eventowner', now())";
	
	if($mysqli->query($sql) === TRUE){
		echo "event added";		
	}else{
		echo "event not added";
			}
}

?>
<!DOCTYPE HTML> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <link type="text/css" href="css/bootstrap.min.css" />
        <link type="text/css" href="css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet/less" type="text/css" href="css/timepicker.less" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
<script>
  $(document).ready(function() {
					$("#datepicker").datepicker();
					
					$('#timepicker').timepicker({
						template: 'dropdown',
						showInputs: true,
						minuteStep: 5,
						showMeridian: false,
						defaultTime: '12:00',
            });
  });
</script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php echo $current_user; ?>
<h2>Create New Event</h2>
<form method="post" action=""> 
   Event Title: <input type="text" name="title" value="">
   
   <br><br>
   Date: <input id="datepicker" name="eventdate" value="">
   
   <br><br>
   <div class="input-group bootstrap-timepicker timepicker">
           Time:  <input id="timepicker" type="text" class="form-control input-small">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
        </div>   
   
   <br><br>
   Details: <textarea name="details" rows="5" cols="40"></textarea>
   <br><br>
   <input type="submit" name="submit" value="Create Event"> 
</form>

</body>
</html>