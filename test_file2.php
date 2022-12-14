<?php
function add_user_meta($one, $two, $thee)
{
    print_r($one);
    print_r($two);
    print_r($thee);
    print_r("===============");

}

function pmpro_after_change_membership_level_callback($level_id)
{

    $user_ID = 52;

    $membershipLevel_ids = [2, 6, 7, 8, 9, 10, 11, 12];
    if ($user_ID != 0) {

        // Loop through the user's roles
        foreach ($membershipLevel_ids as $Membership_id) {

            if ($Membership_id === (int) $level_id) {

                print_r("match");
            }

        }

        // moz_plugin_log(["pmpro user created ", $user_ID]);
    }
}

pmpro_after_change_membership_level_callback("2");
