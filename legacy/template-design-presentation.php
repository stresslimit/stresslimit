<?php
/*
 * Template Name: Design Presentation
 */
?>
<!DOCTYPE html>
<html>
<head>
<title><? the_title() ?></title>

<style type="text/css">
* { padding: 0; margin: 0; }
body { background-repeat:repeat; font-family: Arial, sans-serif; font-weight:normal; font-size:21px; color:#000000; padding:0; margin:0; letter-spacing:-1px; line-height:1.4em; }
a, .a { text-decoration:none; color:#a4a4a4; border-bottom:1px dotted #737373; background-color:#ffffff; padding:2px 5px 2px 5px; }
a:hover, a:hover .a, a.active { color:#ffffff; border-bottom:1px solid #000000; background-color:#000000; }
ul { margin:0; padding:0; }
li { padding: 2px 5px 2px 0px; list-style:none; }

.design-presentation-menu { padding:1em; background:rgba(256,256,256,0.8); width:15em; position:fixed; top:1em; left:1em; }
.design-presentation-menu .showhide {  }
.show-er { display:none; position:fixed; top:1em; left:1em; }
.showhide { cursor:pointer; }
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script>
jQuery(document).ready(function($){

	// quick crappy img preload
	$('.mockup-list li a').each(function(e){
		var preload = $('<img>').attr( 'src', $(this).attr('href') ); // preload bg images
	});
	$('.mockup-list li a').click(function(e){
		$('.mockup-list li a').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
		$('body').css({ 
			'background' : 'url(' + $(this).attr('href') + ') 50% 0 no-repeat' ,
			'height' : $(this).data('height')
			});
	});

	$('.hide-er').click(function(e){
		$('.design-presentation-menu').hide();
		$('.show-er').show();
	});
	$('.show-er').click(function(e){
		$('.design-presentation-menu').show();
		$('.show-er').hide();
	});

});
</script>
</head>
<body>


<a class="showhide show-er">»</a>
	
	

<div class="design-presentation-menu">


	<div class="menu">


		<p>StressLimit’s design: <?php the_title() ?> 
			<a class="showhide hide-er">«</a>
			</p>

		<ul class="mockup-list">

<?php
if ( post_password_required() ) {
	the_content();
} else {
	
foreach ( sld_get_images() as $img ) {
?>
			<li><b>&raquo;</b> <a href="<?= $img->url ?>" data-height="<?= $img->height ?>"><?= $img->title ?></a></li>
<?php
}

}
?>

		</ul>

	</div>

</div>

</body>
</html>
<?php


function sld_get_images() {
	global $post;
	$pg = new DOMDocument;
	$pg->loadHTML($post->post_content);
	foreach( $pg->getElementsByTagName('img') as $img ) {
		$return[] = (object) array( 
			'url' => $img->getAttribute('src'),
			'title' => $img->getAttribute('title'), 
			'width' => $img->getAttribute('width'),
			'height' => $img->getAttribute('height'),
			'class' => $img->getAttribute('class'),
			);
	}
	return $return;
}
