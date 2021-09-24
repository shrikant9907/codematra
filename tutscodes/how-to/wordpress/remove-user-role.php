<?php
/* 
* Code for Remove User role in WordPress | Site - codematra.com
*/
add_action('init','remove_wp_user_roles');
function remove_wp_user_roles() {

	// Remove role author
	if( get_role('editor') ) {
	  remove_role( 'editor' );
	}

	// Remove role author
	if( get_role('author') ) {
		remove_role( 'author' );
	}

	// Remove role contributor
	if( get_role('contributor') ){
	  remove_role( 'contributor' );
	}

	// Remove role subscriber
	if( get_role('subscriber') ){
	  remove_role( 'subscriber' );
	}
}