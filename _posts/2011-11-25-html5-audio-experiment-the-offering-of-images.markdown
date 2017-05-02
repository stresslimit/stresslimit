---
author: colin
comments: true
date: 2011-11-25 09:31:15+00:00
layout: post
link: http://stresslimitdesign.com/html5-audio-experiment-the-offering-of-images
slug: html5-audio-experiment-the-offering-of-images
title: HTML5 Audio experiment - the Offering of Images
wordpress_id: 735
author:
- colin
---

[![](/assets/uploads/2011/11/offering-674x226.png)](http://theofferingofimages.com/)

We've heard a lot about HTML5 in the past year or so, and from the great [unrealized] promises of HTML5 video, we've seen some neat multimedia-type interactive presentations, notably from the Arcade fire and Ok Go chrome experiments. But we've barely heard anything about another new HTML5 tag, <audio>

At the basis it should work about the same as <video> — you give a src file, and the browser handles playing the media natively without the help of a plugin. And the best part, we can interact directly with the tag using javascript.

We found a neat simple [HTML5 audio javascript library called Buzz](http://buzz.jaysalvat.com/), and used it to track markup-based timestamps to audio events. Meaning, as the audio plays, the script checks if there is supposed to be something happening as the "playhead" reaches the given timestamp. We've used the HTML5 data- attribute to label the timestamps, so the sequencing is actually embedded in the markup. We could very well have kept the markup clean, and used a separate, javascript-based sequencer-type description, but that's not how we wanted to do it :)

    
    <p>the <span class="offering" data-stamp="00:03">offering</span> of images as a spiritual activity<br>
    <span data-stamp="00:04">replaces</span> the impulse to find a personal vision, an icon<br>
    as a spiritual activity it <span data-stamp="00:07">distracts</span> the individual<br>
    from finding and recognizing a singular <span data-stamp="00:10">true path</span></p>


In this example, we're playing a very powerful piece [ie, ripe with deep meaning] by modern experimental opera composer [Robert Ashley](http://www.lovely.com/), and using javascript to meaningfully highlight words as they are echoed by the background chorus voice in the music. The javascript is very simple but effective, and the song is worth a close listen while reading the though-provoking words.


### [Check out the html5 audio experiment](http://theofferingofimages.com/)
