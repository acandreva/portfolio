$(document).ready(function() {
		$(".fancybox").fancybox();
	});
	
/*disables the right click in fancy box*/
$(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
		beforeShow: function () {
            /* Disable right click */
            $.fancybox.wrap.bind("contextmenu", function (e) {
                    return false; 
            });
        }
    });
	
/*Shows pdf iframe in fancybox*/
$(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    iframe : {
        preload: false
    }
});

/*For fancybox thumbnail viewer*/
$(document).ready(function() {
	$(".fancybox-thumb").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});
});