<?php 
if (!function_exists('moz_plugin_log')) {
    // to use in production site
    function moz_plugin_log($entry, $mode = 'a', $file = 'moz_plugin_log')
    {
        // Get WordPress uploads directory.
        $upload_dir = wp_upload_dir();
        $upload_dir = $upload_dir['basedir'];
        // the entry to json_encode.
        $entry = json_encode($entry);
        // Write the log file.
        $file = $upload_dir . '/' . $file . '.log';
        $file = fopen($file, $mode);
        $bytes = fwrite($file, current_time('mysql') . "::" . print_r($entry, true) . "nn");
        fclose($file);
        return $bytes;
    }
}

$user123 = wp_get_current_user();





// $userdetails = get_user_by('email', 'shamsulzoha7@gmail.com');;
//  global $user_ID;
//     global $current_user;

// $userdetails = get_userdata($user_ID);

// moz_plugin_log($userdetails);

add_action( 'pmpro_after_change_membership_level', 'pmpro_after_change_membership_level_callback' );
	
function pmpro_after_change_membership_level_callback($level_id) {
	global $user_ID;
	
	
    $user_id = get_current_user_id();

	// Get the current logged-in user's data as an object
  
	
	if($user_id != 0){
	
		
		
		 $userdetails = get_userdata($user_ID);
		$user_get_current = wp_get_current_user();
		
		global $user_ID;
		global $current_user;
	
		moz_plugin_log(array("current_user_global",$level_id,$user_ID, $current_user));
		moz_plugin_log(array("get_userdata(user_ID)",$level_id,$user_ID, $userdetails));
		
		moz_plugin_log(array("wp_get_current_user",$level_id,$user_ID, $user_get_current));
		
	}
}


function wp_login_fn( $user_login, $user ) {
    // your code
	moz_plugin_log(array("login",$user_login, $user));
}
add_action('wp_login', 'wp_login_fn', 10, 2);
	
	