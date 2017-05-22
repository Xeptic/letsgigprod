<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';
include_once 'geocode.php';

$error_msg = "";

if(isset($_POST['submit'])){
	
		
if (isset($_POST['username'], $_POST['email'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
	$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
	$street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
	$postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
	$country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
	$membertype = "venue";
	
	if(empty($_POST['lat'])){
		$data_arr = geocode($postcode);
		$lat = $data_arr[0];
		$long = $data_arr[1];
	}else{
		$lat = $_POST['lat'];
		$long = $_POST['lng'];
	}
	
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
  
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM venues WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
    }
 
    // check existing username
    $prep_stmt = "SELECT id FROM venues WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
        }
 

 
    if (empty($error_msg)) {
		// Store password string
		$password = ($_POST['password']);	
        // Hash the password 
		$hash = password_hash($password, PASSWORD_DEFAULT);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO venues (username, email, password, firstname, lastname, street, postcode, city, country, lat, lng, membertype) VALUES (?, ?, ?, ?, ?, ? ,? ,?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssssssssss', $username, $email, $hash, $firstname, $lastname, $street, $postcode, $city, $country, $lat, $long, $membertype);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                //header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ../register_success.php');
		
		}
	}
	//show_error($mysqli);
}else{
	echo "nothing posted";
	
}