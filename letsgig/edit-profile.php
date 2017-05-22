<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

	if(empty($_SESSION['username'])) {
   header("Location: index.php");
}else{
	$username = $_SESSION['username'];
    $sql = "SELECT * FROM bands where username = '$username'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli)); 
    $rws = mysqli_fetch_array($result);
}
?>
<?php //include 'controllers/form/edit-profile-form.php' ?>
<form action="includes/update-profile.php" method="post">
<h2><?php echo $username; ?></h2>
<label for="">First Name</label>
<input type="text" placeholder="<?php echo $rws['firstname'];?>" name="firstname" value="<?php echo $rws['firstname'];?>">
<label for="">Last Name</label>
<input type="text" placeholder="<?php echo $rws['lastname'];?>" name="lastname" value="<?php echo $rws['lastname'];?>">
<br></br>
<label for="">Band Name</label>
<input type="text" placeholder="<?php echo $rws['bandname'];?>" name="bandname" value="<?php echo $rws['bandname'];?>">
<br></br>
<label for="">Email</label>
<input type="text" placeholder="<?php echo $rws['email'];?>" name="email" value="<?php echo $rws['email'];?>">
<br></br>
<label for="">Bio</label>
<input type="text" placeholder="<?php echo $rws['bio'];?>" name="bio" value="<?php echo $rws['bio'];?>">
<br></br>
<label for="">Genre</label>
<input type="text" placeholder="<?php echo $rws['genre'];?>" name="genre" value="<?php echo $rws['genre'];?>">
<br></br>
<label for="">Location</label>
<input type="text" placeholder="<?php echo $rws['location'];?>" name="location" value="<?php echo $rws['location'];?>">
<br></br>
<label for="">Website</label>
<input type="text" placeholder="<?php echo $rws['website'];?>" class="url" name="website" value="<?php echo $rws['website'];?>">
<br></br>
<label for="">Facebook</label>
<input type="text" placeholder="<?php echo $rws['facebook'];?>" class="url" name="facebook" value="<?php echo $rws['facebook'];?>">
<br></br>
<label for="">Soundcloud</label>
<input type="text" placeholder="<?php echo $rws['soundcloud'];?>"  class="url"name="soundcloud" value="<?php echo $rws['soundcloud'];?>">
<br></br>
<label for="">twitter</label>
<input type="text" placeholder="<?php echo $rws['twitter'];?>" class="url" name="twitter" value="<?php echo $rws['twitter'];?>">
<br></br>
<label for="">youtube</label>
<input type="text" placeholder="<?php echo $rws['youtube'];?>" class="url" name="youtube" value="<?php echo $rws['youtube'];?>">
<br></br>
<label for="">Mixcloud</label>
<input type="text" placeholder="<?php echo $rws['mixcloud'];?>" class="url" name="mixcloud" value="<?php echo $rws['mixcloud'];?>">
<br></br>
<input type="submit" name="submit" value="Update Profile" />
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){

        function validateURL(url) {
            var reurl = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
            return reurl.test(url);
        }

        $('form').submit(function(e){

            var isValid = true;

            $('.url').each(function(){
               isValid = validateURL($(this).val());
               return isValid;
            });
			
            if (!isValid){
                e.preventDefault();
                alert("Please enter a valid URL, remember to include http://");
				}

        });

    });

</script>