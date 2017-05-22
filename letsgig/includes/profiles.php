<?php
include_once 'db_connect.php';

function user_profile($username, $mysqli){
	$info = array();
	
	$sql = "SELECT id, username, bandname, firstname, lastname, genre, bio, location, website, facebook, soundcloud, twitter, youtube, mixcloud FROM bands WHERE username='$username'";
	
	$result = mysqli_query($mysqli, $sql);
	
	while($data = mysqli_fetch_object($result)){
		$info[] = array(	'username' => $data->username,
							'bandname' => $data->bandname,
							'firstname' => $data->firstname,
							'lastname' => $data->lastname,
							'genre' => $data->genre,
							'bio' => $data->bio,
							'location' => $data->location,
							'website' => $data->website,
							'facebook' => $data->facebook,
							'soundcloud' => $data->soundcloud,
							'twitter' => $data->twitter,
							'youtube' => $data->youtube,
							'mixcloud' => $data->mixcloud,
							'id' => $data->id,
						);
	}
	return $info;
	
}

function my_profile(){
	
	
	
}
?>