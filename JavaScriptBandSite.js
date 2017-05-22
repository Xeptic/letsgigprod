$(document).ready(function() {
$('#para').click(function() {
         $('#para').hide(); 
});
$('#testingJQ').click(function() { 
    $('#testingJQ').hide();
});


$(".featuredDivs").hover(function() {
   $(this).animate({opacity:0.4},500);
    },function(){
    $(this).animate({opacity:1},500);
});
$("#artistsClose").click(function(){
    event.preventDefault();
    $("#featuredArtistsHeader").fadeOut(400);
    $(".featuredArtistsCols").fadeOut(400);
    $("#featuredVenuesHeader").removeClass("col-xs-6");
    $("#featuredVenuesHeader").addClass("col-xs-12");
    $(".featuredVenuesCols").removeClass("col-xs-3");
    $(".featuredVenuesCols").addClass("col-xs-6");
    
});
$("#venuesClose").click(function(){
    event.preventDefault();
    $("#featuredVenuesHeader").fadeOut(400);
    $(".featuredVenuesCols").fadeOut(400);
    $("#featuredArtistsHeader").removeClass("col-xs-6");
    $("#featuredArtistsHeader").addClass("col-xs-12");
    $(".featuredArtistsCols").removeClass("col-xs-3");
    $(".featuredArtistsCols").addClass("col-xs-6");
});
});


$('document').ready(function()
{ 
     /* validation */
  $("#login-form").validate({
      rules:
   {
        password: {
            required: true,
        },
        username: {
            required: true,
        },
    },
       messages:
    {
            password:{
                      required: "please enter your password"
                     },
            username: "please enter your username",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    
   $.ajax({
   type : 'POST',
   url  : '/includes/process_login.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#btn-login").html('sending ...');
   },
   success :  function(response)
      {      
     if(response=="ok"){
         window.location.href = "home.php";
     }
     else{
         
      $("#error").fadeIn(1000, function(){  
    $("#error").html(response);
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});