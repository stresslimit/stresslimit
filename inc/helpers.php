<?php 


// ------------- CONTENT STUFF --------------//

function sld_excerpt( $length=55 ) {
	$text = get_the_content('');
	$text = strip_shortcodes( $text );
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
//	$excerpt_length = apply_filters('excerpt_length', $length);
	$excerpt_length = $length;
	$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
	$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	echo '<p>' . apply_filters('wp_trim_excerpt', $text, '') . '</p>';
}

add_shortcode( 'template_url', 'sld_template_url' );
function sld_template_url( $atts ) {
	return get_bloginfo('template_url');
}

function sld_projects() {
	// post meta?
	global $post;
	$works = get_post_meta($post->ID, 'work', $single);
	foreach ($works as $work) {
		echo "<a href=\"\">$work</a>";
	}
}

function sld_get_lab_type() {
	global $post;
	$thiscat = wp_get_post_terms( $post->ID, 'lab-type' );
	return $thiscat[0]->name;
}

function sld_lab_type() {
	echo sld_get_lab_type();
}

function sld_post_nav() {
	global $post;
	$next_post = get_adjacent_post(false, '', false);		// next is "newer"
	$prev_post = get_adjacent_post(false, '', true);		// prev is "older", arrow will point to higher nums 
?>

		<nav class="clearfix">
			<h2><span>Other Posts</span></h2>
		<?php if ($next_post) : ?>
			<a class="prev left" href="<?php echo get_permalink($next_post->ID) ?>">
				<h3><?php echo get_the_title($next_post->ID); ?></h3>
				<?php echo get_the_post_thumbnail($next_post->ID, 'medium'); ?>
				<span class="button">Prev</span>
			</a>
		<?php else : ?>
			<a class="prev disabled" href"#"><span>Prev</span></a>
		<?php endif; ?>

		<?php if ($prev_post) : ?>
			<a class="next right" href="<?php echo get_permalink($prev_post->ID) ?>">
				<h3><?php echo get_the_title($prev_post->ID); ?></h3>
				<?php echo get_the_post_thumbnail($prev_post->ID, 'medium'); ?>
				<span class="button">Next</span>
			</a>
		<?php else : ?>
			<a class="next disabled" href"#"><div style="width:150px;height150px;border:2px dotted #999"></div><span>Next</span></a>
		<?php endif; ?>
		</nav>
<?php
}

function sld_page_nav($query_ob='') { 
?>

	<div id="pagination">
		<div>
		<?php
			global $wp_query;
			$query = (''==$query_ob) ? $wp_query : $query_ob;
			$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'prev_text' => '',
				'next_text' => '',
				'total' => $query->max_num_pages
			) );
		?>
		</div>
	</div><?php
}




// ------------- IMAGE STUFF --------------//

function getImage($num) {	// ha ha, from c. bavota
	global $more;
	$more = 1;
	$content = get_the_content();
	$count = substr_count($content, '<img');
	$start = 0;
	for($i=1; $i<=$count;$i++) {
		$imgBeg = strpos($content, '<img', $start);
		$post = substr($content, $imgBeg);
		$imgEnd = strpos($post, '>');
		$postOutput = substr($post, 0, $imgEnd+1);
		$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '', $postOutput);;
		$image[$i] = $postOutput;
		$start=$imgEnd+1;
	}
	if(stristr($image[$num],'<img')) { echo $image[$num]; }
	$more = 0;
}

function encode_image( $filename=string, $filetype=string ) {
    if ($filename) {
        $img = fread(fopen($filename, "r"), filesize($filename));
        return 'data:image/' . $filetype . ';base64,' . base64_encode($img);
    }
}











// old Stress engine GET params for Tools pages
$u = preg_match( '|[^/]|', @$_SERVER['REQUEST_URI'], $datas );   $i = 0; // not sure why wp is triggering a warning here
foreach ( $datas as $match ) { $i++; $_ENV['data'.$i] = $match; }


// Used on our different project pages
// prefer to get rid of this and use condensed header or something:
function backtositelink() {
	?><a href="/" id="backtosite" style="position:fixed;top:0;left:0;z-index:9999;display:block;width:130px;height:30px;padding-top:10px;color:#fff;background:url('<? bloginfo('template_url') ?>/images/bg/backtosite.png') right bottom no-repeat;text-align:center;">&larr; Back to Site</a><?
}


add_filter( 'protected_title_format', 'blank' );
function blank($title) { return '%s'; }




