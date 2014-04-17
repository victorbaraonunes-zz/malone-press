$(document).ready(function(){
    
	//fancybox();
	cycle();

	$('.external').attr('target','_blank');

});

function fancybox()
{

	$(".fancybox").fancybox({
		
		padding: 0,
		openEffect : 'fade',
		openSpeed  : 150,
		closeEffect : 'fade',
		closeSpeed  : 150,
		helpers: {
			title : {
				type : 'outside'
			},
			overlay : {
				locked: false
			}
		}
	});
			
}

function cycle()
{

	$("#slideshow").cycle({
		manualTrump: false,
		fx: 'scrollRight',
		easing:  'easeInOutBack',
		speed: 'slow',
		timeout: 3000,
		pause: 1,
		//pager: '#nav-cycle',
		prev: '#prev',
		next: "#next",
		pagerAnchorBuilder: function(idx, slide) {
			return "<li><a href='#'>"+slide.alt+"</a></li>";
		}
	});

}

