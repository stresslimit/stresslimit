
$(document).ready(function(){
	
	var menutop = $('menu').offset().top;
	// var menutop = 470; // this is keyed to css in style.css for .menu top:
	var plugintop = $('#plugins').offset().top -1;
	var worktop = $('#work').offset().top -1;
	var contacttop = $('#contact').offset().top -1;
	var active = 'top';
	var pageheight = $(document).height();
	var windowheight = $(window).height();
	var now, percentnow;

	// scroll-related functions
	$(window).scroll(function(){

		// top section parallax
		var offset = $(window).scrollTop();
		$('.parallax').each(function(){ $(this).css('top',-Math.round( offset * $(this).attr('data-offset'))) });

		// menu controls
		if(offset > parseInt(menutop-10)) {
			$('menu').css({'position':'fixed','top':'10px'});
			$('.totop').show();
		} else {
			// console.log(menutop);
			$('menu').css({'position':'absolute','top':menutop+'px'});
			$('.totop').hide();
		}

		// lame state controller
		if(offset < plugintop) now = 'top';
		else if(offset >= plugintop && offset < worktop) now = 'plugins'
		else if(offset >= worktop && offset < contacttop) now = 'work';
		else if(offset >= contacttop) now = 'contact';

		if(now!=active) {
			$('menu a').removeClass('sel');
			$('menu a[href=#'+now+']').addClass('sel');
			$('menu').removeClass(active);
			$('menu').addClass(now);
			active = now;
		}

		percentnow = (offset)/pageheight;
		$('#logo_lg').css({'bottom':-550+Math.round(percentnow*550)+'px'});

	});

	// menu click
	$('menu a').click(function(e){
		e.preventDefault();
		var to = $(this).attr('href');
		if(to=='#') to = 0;
		$(window).scrollTo(to,500);
	});

	// hide all .pages except that are not the first in their section
	$('.page').each(function(){	if(!$(this).hasClass('one')) $(this).hide(); });
	$('nav a').click(function(e){
		e.preventDefault();
		if(!$(this).hasClass('sel')) {
			var thispage = $(this).attr('class');
			$(this).siblings('a').removeClass('sel');
			$(this).addClass('sel');
			$(this).parent('nav').siblings('.page').hide();
			$(this).parent('nav').siblings('.page.'+thispage).show();
		}
	});
	
  $('.page .screenshot:not(.dst) img').each(function(){
          var hover = $('<img>').addClass('ssh').attr('src',TEMPLATE_PATH+'images/screenshot_hover.png');
          $(this).parent().append(hover);
  });
	
	// limiting characters of textarea [so people don't write us a novel; actually more so that we don't get scrollbars]
	// $("textarea[maxlength]").keyup(function(){
	// 	var limit = parseInt($(this).attr('maxlength'));
	// 	var text = $(this).val();
	// 	var chars = text.length;
	// 	// $(".count").text(parseInt(limit-chars)+' characters remaining').css('color','#000000');
	// 	if(chars >= limit) {
	// 		// $(".count").text('0 characters remaining').css('color','#FF0000');
	// 		var new_text = text.substr(0, limit);
	// 		$(this).val(new_text);
	// 	}
	// });

	// slide to send [thanks http://blog.ovidiu.ch/dragdealer-js]
	var slider = new Dragdealer('comment-slider', {
		steps: 2,
		callback: draghandler
	});
	function draghandler(value) {
		var message = '';
		if(value) {
			if($('#name').val() == '' || $('#email').val() == '' || $('#message').val() == '' ) {
				$('form .error').text('Please fill in all the fields').fadeIn();
				message = 'Try Again!&nbsp; <span>☜</span>';
			} else {
				dragsuccess();
				message = 'SENDING...';
			}
		} else {
			message = 'SLIDE MORE!&nbsp; <span>☞</span>';
		}
		$('.dragdealer .handle').html(message);
	}
	function dragsuccess() {
		$('<input>').attr({'name':'antispam','type':'hidden'}).val('nospam').appendTo('#contact form');
		var theurl = TEMPLATE_PATH+'handler.php';
		var data = $('form').serialize();
		$.post(theurl, data, function(response){
				if(response.success==true) {
					$('.dragdealer .handle').html('SENT');
					$('form').html('<p>Thanks for getting in touch!</p>');
				}
		});
	}

	// make external links open in a new page
	var domain = location.host;
	$('a').each(function(){
		var ref = $(this).attr('href');
		if (typeof ref == "undefined") return;	// shouldn't need, unless no href.
		if( (ref.indexOf(domain) == -1 && ref.indexOf('http') == 0) || (ref.indexOf('pdf') > 0) ) {
			$(this).attr('target',"_blank");
		}
	});

});



