<!DOCTYPE html>
<html lang="en">
<head>
<script src="src/"></script>
    <title>Let's Gig - Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="moment.js" type="text/javascript"></script>
    <script src="https://use.fontawesome.com/725e203c7d.js"></script>
    <script type="text/javascript" src="JavaScriptBandSite.js"></script>
    <script src="bootstrap/css/bootstrap-social.css"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
   
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=BioRhyme" rel="stylesheet"> 
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
                    <li><a class="active" href="search.php">Search</a></li>
                    
                    <!-- Dropdown Menu -->
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Controls<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="active" href="userprofile.php">Profile</a></li>
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
<div id="searchWrapper" class="container-fluid">
<div class="container">
     <form id="searchForm" method="post">
      <h1 >Search</h1>
       <div class="form-group">
           <div class="">
               <input id="searchField" type="search" class="form-control" placeholder="Search venues, artists and events">
               <button type="submit">Search</button>
               
            <div class="row"> 
                
                <div class="col-xs-4">
                <select class="selectpicker pickersResize">
                   <option>All Catagories</option>
                   <option>Artists</option>
                   <option>Events</option>
                   <option>Venues</option>
                </select>
                 <select class="selectpicker pickersResize">
                     <option>All Locations</option>
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
                <select class="selectpicker pickersResize">
                    <option>All Genres</option>
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
               <div class="col-xs-8">
                 <div id="datePicker" class="pull-right">
                     <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                     <span></span> <b class="caret"></b>
                 </div>
               </div>
            </div>
               
           </div>
        </div>
    </form>
</div>
<div class="container">
    <div row="">
    <table id="searchResultsTable">
    <thead>
     <th class="center" colspan="3">Search Results</th>    
    </thead> 
        <tbody>
         <tr id="tableHeads">
            <td>ARTIST/VENUE NAME</td>
             <td>GENRE</td>
             <td>LOCATION</td>
        </tr>
        <tr id="resultsRow1">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr>
            <tr id="resultsRow2">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr><tr id="resultsRow3">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr><tr id="resultsRow4">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr><tr id="resultsRow5">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr><tr id="resultsRow6">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr><tr id="resultsRow7">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr><tr id="resultsRow8">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr><tr id="resultsRow9">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr>
            <tr id="resultsRow10">
            <td>**ARTIST/VENUEname</td>
            <td>**Genre</td>
            <td>**Location</td>
        </tr>
        
        
        </tbody>
        
    </table>
    
    
    
    
    </div>
    
    </div>
</div>
</body>
</html>