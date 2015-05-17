$(document).ready( function () {

    //FULLPAGE
    $('#fullpage').fullpage();

    //FANCYBOX
    $(".recipebook, .resumefile").fancybox();

    //MIXITUP FILTERING
    $(function(){
        // Instantiate MixItUp:
        $('#skills_tags').mixItUp();
    });

    //BACKSTRETCH
    $.backstretch('images/grandcanyon.jpg');

    //FORM
    $('#myform').submit(function( event ) {
        event.preventDefault();
        $('#myform').trigger('reset');
        alert('Thank you for your submission.');
    });
});