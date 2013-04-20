<?php
/**
* @author stresslimit
* 
* Description: this file registers the custom content types
*
*/


if (function_exists('sld_register_post_type')) {

	sld_register_post_type( 'lab', array( 'taxonomies'=>array('category'), 'has_archive' => false ) );
	sld_register_taxonomy( 'lab-type', array( 'lab' ) );

}




add_action( 'admin_init', 'sld_custom_fields');
function sld_custom_fields() {
	if ( !function_exists('x_add_metadata_group') ) return;

	/* labs */
	x_add_metadata_group( 'lab-details', array('lab'), array('label' => 'Lab Details', 'priority' => 'high') );
	x_add_metadata_field( 'lab_url', array('lab'), array('group' => 'lab-details', 'label' => 'URL', 'field_type' => 'text' ) );

}

