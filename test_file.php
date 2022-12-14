<?php

$json = '
{"data":{"ID":"50","user_login":"moztestuser31","user_pass":"$P$Bwtgnnx3eltP4e.YjuLg.dXS.RHaAW1","user_nicename":"moztestuser31","user_email":"moztestuser31@mailinator.com","user_url":"","user_registered":"2022-12-14 06:53:15","user_activation_key":"","user_status":"0","display_name":"moztestuser31","membership_level":{"ID":"2","id":"2","subscription_id":"52","name":"Monthly $9.99","description":"","confirmation":"","expiration_number":"0","expiration_period":"","allow_signups":"1","initial_payment":9.9900000000000002131628207280300557613372802734375,"billing_amount":9.9900000000000002131628207280300557613372802734375,"cycle_number":"1","cycle_period":"Month","billing_limit":"0","trial_amount":0,"trial_limit":"0","code_id":"0","startdate":"1671000829","enddate":null,"categories":[]},"membership_levels":[{"ID":"2","id":"2","subscription_id":"52","name":"Monthly $9.99","description":"","confirmation":"","expiration_number":"0","expiration_period":"","initial_payment":9.9900000000000002131628207280300557613372802734375,"billing_amount":9.9900000000000002131628207280300557613372802734375,"cycle_number":"1","cycle_period":"Month","billing_limit":"0","trial_amount":0,"trial_limit":"0","code_id":"0","startdate":"1671000829","enddate":null}]},"ID":50,"caps":{"subscriber":true,"pmpro_role_2":true},"cap_key":"zjr_capabilities","roles":["subscriber","pmpro_role_2"],"allcaps":{"read":true,"level_0":true,"subscriber":true,"pmpro_role_2":true},"filter":null}
';
$userdetails = json_decode($json);

print_r($userdetails);

$allowed_roles = [
    'pmpro_role_2',
    'pmpro_role_6',
    'pmpro_role_7',
    'pmpro_role_8',
    'pmpro_role_9',
    'pmpro_role_10',
    'pmpro_role_11',
    'pmpro_role_12',
];

foreach ($userdetails->roles as $user_role) {
    foreach ($allowed_roles as $allowed_role) {
        if ($user_role == $allowed_role) {
            print_r("equal");
        }
    }
}


// add_action( 'pmpro_after_change_membership_level', 'pmpro_after_change_membership_level_callback' );
	
// function pmpro_after_change_membership_level_callback($level_id,$user_id,$cancel_level) {
// 	moz_plugin_log(array($level_id,$user_id,$cancel_level));
// }








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
        $bytes = fwrite($file, current_time('mysql') . "::" . print_r($entry, true) . "\n\n");
        fclose($file);
        return $bytes;
    }
}