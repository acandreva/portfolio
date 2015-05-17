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
});