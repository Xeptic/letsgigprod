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
   var data = $("#register-form");
    
   $.ajax({
       dataType : 'json',
       method : 'POST',
       contentType: 'application/x-www-form-urlencoded',
       url  : '/includes/register.inc.php',
       data: $(data).serialize(),
       success :  function(data)
      {
          console.log(data);
          if(data.Uname && data.Umail == "OK"){
              window.location.href = "/newuser.php";
                }else{
            if(data.Uname != "OK"){
             $("#UsernameError").fadeIn(1000, function(){  
             $("#UsernameError").html(data.Uname);
         });
            }
             if(data.Umail != "OK"){
             $("#EmailErorr").fadeIn(1000, function(){  
             $("#EmailErorr").html(data.Umail);
             });
             }
                }
      }
   });
    return false;
  }
    /* end register submit */
}); 