// copied from bootsnipps and edited

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
$(window).on('resize', function(){

var divHeight = $('.affix-row').height(); 
$('#sidenav01').css('min-height', divHeight+'px');
});