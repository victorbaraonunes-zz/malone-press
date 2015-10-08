$(document).ready(function(){
    
    fancybox();
	cycle();
	contato();

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

	$(".slideshow").cycle({
		manualTrump: false,
		fx: 'scrollRight',
		easing:  'easeInOutBack',
		speed: 'slow',
		timeout: 3000,
		pause: 1,
		//pager: '#nav-cycle',
		prev: '.slide-prev',
		next: ".slide-next",
		pagerAnchorBuilder: function(idx, slide) {
			return "<li><a href='#'>"+slide.alt+"</a></li>";
		}
	});

}

function contato()
{
	
	$('#enviar').click(function(){

		var dados = $('form').serialize();

		$.ajax({

   			type: $('form').attr('method'),
  			url: $('form').attr('action'),
			data: dados,
			dataType: 'json',
			beforeSend: function(){
  				$('#response').html("Enviando...");
 			},
   			success: function(data){
   				console.log(data);

   				switch(data.status)
   				{
   					case '0':
   					for(var i=0; i < data.field.not_ok.length; i++)
   					{
   						$('form').find('#'+data.field.not_ok[i]).removeClass('green');
   						$('form').find('#'+data.field.not_ok[i]).addClass('red');
   					}
   					for(var i=0; i < data.field.ok.length; i++)
   					{
   						$('form').find('#'+data.field.ok[i]).removeClass('red');
   						$('form').find('#'+data.field.ok[i]).addClass('green');
   					}
   					$('#response').html(data.texto).css('color','red');
   					break;
   					
   					case '1':
   					$('input,textarea').removeClass('red green');
   					$('#response').html(data.texto).css('color','#23ea14');
   					$('form')[0].reset();
   					break;
   				}
			
  	 		},
		});
		return false;
	});

}

