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




 