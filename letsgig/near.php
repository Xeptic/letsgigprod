<!DOCTYPE html>
    <html>
      <head>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      </head>
      <body onload="initCoords()">
<script>
function initCoords() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(displayPosition, displayError);
  } else {
    showError("Your browser does not support Geolocation!");
  }
}
function displayPosition(position) {
  var lat = position.coords.latitude;
   var lng = position.coords.longitude;		
   $.ajax({
      type: 'POST',
	  url: 'distance.php',
	  dataType: 'json',
      data: { latitude : lat, longitude : lng },
	  success: function (data) {
				$.each(data, function(k, v){
					$(".the-return").append("Username: " + v.username + "<br>");
					$(".the-return").append("Postcode: " + v.postcode + "<br></br>");
});
	  },
	  error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
   }
});
}
function getLocation(){
if (navigator.geolocation) {
  var options = {timeout:60000};
  navigator.geolocation.getCurrentPosition(displayPosition, displayError, options);
}
else {
  alert("Geolocation is not supported by this browser");
}
}
function displayError(error) {
  var errors = { 
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
  };
  alert("Error: " + errors[error.code]);
}
</script>
<div class="the-return">

</div>
</body>
</html>