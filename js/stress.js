// --------------------------
// stresslimitdesign
// --------------------------

(function( sld, $, undefined ) {

// ------------ private ------------

	// function stickyHeader() {
	// 	if ( ! $('body').hasClass('page-home') ) return;
	// 	var offset = $('#meet-stress').outerHeight();
	// 	$(window).scroll(function(){
	// 		if( $(window).scrollTop() > offset ) { $('#menu').addClass('fixed'); }
	// 		else { $('#menu').removeClass('fixed'); }
	// 	});
	// }

	// function fix_logo() {
	// 	if (! $('#logo').length ) return;
	// 	var logotop = parseInt( $('#logo').offset().top ) - 15;
	// 	$(window).scroll(function(){
	// 		if( $(window).scrollTop() > logotop ) { $('#logo').addClass('fixed'); }
	// 		else { $('#logo').removeClass('fixed'); }
	// 	});
	// }

	function jump() {
		$('header h1 a, a.back').click(function(e) {
			e.preventDefault();
			var to = $(this).attr('href');
			if(to == '#') to = 0;
			$(window).scrollTo(to, 500);

			$(to).css({'color':'orange'}).delay(800).animate({'color':'#666'}, 1500);		// flash all text in the anchor

		});
	};

	function externafyLinks() {
		domain = "stresslimitdesign.com";
		lnks = document.getElementsByTagName("a");
		for(i=0;i<lnks.length;i++) {
			address = lnks[i].href;
			if(address.indexOf(domain)==-1 && address.indexOf("javascript")==-1) lnks[i].target="_blank";
		}
	}

	function processLayout() {
		var container = $('ol.process-list');
		if ( !container.length) return;

		var gutter = 40;

		container.masonry({
			columnWidth: function(containerWidth){
				return	(containerWidth >= 1024) ? Math.floor(( containerWidth - (2*gutter) ) / 3) :
						(containerWidth >= 780 ) ? Math.floor(( containerWidth - gutter ) / 2) :
						containerWidth;
			},
			gutterWidth: gutter,
			itemSelector: 'ol.process-list > li'
		});


return;

/*
		function updateWidth() { 
			var width = (container.width() <= 640) ? container.width() : Math.floor(( container.width() - (2*gutter) ) / 3);
			$('ol.process-list > li').css({ width:width });
			container.isotope({
				masonry: { columnWidth:width }
			});
		};

		container.isotope({
			// layoutMode: 'fitColumns',
			// resizable: false,
			itemSelector:'ol.process-list > li',
			masonry: {
				gutterWidth: gutter
			},
		});

		updateWidth();

		$(window).smartresize( updateWidth );

*/

	}





// ------------ public ------------
	sld.init = function() {
		// stickyHeader();
		// fix_logo();
		processLayout();
		jump();
		externafyLinks();
	};

}( window.sld = window.sld || {}, jQuery ));


// --------------------------
// plugins
// --------------------------

/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2008 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 */
(function(h){var m=h.scrollTo=function(b,c,g){h(window).scrollTo(b,c,g)};m.defaults={axis:'y',duration:1};m.window=function(b){return h(window).scrollable()};h.fn.scrollable=function(){return this.map(function(){var b=this.parentWindow||this.defaultView,c=this.nodeName=='#document'?b.frameElement||b:this,g=c.contentDocument||(c.contentWindow||c).document,i=c.setInterval;return c.nodeName=='IFRAME'||i&&h.browser.safari?g.body:i?g.documentElement:this})};h.fn.scrollTo=function(r,j,a){if(typeof j=='object'){a=j;j=0}if(typeof a=='function')a={onAfter:a};a=h.extend({},m.defaults,a);j=j||a.speed||a.duration;a.queue=a.queue&&a.axis.length>1;if(a.queue)j/=2;a.offset=n(a.offset);a.over=n(a.over);return this.scrollable().each(function(){var k=this,o=h(k),d=r,l,e={},p=o.is('html,body');switch(typeof d){case'number':case'string':if(/^([+-]=)?\d+(px)?$/.test(d)){d=n(d);break}d=h(d,this);case'object':if(d.is||d.style)l=(d=h(d)).offset()}h.each(a.axis.split(''),function(b,c){var g=c=='x'?'Left':'Top',i=g.toLowerCase(),f='scroll'+g,s=k[f],t=c=='x'?'Width':'Height',v=t.toLowerCase();if(l){e[f]=l[i]+(p?0:s-o.offset()[i]);if(a.margin){e[f]-=parseInt(d.css('margin'+g))||0;e[f]-=parseInt(d.css('border'+g+'Width'))||0}e[f]+=a.offset[i]||0;if(a.over[i])e[f]+=d[v]()*a.over[i]}else e[f]=d[i];if(/^\d+$/.test(e[f]))e[f]=e[f]<=0?0:Math.min(e[f],u(t));if(!b&&a.queue){if(s!=e[f])q(a.onAfterFirst);delete e[f]}});q(a.onAfter);function q(b){o.animate(e,j,a.easing,b&&function(){b.call(this,r,a)})};function u(b){var c='scroll'+b,g=k.ownerDocument;return p?Math.max(g.documentElement[c],g.body[c]):k[c]}}).end()};function n(b){return typeof b=='object'?b:{top:b,left:b}}})(jQuery);

// jQuery COLOUR plugin:
(function(d){d.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","color","outlineColor"],function(f,e){d.fx.step[e]=function(g){if(!g.colorInit){g.start=c(g.elem,e);g.end=b(g.end);g.colorInit=true}g.elem.style[e]="rgb("+[Math.max(Math.min(parseInt((g.pos*(g.end[0]-g.start[0]))+g.start[0]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[1]-g.start[1]))+g.start[1]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[2]-g.start[2]))+g.start[2]),255),0)].join(",")+")"}});function b(f){var e;if(f&&f.constructor==Array&&f.length==3){return f}if(e=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(f)){return[parseInt(e[1]),parseInt(e[2]),parseInt(e[3])]}if(e=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(f)){return[parseFloat(e[1])*2.55,parseFloat(e[2])*2.55,parseFloat(e[3])*2.55]}if(e=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(f)){return[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]}if(e=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(f)){return[parseInt(e[1]+e[1],16),parseInt(e[2]+e[2],16),parseInt(e[3]+e[3],16)]}if(e=/rgba\(0, 0, 0, 0\)/.exec(f)){return a.transparent}return a[d.trim(f).toLowerCase()]}function c(g,e){var f;do{f=d.curCSS(g,e);if(f!=""&&f!="transparent"||d.nodeName(g,"body")){break}e="backgroundColor"}while(g=g.parentNode);return b(f)}var a={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]}})(jQuery);

// isotope gutterColumn extend:
// (function($){$.Isotope.prototype._getMasonryGutterColumns=function(){var a=this.options.masonry&&this.options.masonry.gutterWidth||0;containerWidth=this.element.width();this.masonry.columnWidth=this.options.masonry&&this.options.masonry.columnWidth||this.$filteredAtoms.outerWidth(true)||containerWidth;this.masonry.columnWidth+=a;this.masonry.cols=Math.floor((containerWidth+a)/this.masonry.columnWidth);this.masonry.cols=Math.max(this.masonry.cols,1)};$.Isotope.prototype._masonryReset=function(){this.masonry={};this._getMasonryGutterColumns();var a=this.masonry.cols;this.masonry.colYs=[];while(a--){this.masonry.colYs.push(0)}};$.Isotope.prototype._masonryResizeChanged=function(){var a=this.masonry.cols;this._getMasonryGutterColumns();return(this.masonry.cols!==a)}; })(jQuery);


// --------------------------
// blitz. engage. go go go
// --------------------------

jQuery( sld.init );
