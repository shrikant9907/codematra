<?php
/* 
* Remove users capabilites by role | Site - codematra.com
*/
add_action('admin_init', 'remove_users_capabilities');
function remove_users_capabilities() {

	// Editor user role
	$userrole = get_role( 'editor' );

	// Remove Editors capabilites
	$adminrole->remove_cap( 'delete_others_pages' );    
	$adminrole->remove_cap( 'delete_others_pages' );     
}  