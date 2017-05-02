---
author: wes
comments: true
date: 2012-04-13 19:37:23+00:00
layout: post
link: http://stresslimitdesign.com/full-sized-backgrounds
slug: full-sized-backgrounds
title: Full Sized Backgrounds
wordpress_id: 875
author:
- wes
categories:
- CSS
thumbnail: resize.png
---

I was recently tasked to implement a site where the [home page](http://naisgood.com) had  a _series_ of rotating full-screen backgrounds. The quintessential example that immediately sprang to mind was the [GoToChina](http://ringvemedia.com) site, while [Chris Coyer](http://css-tricks.com/perfect-full-page-background-image/) has a series of techniques he's rounded up, too. However, these utilize only a single image.

Here's the markup I used:


    <div id="bg">
    	<article id="slide-1" style="background-image: url('space1.jpg');">
    		<!-- other fun content here -->
    	</article>

    	<article id="slide-2" style="background-image: url('space2.jpg');">
    		<!-- other fun content here -->
    	</article>

    	<!-- etc... -->
    </div>


Here, the background images are assigned with an inlined style. I'm only doing this because each image is dynamically pulled from a database and assigned at page load. You could also assign it in the css using the article's _id_ if you wished.

With CSS3, getting the background-image of the <article> element to center and scale is straightforward. The image even keeps it's aspect ratio:


    #bg {
    	position:fixed;
    	top:0;
    	left:0;
    	height:100%;
    	width:100%;
    	z-index:-1;
    	min-width:768px;
    	overflow:hidden;
    }

    #bg article {
    	width:100%;
    	height:100%;
    	overflow:hidden;
    	position:absolute;
    	background: no-repeat center center fixed;
    	-webkit-background-size: cover;
    	-moz-background-size: cover;
    	-o-background-size: cover;
    	background-size: cover;
    }


Neat. What this does, then is makes sure that the image always covers the background, while keeping it centered. The magic that allows this to happen is within: _background-size: cover;_

The slides are now all sitting on top of each other, and they may be rotated through using fades or side-scrolls, or any other techniques you wish via a little javascript.


Sadly, and not-altogether-unexpectedly, this doesn't work in IE prior to version 9. There is a nice workaround using a bit of jQuery:




    if ( $.browser.msie ) {
      $('#bg article').each(function() {
        var pattern = /url\(|\)|"|'/g;
        var src = $(this).css('background-image').replace(pattern,"");
        var id = $(this).attr('id');
        $('head').append("<style>#slide"+ id +"{progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+src+"', sizingMethod='scale'); -ms-filter: 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=' "+ src +"', sizingMethod='scale')';}</style>");
      });
    }


This will rip the image src's out of the background-attribute, and use them in an IE-only filter The nice thing about this approach is it's simplicity. No extraneous markup or extras, and it performs well.
