<?php
/* 
* Add User roles in WordPress | Site - codematra.com
*/
add_action('init','add_user_roles');
function add_user_roles() {

	// Add new role	
	add_role( 'staff', 'Staff', array( 'read' => true, 'level_7' => true ) );  

}