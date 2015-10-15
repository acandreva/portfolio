$(document).ready( function () {

    //FANCYBOX
    $(".recipebook, .resumefile").fancybox();

    //MASONRY
    $('.grid').masonry({
      // options
      itemSelector: '.grid-item',
      columnWidth: 80
    });

    //MIXITUP FILTERING
    $(function(){
        // Instantiate MixItUp:
        $('#skills_tags').mixItUp();
    });

    //BACKSTRETCH
    $.backstretch('images/grandcanyon.jpg');
});