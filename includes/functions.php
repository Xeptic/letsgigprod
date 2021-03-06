<?php
include_once 'psl-config.php';
include_once 'db_connect.php';

 
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = true;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}

function login($username, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
		$stmt = $mysqli->prepare("SELECT id, username, password FROM bands WHERE username = ?");
		$stmt->bind_param('s', $username);  // Bind "$username" to parameter.
		$stmt->execute();    // Execute the prepared query.
		$stmt->bind_result($id, $username, $password);
 
        // get variables from result.
        $result = $stmt->get_result();

		
            // If the user exists we check if the account is locked from too many login attempts
 
            //if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                //return false;
            //} else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$hashed_pass = $row['password'];
					$user_id = $row['id'];
						if (password_verify($password, $hashed_pass)) {
							// Password is correct!
							// Get the user-agent string of the user.
							$user_browser = $_SERVER['HTTP_USER_AGENT'];
							// XSS protection as we might print this value
							$user_id = preg_replace("/[^0-9]+/", "", $user_id);
							$_SESSION['user_id'] = $user_id;
							// XSS protection as we might print this value
							$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
							$_SESSION['username'] = $username;
							$_SESSION['login_string'] = $username . $user_browser;
                    // Login successful.
					return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time) VALUES ('$user_id', '$now')");
                    return false;
                }
			} else {
            // No user exists.
            return false;
    }
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['username'], $_SESSION['login_string'])) {
 
        //$user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
			$login_check = $username . $user_browser;
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function show_error($mysqli){
	echo mysqli_error($mysqli);
	
	echo "<br></br>";
	
	echo mysqli_errno($mysqli);
	
}
?>