<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">
            Username: <input type='text' name='username' id='username' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Password: <input type="password" name="password" id="password"/><br>
            <!--Confirm password: <input type="password" name="confirmpwd" id="confirmpwd" /><br>-->
            <input type="submit" name="submit" value="Register" /> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>