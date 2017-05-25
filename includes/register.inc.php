<?php
include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg = "";
$msg = array('Uname' => 'OK', 'Umail' => 'OK');

if (isset($_POST['submit'])){
		$username = $_POST['username'];
		$emai = $_POST['email'];
		// Sanitize and validate the data passed in
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		$membertype = "band";
	
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM bands WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= 'A user with this email address already exists.';
            $msg['Umail'] = 'Email Already Exist';
        }
                $stmt->close();
    }
 
    // check existing username
    $prep_stmt = "SELECT id FROM bands WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= 'A user with this username already exists';
                        $msg['Uname'] = 'Username Already Exist';
                }
                $stmt->close();
        }
 
 
    if (empty($error_msg)) {
		// Store password string
		$password = ($_POST['password']);	
        // Hash the password 
		$hash = password_hash($password, PASSWORD_DEFAULT);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO bands (username, email, password, membertype) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $username, $email, $hash, $membertype);
            // Execute the prepared query.
            $insert_stmt->execute();
        }
        //header('Location: ../index.php');
        $msg['Umail'] = 'OK';
        $msg['Uname'] = 'OK';
    }
}
echo json_encode($msg);
?>