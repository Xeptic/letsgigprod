<?php
include_once 'db_connect.php';


function show_posts($userid,$limit=0,$mysqli){
	$posts = array();

	$user_string = implode(',', $userid);
	$extra =  " and id in ($user_string)";

	if ($limit > 0){
		$extra = "limit $limit";
	}else{
		$extra = '';	
	}

	$sql = "SELECT user_id, eventdate, eventtime, title, details, username, dateadded FROM events WHERE user_id IN ($user_string) order by dateadded desc $extra";
		
	//echo $sql;
	
	$result = mysqli_query($mysqli, $sql);

	while($data = mysqli_fetch_object($result)){
		$posts[] = array( 	'user_id' => $data->user_id,
							'username' => $data->username,
							'dateadded' => $data->dateadded, 
							'title' => $data->title,
							'eventdate' => $data->eventdate,
							'eventtime' => $data->eventtime,
							'details' => $data->details,
					);
	}
	return $posts;

}

?>