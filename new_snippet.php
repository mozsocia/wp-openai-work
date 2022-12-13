<?php

function pmpro_hasMembershipLevel()
{

}

// before craeting a user add meta data
add_action('pmpro_checkout_before_user_auth', 'new_pmpro_create_log');

function new_pmpro_create_log($user_id)
{
    $userdetails = get_userdata($user_id);

    if (!empty($userdetails->roles) && is_array($userdetails->roles)) {
        // Loop through the user's roles
        foreach ($userdetails->roles as $role) {
            if ($role == "pmpro_role_2") {
                add_user_meta($user_id, "word_count", 20000);
            }

            if ($role == "pmpro_role_6") {
                add_user_meta($user_id, "word_count", 240000);
            }

            if ($role == "pmpro_role_7") {
                add_user_meta($user_id, "word_count", 60000);
            }

            if ($role == "pmpro_role_8") {
                add_user_meta($user_id, "word_count", 600000);
            }

            if ($role == "pmpro_role_9") {
                add_user_meta($user_id, "word_count", 100000);
            }

            if ($role == "pmpro_role_10") {
                add_user_meta($user_id, "word_count", 1000000);
            }

            if ($role == "pmpro_role_11") {
                add_user_meta($user_id, "word_count", 300000);
            }
            if ($role == "pmpro_role_12") {
                add_user_meta($user_id, "word_count", 3000000);
            }

        }
    }

    moz_plugin_log(["pmpro user created ", $user_id]);

}

// use the form submission that has paid memebership pro level with checking count

if (isset($_POST['ajax']) && isset($_POST['wow'])) {
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

    $current_user_id = get_current_user_id();

    $userdetails = get_userdata($current_user_id);

    $has_membership = false;

    if (!empty($userdetails->roles) && is_array($userdetails->roles)) {
        foreach ($userdetails->roles as $user_role) {
            foreach ($allowed_roles as $allowed_role) {
                if ($user_role == $allowed_role) {
                    $has_membership = true;
                }
            }
        }

    }

    if ($has_membership) {

        $wow = $_POST['wow'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.openai.com/v1/completions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{"model": "text-davinci-003", "prompt": "' . $wow . '", "max_tokens": 3999, "temperature": 0.5}',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer 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",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        $textRespose = $response['choices'][0]['text'];
        $text_word_count = strlen($textRespose);

        $current_word_count = get_user_meta($current_user_id, "word_count");

        $remain_word_count = $current_word_count;

        if ($current_word_count > $text_word_count) {
            $remain_word_count = $current_word_count - $text_word_count;
            update_user_meta($current_user_id, "word_count", $remain_word_count, $current_word_count);

            // now send response
            echo $response['choices'][0]['text'];
        } else {
            echo " your word count is not enough ";
        }

        exit;
    }

}
