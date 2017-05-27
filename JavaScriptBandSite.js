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

$("#jsTest").click( function(){
    
   $("#jsTest").hide(); 
    
});
    
$(function() {

    var start = moment();
    var end = moment().add(30,'day');

    function cb(start, end) {
        $('#datePicker span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));
    }
    
    $('#datePicker').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
    
});
});

