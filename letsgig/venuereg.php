<?php
include_once 'includes/functions.php';
include_once 'includes/geocode.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Venue Registration Form</title>
     

 
</head>
<body>
 
<?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
		
$city = '';
$postcode = '';
$country = '';
$street = '';
$latitude = '';
$longitude ='';

if(isset($_POST['find'])){
		
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['address']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
		$street = $data_arr[2];
		$postcode = $data_arr[3];
		$city = $data_arr[4];
		$country = $data_arr[5];
        $formatted_address = $data_arr[6];
                     
    ?>
<?php /*
	echo $latitude . "</br>";
	echo $longitude . "</br>";
	echo $street . "</br>";
	echo $postcode . "</br>";
	echo $city . "</br>";
	echo $country . "</br>";
	echo $formatted_address . "</br>";
 */
?>
   
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No Address Found";
    }
}

?>
 
 
<!-- enter any address -->
<form action="" method="post" autocomplete="off">
	First Name <input type="text" name="firstname" id="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" /><br>
	Last Name: <input type="text" name="lastname" id="lastname" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>"/><br>
    Username: <input type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/><br>
	Email: <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"/><br>
	Password: <input type="password" name="password" id="password"/><br>
	Street: <input type="text" name="street" id="street" value="<?php echo $street; ?>" /></br>
	City: <input type="text" name="city" id="city" value="<?php echo $city; ?>" /></br>
	postcode: <input type="text" name="postcode" id="postcode" value="<?php echo $postcode; ?>" /></br>
	Country: <input type="text" name="country" id="country" value="<?php echo $country; ?>" /></br>
			<input type="hidden" name="lng" id="lng" value="<?php echo $longitude; ?>" />
			<input type="hidden" name="lat" id="lat" value="<?php echo $latitude; ?>" />
	Find Address: <input type="text" name="address" />
    <input type="submit" name="find" id="find" value="Find Address" formaction=""/>
	<input type="submit" id="submit" name="submit" value="register" formaction="includes/vregister.php" />
</form>
	
 
<?php
//show_error($mysqli);
?>
 
</body>
</html>