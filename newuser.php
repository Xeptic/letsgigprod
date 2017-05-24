<!DOCTYPE html>
<html lang="en">
<head>
<script src="src/"></script>
    <title>Let's Gig - Setup your profile</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="dist/jquery.cropit.js"></script>
    <script type="text/javascript" src="src/"></script>
    
    <script type="javascript" src="test/"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/725e203c7d.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/css/bootstrap-social.css"></script>
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
                    <li><a href="home.php">Home</a></li>
                    <li><a data-target="#findAVenue" data-toggle="modal">Find a venue</a></li>
                    <li><a href="find-a-band-artist.html">Find a band/artist</a></li>
                    
                    <!-- Dropdown Menu -->
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Controls<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="active" href="#">Profile</a></li>
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
    
<body id="newUserBody">
<div>
   <div id="newUserMainDiv" class="container center">
    <div>
        <h1>Registration Successful!</h1>
        <h2>Welcome to Let's gig!</h2>
        <div class="row">
            <div class="col-xs-12">
             <table class="center">
              <tr>
                <td>
                    <a data-target="#newProfileStep1" data-toggle="modal">
                      <i class="fa fa-user-circle"> Start with setting up your profile</i></a>
                </td>
                <td>
                    <a href="userprofile.php">
                      <i class="fa fa-fast-forward"> <br> Skip for now <br> <br>(not recommended)</i></a>
                </td>
              </tr>
              
             </table>
            </div>
        
        </div>
       
    </div>
   </div> 
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="modal fade" data-backdrop="static" id="newProfileStep1">
                <div class="modal-dialog">
                    <div class="modal-content newProfileModal">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal"><span class="bg-info">&times;</span></button>
                            <h4 class="modal-title text-center">Upload profile image</h4> 
                        </div>  
                        <div class="modal-body">
                           <div class="center">
                              <div id="image-cropper">
                                <!-- This is where the preview image is displayed -->
                                <div class="cropit-preview"><img src="Muse300x300.jpg"></div>
                                
                                <!-- This range input controls zoom -->
                                <!-- You can add additional elements here, e.g. the image icons -->
                                <input type="range" class="cropit-image-zoom-input" />
                                
                                <!-- This is where user selects new image -->
                                <input type="file" class="cropit-image-input" />
                                
                                <!-- The cropit- classes above are needed
                                     so cropit can identify these elements -->
                               </div>
                           </div>
                      </div>
                        <div class="modal-footer">
                            <i class="fa fa-fast-forward" data-dismiss="modal" data-target="#newProfileStep2" data-toggle="modal">Skip this step</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div> 
    <!-- edit banner-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="modal fade" data-backdrop="static" id="newProfileStep2">
                <div class="modal-dialog">
                    <div class="modal-content newProfileModal">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal"><span class="bg-info">&times;</span></button>
                            <h4 class="modal-title text-center">Edit profile banner</h4> 
                        </div>  
                        <div class="modal-body">
                           <div class="center">
                              <div id="image-cropper">
                                <!-- This is where the preview image is displayed -->
                                <div class="cropit-preview"><img id="editBannerFrameSize" src="testbanner1400x400.jpg"></div>
                                
                                <!-- This range input controls zoom -->
                                <!-- You can add additional elements here, e.g. the image icons -->
                                <input type="range" class="cropit-image-zoom-input" />
                                
                                <!-- This is where user selects new image -->
                                <input type="file" class="cropit-image-input" />
                                
                                <!-- The cropit- classes above are needed
                                     so cropit can identify these elements -->
                               </div>
                           </div> 
                        </div>
                        <div class="modal-footer">
                            <i class="fa fa-fast-forward" data-dismiss="modal" data-target="#newProfileStep3" data-toggle="modal">Skip this step</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>  
</body>
    
</html>