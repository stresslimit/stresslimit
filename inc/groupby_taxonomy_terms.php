<?php
/*
 * This class returns you an object that you can foreach() loop through, passing regular
 * get_posts() args, and the results will be grouped by category or custom taxonomy.
 * It's designed right now to work with posts in only one category [taxonomy term].
 *
 * Usage:

$args = array(
	'taxonomy' => 'my_taxonomy',
	'post_type' => 'my_type',
	);

$p = sld_groupby_category( $args );

foreach ( $p as $post ) :

	if ( sld_groupby_category_changed( $post ) )
		echo '<h1>' .sld_groupby_category_name( $post ). '</h1>';

	the_title(); // etc

endforeach;

 */
class SLD_GroupBy_Taxonomy_Terms {

	public $wpdb;
	protected $taxonomy;
	protected $orderby;

	function __construct( $args ) {
		global $wpdb;
		$this->wpdb = $wpdb;

		$defaults = array(
			'posts_per_page' => -1,
			'numberposts' => -1,
			'tax_order' => 'ASC',
			'order' => 'ASC',
		);

		$this->orderby = !empty( $args['post_type'] ) && is_post_type_hierarchical( $args['post_type'] ) ? 'menu_order' : 'post_date';

		$this->taxonomy = !empty( $args['taxonomy'] ) ? $args['taxonomy'] : 'category';
		unset( $args['taxonomy'] );

		$this->args = wp_parse_args( $args, $defaults );
	}

	function query() {
		add_filter( 'posts_join', array( &$this, 'groupby_join' ) );
		add_filter( 'posts_where', array( &$this, 'groupby_where' ) );
		add_filter( 'posts_orderby', array( &$this, 'groupby_orderby' ) );

		$query = new WP_Query( $this->args );

		remove_filter( 'posts_join', array( &$this, 'groupby_join' ) );
		remove_filter( 'posts_where', array( &$this, 'groupby_where' ) );
		remove_filter( 'posts_orderby', array( &$this, 'groupby_orderby' ) );

		return $query->posts;
	}

	function groupby_join( $a='' ) {
		return $a . " INNER JOIN {$this->wpdb->term_relationships} ON ({$this->wpdb->posts}.ID = {$this->wpdb->term_relationships}.object_id) INNER JOIN {$this->wpdb->term_taxonomy} ON ({$this->wpdb->term_relationships}.term_taxonomy_id = {$this->wpdb->term_taxonomy}.term_taxonomy_id) INNER JOIN {$this->wpdb->terms} ON ({$this->wpdb->terms}.term_id = {$this->wpdb->term_taxonomy}.term_id) ";
	}

	function groupby_where( $a='' ) {
		return $a . " AND {$this->wpdb->term_taxonomy}.taxonomy = '{$this->taxonomy}'";
	}

	function groupby_orderby( $a='' ) {
		return "{$this->wpdb->terms}.name {$this->args['tax_order']}, {$this->wpdb->posts}.{$this->orderby} {$this->args['order']}";
	}

	function category_changed( $post ) {
		if ( empty( $this->current_category ) )
			$this->current_category = '';
		$thiscat = $this->get_category_name( $post );
		$return = $thiscat != $this->current_category;
		$this->current_category = $thiscat;
		// echo '$thiscat='.$thiscat.', $this->current_category='.$this->current_category.', return='.$return.'<br>';
		return $return;
	}

	function get_category_name( $post ) {
		$thiscat = wp_get_post_terms( $post->ID, $this->taxonomy );
		return $thiscat[0]->name;
	}

} // end class SLD_GroupBy_Taxonomy_Terms



/*
 * @returns WP_Query object result that we can foreach
 */
function sld_groupby_taxonomy_terms( $args ) {
	global $sld_groupby_taxonomy_terms;
	if ( !is_object( $sld_groupby_taxonomy_terms ) ) {
		$sld_groupby_taxonomy_terms = new SLD_GroupBy_Taxonomy_Terms( $args );
	}
	return $sld_groupby_taxonomy_terms->query();
}
/*
 * Synonym function cause we think 'category' is easier to remember and write than 'taxonomy_terms'
 */
function sld_groupby_category( $args ) {
	return sld_groupby_taxonomy_terms( $args );
}

/*
 * returns boolean whether or not the category has changed since the last result; 
 * In order to know whether we put in title for the category or whatever
 */
function sld_groupby_category_changed( $post ) {
	global $sld_groupby_taxonomy_terms;
	if ( empty( $sld_groupby_taxonomy_terms ) ) 
		die('Error: you cannot use sld_groupby_category_changed() without first doing a query by calling sld_groupby_category()');
	return $sld_groupby_taxonomy_terms->category_changed( $post );
}

/*
 * Helper function to get the category [or taxonomy term] name
 */
function sld_groupby_category_name( $post ) {
	global $sld_groupby_taxonomy_terms;
	if ( empty( $sld_groupby_taxonomy_terms ) ) 
		die('Error: you cannot use sld_groupby_category_name() without first doing a query by calling sld_groupby_category()');
	return $sld_groupby_taxonomy_terms->get_category_name( $post );
}
