<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/follow.php';
include_once 'includes/showposts.php';
//include_once 'search.php';

sec_session_start();


if(empty($_SESSION['username'])) {
   header("Location: index.php");
}else{
	$username = mysqli_real_escape_string($mysqli,$_REQUEST['username']);
}
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
                 <a href="home.php" class="navbar-brand">Let's Gig</a>
            </div>
        
            <!--Menu Items-->
            
            
            <div class="collapse navbar-collapse" id="MainNavBar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="Home.php">Home</a></li>
                    <li><a data-target="#findAVenue" data-toggle="modal">Find a venue</a></li>
                    <li><a href="find-a-band-artist.html">Find a band/artist</a></li>
                    
                    <!-- Dropdown Menu -->
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Controls<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="userprofile.php">Profile</a></li>
                            <li><a href="#">Friends</a></li>
                            <li><a href="#">Settings</a></li>
                        </ul>
                    </li>
                </ul>
               
                <!--Navbar Title-->
                
                <!--Right align-->
    
     <ul class="nav navbar-nav navbar-right">
            <div class="btn-container">
			<a href="includes/logout.php">Log out</a>
            </div>
     </ul>
            </div>
        </div>
    </nav>
</head>
<body>

<div id="homeHeader" class="container-fluid">
        <div class="jumbotron center"><h1>Whats New</h1></div>
</div>
<div id="homeContent" class="container-fluid">   
        <div class="row">
                <div class="col-xs-4">
                
                <p>This is just for testing</p>
                </div>
                 <div class="col-xs-4">
                <p>This is just for testing</p>
                </div>
                 <div class="col-xs-4">
                <p>This is just for testing</p>
                </div>
        </div>
    
</div>
    
  <!-- Find a venue / Reccomended  -->   
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="modal fade" data-backdrop="static" id="findAVenue">
                <div class="modal-dialog">
                    <div class="modal-content modalBgVenue">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal"><span class="bg-info">&times;</span></button>
                            <h4 class="modal-title text-center FaV-color">Find a venue</h4> 
                        </div>  
                        <div class="modal-body"> 
                            <div class="center">
                            <button class="btn btn-default modalbuttonmargin" data-dismiss="modal" data-target="#recommendedVenues" data-toggle="modal" >View recommended</button>
                            </div>
                            <div class="white-bg">
                            <div class="form modalFormRule">
                             <div class="row">
                                 <div class="col-xs-3">
                                     <h4 class="FaV-color-black pushrighttitle">Location/s</h4>
                                     <div class="form-group  pushright">
                                       <select class="selectpicker form-control">
                                         <option>London</option>
                                         <option>Birmingham</option>
                                         <option>Glasgow</option>
                                         <option>Liverpool</option>
                                         <option>Bristol	ENG</option>
                                         <option>Manchester</option>	
                                         <option>Sheffield</option>
                                         <option>Leeds</option>	<option>Edinburgh</option>
                                         <option>Leicester</option>
                                        </select>
                                     </div>
                                 </div>
                                 <div class="col-xs-3">
                                    <h4 class="FaV-color-black genretitlefix">Genre</h4>
                                     <div class="form-group selectpickeralign">
                                       <select class="selectpicker form-control white-bg-solid">
                                         <option>Rock</option>
                                         <option>Metal</option>
                                         <option>Reggae</option>
                                         <option>Ska</option>
                                         <option>Hip-Hop</option>
                                         <option>Electronic</option>
                                         <option>Blues</option>
                                         <option>Jazz</option>
                                         <option>Rap</option>
                                         <option>Latin</option>
                                         <option>Country</option>
                                       </select>
                                     </div>
                                 </div>
                                 <div class="col-xs-3">
                                    <h4 class="FaV-color-black selectdatestitlefix">Select Dates</h4>
                                     <div class='input-group date selectpickeralign'>
                    <input id='datepicker' type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span  class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                                 </div>
                                 <div class="col-xs-3">
                                    <h4 class="FaV-color-black pushlefttitle">Crowd size</h4>
                                     <div class="form-group modalFormRules pushleft">
                                       <select class="selectpicker form-control white-bg-solid">
                                         <option>Mustard</option>
                                         <option>Ketchup</option>
                                         <option>Relish</option>
                                       </select>
                                     </div>
                                 </div>
                             </div> 
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
    
    
    
            </div>    
    </div>
    
 </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="modal fade" data-backdrop="static" id="recommendedVenues">
                <div class="modal-dialog">
                    <div class="modal-content modalBgVenue">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal"><span class="bg-info">&times;</span></button>
                            <h4 class="modal-title text-center FaV-color">Recommended Venues</h4> 
                        </div>  
                        <div class="modal-body">
                           <div class="center">
                              <button id="buttonfindavenue" data-dismiss="modal" class="btn btn-default" data-target="#findAVenue" data-toggle="modal">Find a venue</button>
                           </div>
                           <div class="form">
                               
                               
                           </div>
                                
                        </div>
                    </div>
                </div>
            </div>
         </div>
    
    
    
    </div>    
</div>  
    
    
</body>
</html>