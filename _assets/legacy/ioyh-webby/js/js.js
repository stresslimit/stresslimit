
jQuery.extend( jQuery.easing, {
  easeOutElastic: function (x, t, b, c, d) {
    var s=1.70158;var p=0;var a=c;
    if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
    if (a < Math.abs(c)) { a=c; var s=p/4; }
    else var s = p/(2*Math.PI) * Math.asin (c/a);
    return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
  }
});

$(document).ready(function() {
	
	// var li_width = $('#snapwrap li').width();	// could hard code this...
	$('#snapmenu li').click(function(){
		$('#snapmenu li').removeClass('active');
		$(this).addClass('active');
		var clicked = $(this).index();
		var offset = -(clicked * 840);					// meh, now hardcoded		
		$('#snapwrap ul').css({'left':offset});
	});
	
	
	// EERIE ball drag behaviour
	var x = Math.floor(  ($('body').width() - 870) / 2.0 );  // just to get the left margin 
	var booiiing = new $;
	$('#eerieRedBall')
		.bind('drag',function(e){
		booiiing.stop();
			$( this ).css({
				left: e.offsetX - x,
				top: e.offsetY - 54							// + 54 is top margin
			});
		})
		.bind('dragend',function(e){
			booiiing = $( this ).animate({
				top: '180px',
				left:'150px' }, {
				duration: 1000,
				easing: 'easeOutElastic'
			})
		});
});
