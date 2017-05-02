---
author: wes
comments: true
date: 2011-12-09 17:52:48+00:00
layout: post
link: http://stresslimitdesign.com/encoding-icons-in-your-css
slug: encoding-icons-in-your-css
title: Encoding icons in your CSS
wordpress_id: 420
author:
- wes
categories:
- CSS
- PHP
---

Here's a nifty trick to impress your geek friends at nerd school: encode your icons as base64 data and save them right inside your stylesheet.

Why would you want to do this?

Well, for starters it speeds up your site by minimizing HTTP requests. Much of the end-user response time is spent on downloading a page's assets; minimize these requests and you can dramatically speed up page load times (see [http://developer.yahoo.com/performance/rules.html](http://developer.yahoo.com/performance/rules.html) for a good overview on this).

Also, I like the idea of having icons and simple graphics directly attached to a particular class or id in my stylesheet.

Oh, and also, it's cool.

So how do we do it? First, we need to actually encode an image as base64 data. The easiest way to do this is to use an online form ([here's one](http://www.base64-image.de/)), but you could also use php:

    
    function encode_image( $filename=string, $filetype=string ) {
        if ($filename) {
            $img = fread(fopen($filename, "r"), filesize($filename));
            return 'data:image/' . $filetype . ';base64,' . base64_encode($img);
        }
    }


You'll note that at the beginning of the string you get back, you have: _data:{mime-type};base64._  This mime-type tells the parser how to deal with the data, and will usually be one of: _image/gif_, _image/jpg_, or  _image/png_. Using this base64-encoded string, we can now do all sorts of wacky stuff, like:

    
    background:url(data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAMCAYAAAC0qUeeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAYxJREFUeNp0kM9LwmAYx59tbk5QgqA6iDJYUAcP4RakXoKOsVPd9Cie8tI/4D+Rp8A/wEtEBM6LSB0EPXVqGjoZsTzoGNbU6bDnFRQJemDs+fF93/fzfShFUWArjlzXVWaz2TEp/H7/O8dxT5hqpPYtl0ugKIrkZyi8EQRhR5bl1clWq3Wg6/oJHrjDssnEYjHwPG9/PB7fxuPxvUKhAKlUCjCHZDIJnU6HN03zkKbpH6ZWq+1GIhHZtu2LXC4H0Wh0wxQIBCAcDkO9Xg9NJhOOQgwB++f4XW0hbQL5IZPJwHA4/KIHg4FdqVQ+8/k8tNtt+Bu9Xg8WiwUwDGMw3W532mg0HMMwTi3LCiUSCWBZdiV0HAeKxSLgzESTKiOKInn6GwsLnUtolpUkaSUulUpQrVYdXOE9al58a0b8v/I8L6qqet3v94Hwa5oG2HsmM6Kht/lwPW+4Qshms5BOp2E0GpFecz33/fEzJbx4O8znc3KrRxbyn/gDXT+Uy+VLfNoNBoOPiKOvh78CDADFaaRpj7fVSAAAAABJRU5ErkJggg==) 0 50% no-repeat;


Instead of linking to an external image, _we put it right in the css_. For example, that particular bit of css will put a lightbulb into the background of an element, as seen here: ![](/assets/uploads/2011/04/lightbulb.png)

If you used the php snippet above _and_ [you're serving your css with php](http://css-tricks.com/css-variables-with-php/), you could save the step of having to paste in the base64 string, and instead encode it directly like this:

    
    background: url("<?php echo encode_image ('lightbulb.png','png'); ?>") no-repeat;


Neat! Cool! Blammo! So, there you go. Yes, you could go: background:url('image/boring.gif'); but, why? This little trick will speed up your site by reducing HTTP requests, and make your server happy.
