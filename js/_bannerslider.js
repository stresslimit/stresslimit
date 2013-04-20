// NOTE this is obsolete. Use stress.js

function BannerSlider() {
	console.log('bannerslider init');
	
	// controlling the containers
	// requires jquery (obviously)
	var self = this;
	
	// about, location, home, menu, love
	var curr_view = "0";
	var current = $('#banner-1');
	
	curr = current.detach();
	
	var siteOrder = new Array("banner-1", "banner-2", "banner-3", "banner-4");
	var currLocNum = 2;	 // since we're starting off at home	
	var shifting = new Boolean(false);	








	$(document).keydown(function(e){
	   // if the left arrow key is pressed
	   if(e.keyCode == 37) {
		   boxShift.shift('left', 1);
	   }

	   // if the right arrow key is pressed
	   if(e.keyCode == 39) {
		   boxShift.shift('right', 1);
	   }
	});
	
	$('#left-block')
		.mouseover(function() { $('#left-arrow').stop(true,true).fadeIn('slow'); })
		.mouseout(function() { $('#left-arrow').stop(true,true).delay(100).fadeOut('slow'); });

	$('#right-block')
		.mouseover(function() { $('#right-arrow').stop(true,true).fadeIn('slow'); })
		.mouseout(function() { $('#right-arrow').stop(true,true).delay(100).fadeOut('slow'); });

	$('#left-arrow, #left-block').click(function() {
		boxShift.shift('left', 1);
		return false;
	});

	$('#right-arrow, #right-block').click(function() {
		boxShift.shift('right', 1);
		return false;
	});










	this.show = function() {
		$(curr).stop(true, true).animate({ opacity: 1 }, 800, function() {
			curr.appendTo('#banner-focus');
		});
	}

	this.scrollSection = function (p_scrollSection) {
		// this gets passed an ID with the # symbol
		$('#banner-container').animate({ scrollTop: $(p_scrollSection).offset().top - 125 }, 500);
	}

	this.shift = function (p_dir, p_steps, p_scrollSection) {
		var next_view;
		var pixel_shift;

		if (p_dir == 'left') {
			next_view = view_handler(curr_view, 'left', p_steps);
			pixel_shift = '+=' + (920 * p_steps);
		}

		if (p_dir == 'right') {
			next_view = view_handler(curr_view, 'right', p_steps);
			pixel_shift = '-=' + (920 * p_steps);
		}


		if (next_view.string != curr_view) {

			var j = $(curr).queue("fx");
			var r = $(next_view.obj).queue("fx");
			var n = $('#banner-container').queue("fx");
			try {
				var total_queue = j.length + r.length + n.length;
			} catch (err) {
				var total_queue = 0;
			}

			// is there anything in the fx queue?
			if (total_queue == 0 && shifting == false) {

				shifting = true;

				$(curr).animate({ opacity: 0.50 }, 800, function () {
					$(this).appendTo('#banner-container');

					$('#banner-container').animate({ left: pixel_shift }, 700, function () {
						$(next_view.obj).delay(100).animate({ opacity: 1 }, 500, function () {
							$(this).appendTo('#banner-focus');

							curr_view = next_view.string;
							curr = next_view.obj;
							currLocNum = siteOrder.findIndex(curr_view);

							var spotlight = new Spotlight();
							spotlight.track(curr_view);

							// everything is done, we can animate again if we want
							shifting = false;

							// do we then want to scroll down to a specific section?
							if (p_scrollSection != null) {

								p_scrollSection = p_scrollSection.indexOf('#') == -1 ? '#' + p_scrollSection : p_scrollSection;
								self.scrollSection(p_scrollSection);
							}

						});

					});

				});

			} // end total_queue
		}



	}

	this.jump_calc = function(p_section) {

		// p_section is the name of the section we want to go to,
		// this will calculate how many jumps we need to go in, and what direction
		var direction = 'none';
		
		new_section_pos = siteOrder.findIndex(p_section);
		num_steps = new_section_pos - currLocNum;
		
		if(num_steps > 0) {
			direction = 'right';
			num_steps = Math.abs(num_steps);
		} else {
			direction = 'left';
			num_steps = Math.abs(num_steps);
		}
		
		return { 'dir': direction, 'steps': num_steps };
	}  


	view_handler = function(p_view, p_shift, p_steps) {
		// p_view is the current view
		// send this function which way it is shifting (ex. p_shift == 'left')
		// and it will return what the new view will be (ex. menu)
		
		var new_view;
		var new_html;
		
		if(p_shift == 'right') {
			// check to see if we'll be off the edge
			if((siteOrder.findIndex(p_view) + p_steps) >= siteOrder.length) {
				new_view = p_view;
			} else {
				new_view = siteOrder[siteOrder.findIndex(p_view) + p_steps];
			}
		}
		
		if(p_shift == 'left') {		 
			// check to see if we'll be off the edge
			if((siteOrder.findIndex(p_view) - p_steps) < 0) {
				new_view = p_view;
			} else {
				new_view = siteOrder[siteOrder.findIndex(p_view) - p_steps];
			}
		}
		
		$('#right-block').css('display', 'block');
		$('#left-block').css('display', 'block');

		switch(new_view) {
			
			case 'home':
				new_html = $('#home');
				$('#clickBlockLeft').fadeOut(500, function() {
					$('#clickBlockLeft').css('display', 'none');
				});
				break;
				
			case 'location':
				new_html = $('#location');
				break;
				
			case 'menu':
				new_html = $('#menu');
				break;
				
			case 'about':
				new_html = $('#about');
				break;
				
			case 'love':
				new_html = $('#love');
				$('#clickBlockRight').fadeOut(500, function() {
					$('#clickBlockRight').css('display', 'none');
				});

				break;
		}
		
		return { 'string': new_view, 'obj': new_html };
		
	}

}