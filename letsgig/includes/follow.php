<?php
include 'db_connect.php';
	
function check_count($first, $second, $mysqli){
	$sql = "SELECT count(*) FROM follow 
			WHERE following='$second' AND username='$first'";
	$result = mysqli_query($mysqli, $sql);

	$row = mysqli_fetch_row($result);
	return $row[0];

}

function show_users($mysqli){
	$users = array();
	$username = $_SESSION['username'];
	$sql = "SELECT id, username, bandname FROM bands WHERE username != '$username' order by bandname";
	$result = mysqli_query($mysqli, $sql);

	while ($data = mysqli_fetch_object($result)){
		$users[$data->id] = $data->username;
	}
	return $users;
}

function show_followed($user_id=0, $mysqli){
	if ($user_id > 0){
		$follow = array();
		$fsql = "select user_id from follow
				where follower_id='$user_id'";
		$fresult = mysqli_query($mysqli, $fsql);

		while($f = mysqli_fetch_object($fresult)){
			array_push($follow, $f->user_id);
		}

		if (count($follow)){
			$id_string = implode(',', $follow);
			$extra =  " and id in ($id_string)";

		}else{
			return array();
		}

	}
	
	$users = array();
	$username = $_SESSION['username'];
	$sql = "SELECT id, username, bandname FROM bands WHERE username != '$username' $extra order by bandname";
	$result = mysqli_query($mysqli, $sql);

	while ($data = mysqli_fetch_object($result)){
		$users[$data->id] = $data->username;
	}
	return $users;
}

function following($userid, $mysqli){
	$users = array();
	$sql = "SELECT DISTINCT user_id FROM follow
			WHERE follower_id = '$userid'";
	$result = mysqli_query($mysqli, $sql);

	while($data = mysqli_fetch_object($result)){
		array_push($users, $data->user_id);

	}

	return $users;

}

function is_following($me, $them, $mysqli){
	$sql = "SELECT DISTINCT follower_id AND user_id FROM follow 
	       WHERE follower_id = '$me' AND user_id = '$them'";
		   
	$result = mysqli_query($mysqli, $sql);
	
	if(mysqli_num_rows($result)	== 0){
		return false;
	}else{
		return true;
	}
}

function follow_user($theirid, $myid, $me, $them, $mysqli){
	$count = check_count($me, $them, $mysqli);

	if($them == $me){
		$_SESSION['same'] = "You can't follow yourself!";
		return false;
	}else{
	if ($count == 0){
		$sql = "INSERT INTO follow (user_id, follower_id, following, username) 
				VALUES ('$theirid', '$myid', '$them','$me')";

		$result = mysqli_query($mysqli, $sql);
	}
	}
}


function unfollow_user($theirid, $me, $them, $mysqli){
	$count = check_count($me, $them, $mysqli);

	if ($count != 0){
		$sql = "DELETE FROM follow 
				WHERE user_id = '$theirid' AND username = '$me'
				LIMIT 1";

		$result = mysqli_query($mysqli, $sql) or die(mysql_error());
	}
}
?>