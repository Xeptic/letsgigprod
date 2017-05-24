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


$(window).resize( function(){
     $("#bandNameHeader").addClass("")
});

$('document').ready(function()
{ 
     /* start login validation */
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
    /* end login validation */
    
    /* start login submit */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    
   $.ajax({
   type : 'POST',
   url  : '/includes/process_login.php',
   data : data,
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
    /* end login submit */
    
    
    
    
    
    
    /* start register validation */
  $("#register-form").validate({
      rules:
   {
        password: {
            required: true,
            minlength: 3
        },
        username: {
            required: true,
            minlength: 2,
            maxlength: 15
        },
       email: {
           required: true,
           email: true
       }
    },
       messages:
    {
            username:{
                    required: "Please enter your username",
                    minlength: "Username must be more than 2 characters",
                    maxlength: "Username must be no more than 15 characters"
            },
            password:{
                    required: "Please enter your password",
                    minlength: "Password needs to be a minimum of 3 Character"
                     },
            email: "Please enter an email address"
       },
    submitHandler: submitRegForm 
       });  
    /* end register validation */
    
    /* start register submit */
    function submitRegForm()
    {  
   var data = $("#register-form").serialize();
    
   $.ajax({
   type : 'POST',
   url  : '/includes/register.inc.php',
   data : data,
   success :  function(response)
      {      
     if(response=="ok"){
         window.location.href = "register_success.php";
     }
     else{   
      $("#error2").fadeIn(1000, function(){  
    $("#error2").html(response);
         });
     }
     }
   });
    return false;
  }
    /* end register submit */
}); 