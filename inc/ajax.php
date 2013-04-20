<?

add_action( 'wp_ajax_nopriv_filter', 'sld_filter' );
add_action('wp_ajax_filter', 'sld_filter');
function sld_filter() {

	global $wpdb;
	$errors = array();
	$success = false; // unless told otherwise

	$filter = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : die('internet is broken');	// parent category
	$cat_id = isset($_REQUEST['cat']) ? $_REQUEST['cat'] : die(-1);							// category to search in
	// $cat = isset($_REQUEST[$filter]) ? $_REQUEST[$filter] : die(-1);						// category to search in
	// if (''==$cat) die('some important message here');


	$output = '';


	$posts = get_posts(array(
		'category' => $cat_id,
		// 'post_status' => 'draft',
		'posts_per_page' => -1
	));

	if (count($posts)) {

		foreach ($posts as $post) : setup_postdata($post);

			// include('template-post.php');

			$output .= '<article class="brief" id="post-'.$post->ID.'">';
			$output .= '	<h3><a href="'.get_permalink($post->ID).'" rel="bookmark" title="Permanent Link to '.$post->title_attribute.'">'.$post->post_title.'</a></h3>';
			$output .= '	<h6>'.the_time('l, F jS, Y').'</h6>';
			$output .= 		get_the_excerpt();
			$output .= '</article>';

		endforeach;

	} else {
		$output = 'There are no posts in this category';
	}

	$cat_name = get_the_category_by_ID( (int)$cat_id );

	echo '<h3>Articles in <span>'.$cat_name.'</span></h3>';
	echo $output;
	exit;

}