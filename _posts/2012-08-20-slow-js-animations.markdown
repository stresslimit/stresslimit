---
author: wes
comments: false
date: 2012-08-20 04:39:57+00:00
layout: post
link: http://stresslimitdesign.com/slow-js-animations
slug: slow-js-animations
title: 'Slow JS animations? '
wordpress_id: 988
author:
- wes
---

Are you experiencing unexpectedly slow, weird, or inefficient animations? I was trying to get Javascript to animate something smoothly over 1000ms, but it just wasn't working. It was jerky and slow. After pulling my hair out for a bit, I realized I had this defined in my CSS:

    
    * {
      -webkit-transition:all 0.2s ease;
      -moz-transition:all 0.2s ease;
      -ms-transition:all 0.2s ease;
      -o-transition:all 0.2s ease;
    }


...which equals instant conflict: JS was trying to do its thing, while the CSS animation was doing its own.

The solution was to remove the CSS  transitions on the target element, like so:

    
    div.no-css-transitions {
      -webkit-transition:none;
      -moz-transition:none;
      -ms-transition:none;
      -o-transition:none;
    }


Success!
