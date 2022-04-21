<?php
/* 
* Add user capabilites | Site - codematra.com
*/
add_action('admin_init', 'add_user_capabilities');
function add_user_capabilities() {

    // Admin is our custom user role
    $adminrole = get_role( 'admin' );

    // Add users capabilites   
    $adminrole->add_cap( 'upload_files' );         
    $adminrole->add_cap( 'delete_posts' );              
    $adminrole->add_cap( 'edit_others_posts' );              
    $adminrole->add_cap( 'edit_others_pages' );              
    $adminrole->add_cap( 'edit_posts' );              
    $adminrole->add_cap( 'edit_published_posts' );              
}  