<?php
/*
Plugin Name: wp-moz-openai
Description: This is a plugin for integrate openai
Version: 1.0.0
Author: wp-moz
 */

if (!function_exists('moz_debug_fn')) {
    function moz_debug_fn($data)
    {
        // to theme directory
        $file = get_stylesheet_directory() . '/coutom_log.txt';
        // to this plugin dir
        // $file = plugin_dir_path(__FILE__) . '/custom_log.txt';
        file_put_contents($file, current_time('mysql') . " :: " . print_r($data, true) . "\n\n", FILE_APPEND);
    };
}
;

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

define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

function next_menus_development()
{
    add_menu_page("wp moz openai", "wp moz openai", "read", "wp-moz-openai", "wp_moz_openai_callback");

}

add_action("admin_menu", "next_menus_development");

function wp_moz_openai_callback()
{

    global $user_ID;
    global $current_user;

    $userdetails = get_userdata($user_ID);

    $user_id = get_current_user_id();

// Get the current logged-in user's data as an object
    $user = wp_get_current_user();

    $userdetails = get_user_by('email', 'mozsocia@gmail.com');

    echo "<pre>";
    print_r($user);
    echo "</pre>";
}

add_action('pmpro_checkout_before_user_auth', 'new_pmpro_create_log');

function new_pmpro_create_log($user_id)
{
    moz_plugin_log(["pmpro user created ", $user_id]);
}

moz_plugin_log('logging working');
