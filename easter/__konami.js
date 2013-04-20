(function($) {
	var konamiListeners = [];
	
	var kode = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
	var progress = 0;

	$.extend({
		konami: function(listener, sequence) {
			konamiListeners.push(listener);
			
			if (sequence) kode = sequence;
		}
	});

	$(document)
		.bind("keyup", function(event) {
			var c = event.keyCode;
			
			if (c == kode[progress])
				progress++;
			else
				progress = c == kode[0] ? 1 : 0;

			if (progress == kode.length) {
				if (konamiListeners.length > 0) {
					$.each(konamiListeners, function(item) {
						this();
					});
				}
			}
		});
})(jQuery);