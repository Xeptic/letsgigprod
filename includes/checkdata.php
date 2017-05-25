<?php
include_once 'db_connect.php';
include_once 'psl-config.php';

$msg = array('Uname' => 'OK', 'Umail' => 'OK');

if (isset($_POST['register'])){
        
		$username = $_POST['username'];
		$emai = $_POST['email'];
		// Sanitize and validate the data passed in
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		//$membertype = "band";
	
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
       // echo "The email address you entered is not valid";
   // }
  
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
            $msg['Umail'] = 'Email Already Exist';
        }else{
            $msg['Umail'] = 'OK';
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
                        $msg['Uname'] = 'User Name Already Exist';
                }else{
                    $msg['Uname'] = 'OK';
                }
                $stmt->close();
        }
}
echo json_encode($msg);
?>