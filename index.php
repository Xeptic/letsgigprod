<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
//if (login_check($mysqli) == true) {
//    $logged = 'in';
//} else {
//    $logged = 'out';
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Tutorials</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=BioRhyme" rel="stylesheet"> 
    <script type="text/javascript" src="JavaScriptBandSite.js"></script>
<nav id="theNavBar" class="navbar navbar-inverse">
        <div class="container-fluid">
            <!--Logo -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                 <a href="index.php" class="navbar-brand">Let's Gig</a>
            </div>
        
            <!--Menu Items-->
            
            
            <div class="collapse navbar-collapse" id="MainNavBar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <!-- Dropdown Menu -->
                    
                </ul>
               
                <!--Navbar Title-->
                
                <!--Right align-->
    
                <ul class="nav navbar-nav navbar-right">
                    <div class="btn-container">
                    <ld>
                    <button id="loginButton" class="btn btn-primary" data-target="#loginModal" data-toggle="modal">Login</button>
                    </ld>
                    <ld>
                    <button id="SignupButton" class="btn btn-success" data-target="#SignupModal" data-toggle="modal">Sign Up</button>
                    </ld>
                    </div>
                    
                </ul>
                    
            </div>
        </div>
    </nav>
</head>
<?php
	if (isset($_SESSION['error'])){
		echo "<b>". $_SESSION['error']."</b>";
		//unset($_SESSION['error']);
}
?> 
<body>



<div id="FP-carousel" class="container-fluid">
  <div class="row">
    <div class="col-md-pull-6">
    
    
    <div id="theCarousel" class="carousel slide" data-ride="carousel">
     
      <!-- Define how many slides to put in the carousel -->
      <ol class="carousel-indicators">
        <li data-target="#theCarousel" data-slide-to="0" class="active"> </li >
        <li data-target="#theCarousel" data-slide-to="1"> </li>
        <li data-target ="#theCarousel" data-slide-to="2"> </li>
      </ol >
 
  <!-- Define the text to place over the image -->
  <div class="carousel-inner">
    <div class="item active" >
    <div class ="slide1"></div>
    <div class="carousel-caption">
      <h1 class="carouselh1">Gigging made easy!</h1>
      <p>We match musicans to venues</p>
        <table>
      <button class="btn btn-info btn-m" data-target="#loginModal" data-toggle="modal">Login</button>
      <button class="btn btn-success btn-m" data-target="#SignupModal" data-toggle="modal">Sign Up</button>
        </table>
    </div>
  </div>
  <div class="item">
  <div class="slide2"></div>
  <div class="carousel-caption">
      <h1>Events of all sizes!</h1>
    <p>We have the band and the venue to match!</p>
       <table>
      <button class="btn btn-info btn-m" data-target="#loginModal" data-toggle="modal">Login</button>
      <button class="btn btn-success btn-m" data-target="#SignupModal" data-toggle="modal">Sign Up</button>
        </table>
  </div>
  </div>
  <div class="item">
  <div class="slide3"></div>
  <div class="carousel-caption">
  <h1 class="carouselh1">Promote your band/venue!</h1>
  <p>See your band/venue on the featured page</p>
       <table>
      <button class="btn btn-info btn-m" data-target="#loginModal" data-toggle="modal">Login</button>
      <button class="btn btn-success btn-m" data-target="#SignupModal" data-toggle="modal">Sign Up</button>
        </table>
  </div>
  </div>
  </div>
 
  <!-- Set the actions to take when the arrows are clicked -->
  <a class="left carousel-control" href="#theCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"> </span>
  </a>
  <a class="right carousel-control" href="#theCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  </div>
</div>
</div>
</div>  
 
<div id="featuredHeaders" class="container-fluid">
    <div class="row">
        <div id="featuredArtistsHeader" class="col-xs-6">
            FEATURED ARTISTS <span id="artistsClose" style="border-width:1.5vw;"><a href="">&times;</a></span>
        </div>
        <div id="featuredVenuesHeader" class="col-xs-6">
            FEATURED VENUES <span id="venuesClose" style="border-width:1.5vw;"><a href="">&times;</a></span>
        </div>
    
    </div> 
</div>
    
<div id="IDfeaturedDivs" class="container-fluid">  
    <div class="row">
        <div class="col-xs-3 featuredArtistsCols">
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="soad300x300.jpg"/></a>
                <div class="img-captions">System Of A Down</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="inflames300x300.jpg"/></a>
                <div class="img-captions">InFlames</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="Muse300x300.jpg"/></a>
                <div class="img-captions">Muse</div>
            </div>
            </div>
                
        <div class="col-xs-3 featuredArtistsCols">
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="soad300x300.jpg"/></a>
                <div class="img-captions">System Of A Down</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="inflames300x300.jpg"/></a>
                <div class="img-captions">InFlames</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="Muse300x300.jpg"/></a>
                <div class="img-captions">Muse</div>
            </div>
        </div>

        <div  class="col-xs-3 featuredVenuesCols">
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="Brixton_Jamm300x300.png"/></a>
                <div class="img-captions">Brixton Jamm</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="earls_court300x300.jpg"/></a>
                <div class="img-captions">Earls Court</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="isacc.jpg"/></a>
                <div class="img-captions" >Islington Academy</div>
            </div>
        </div>
        <div class="col-xs-3 featuredVenuesCols">
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="Brixton_Jamm300x300.png"/></a>
                <div class="img-captions">Brixton Jamm</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="earls_court300x300.jpg"/></a>
                <div class="img-captions">Earls Court</div>
            </div>
            <div class="featuredDivs">
                <a href="#"><img class="featuredImages img-responsive" src="isacc.jpg"/></a>
                <div class="img-captions">Islington Academy</div>
            </div>
        </div>
    </div>
</div>
    
<div id="whatsNew" class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div>
                <h1>What's New</h1>
            </div>
            <div> 
                <p>Added javascript "dimming" effect on featured list
                <br>
                Fixed issue with scaling pictures overlapping - fix was to not use "fixed" width/height (px).
                <br>
                Added closeable featured lists using JS
                <br>
                Fixed appearence bug caused by modal container which was creating a split between featured and carousel
                <br>
                
                </p> </div>
            <div><h1>To-do list:</h1>
            <p>
                <subhead><em>Find-a-venue modal</em></subhead>
                <br>
                Make find a venue modal scale, maybe reduce input fields to buttons with @media max-width?
                <br>
                Add functionality to find a venue modal
                <br>
                <subhead><em>Start work on logged-in home page</em></subhead>
                <br>
                
                
                
                
                
                
                </p></div>
                
        </div>
    </div>
</div>
    
    
<!-- MODALS -->
    
    <!-- Login / Signup -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="modal fade" data-backdrop="static" id="loginModal">
                <div class="modal-dialog">
                    <div class="modal-content modalbg">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal"><span class="bg-info">&times;</span></button>
                            <h4 class="modal-title text-center">Login</h4> 
                        </div>  
                        <div class="modal-body"> 
                            <form action="includes/process_login.php" method="post">
                                <div class="form-group">
                                    <label for="inputUserName"><span class="formTextBg">Enter Username</span></label>
                                    <input class="form-control form-controlGradientBg" type="text" placeholder="Username" name="username" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword"><span class="formTextBg">Enter Password</span></label>
                                    <input class="form-control form-controlGradientBg"  type="password" placeholder="Password" name="password" id="password">
                                </div>
								<div class="modal-footer">
									<button type="submit" name="login" alt="login" class="btn btn-success">Login</button>
									<button type="close" class="btn btn-warning" data-dismiss="modal">Close</button>
								</div>
                            </form>
                       </div>
                  </div>
                </div>
            </div>
       </div>
    </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="modal fade" data-backdrop="static" id="SignupModal">
                <div class="modal-dialog">
                    <div class="modal-content modalbg">
                        <div class="modal-header">
                            <button class="close bg-info" data-dismiss="modal"><span class="bg-info">&times;</span></button>
                            <h4 class="modal-title text-center">Sign Up</h4> 
                        </div>  
                        <div class="modal-body"> 
                            <form action="includes/register.inc.php" method="post">
                                <div class="form-group">
                                    <label for="chooseUsername"><span class="formTextBg">Choose Username</span></label>
                                    <input class="form-control form-controlGradientBg" type="text" placeholder="Username" name="username" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="choosePassword"><span class="formTextBg">Enter Password</span></label>
                                    <input class="form-control form-controlGradientBg"  type="password" placeholder="Password" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="enterEmail"><span class="formTextBg">Enter Email Address</span></label>
                                    <input class="form-control form-controlGradientBg"  type="text" placeholder="Email Address" name="email" id="email">
                                </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="register" id="register" atl="register">Sign Up</button>
                            <button type="close" class="btn btn-warning" data-dismiss="modal">Close</button>
                         </div>
                            </form>
                    </div>                       
                  </div>
                </div>
            </div>
       </div>
    </div>
</div>

</body>
    
<footer>
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-4">
             Website By Karl Warner
            </div>
        <div class="col-xs-4">
             Contact: karl_warner@hotmail.com 
            </div>
        <div class="col-xs-4">
             All rights reserved 
            </div>
        </div>
    </div>
</footer>
    
</html>