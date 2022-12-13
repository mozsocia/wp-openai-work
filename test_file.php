<?php

$json = '
{"data":{"ID":"36","user_login":"Faisal","user_pass":"$P$Bwe4LVVkpwW.5gMNEzSUjKG9Y1OKSq.","user_nicename":"faisal","user_email":"faisalakandha24@gmail.com","user_url":"","user_registered":"2022-12-10 19:27:26","user_activation_key":"1670700447:$P$B7YHxC0RTOhKggUx6V54WdW.aWHjO7.","user_status":"0","display_name":"Faisal Akandha"},"ID":36,"caps":{"edit_pages":true,"install_plugins":true,"publish_pages":true,"update_plugins":true,"upload_files":true,"activate_plugins":true,"edit_others_pages":true,"administrator":true,"pmpro_role_11":true,"pmpro_role_10":true,"pmpro_role_9":true,"pmpro_role_8":true,"pmpro_role_7":true,"pmpro_role_6":true,"pmpro_role_2":true},"cap_key":"zjr_capabilities","roles":{"7":"administrator","8":"pmpro_role_11","9":"pmpro_role_10","10":"pmpro_role_9","11":"pmpro_role_8","12":"pmpro_role_7","13":"pmpro_role_6","14":"pmpro_role_2"},"allcaps":{"switch_themes":true,"edit_themes":true,"activate_plugins":true,"edit_plugins":true,"edit_users":true,"edit_files":true,"manage_options":true,"moderate_comments":true,"manage_categories":true,"manage_links":true,"upload_files":true,"import":true,"unfiltered_html":true,"edit_posts":true,"edit_others_posts":true,"edit_published_posts":true,"publish_posts":true,"edit_pages":true,"read":true,"level_10":true,"level_9":true,"level_8":true,"level_7":true,"level_6":true,"level_5":true,"level_4":true,"level_3":true,"level_2":true,"level_1":true,"level_0":true,"edit_others_pages":true,"edit_published_pages":true,"publish_pages":true,"delete_pages":true,"delete_others_pages":true,"delete_published_pages":true,"delete_posts":true,"delete_others_posts":true,"delete_published_posts":true,"delete_private_posts":true,"edit_private_posts":true,"read_private_posts":true,"delete_private_pages":true,"edit_private_pages":true,"read_private_pages":true,"delete_users":true,"create_users":true,"unfiltered_upload":true,"edit_dashboard":true,"update_plugins":true,"delete_plugins":true,"install_plugins":true,"update_themes":true,"install_themes":true,"update_core":true,"list_users":true,"remove_users":true,"promote_users":true,"edit_theme_options":true,"delete_themes":true,"export":true,"wpcode_edit_snippets":true,"wpcode_activate_snippets":true,"frm_view_forms":true,"frm_edit_forms":true,"frm_delete_forms":true,"frm_change_settings":true,"frm_view_entries":true,"frm_delete_entries":true,"frm_create_entries":true,"frm_edit_entries":true,"frm_view_reports":true,"frm_edit_displays":true,"frm_edit_applications":true,"frm_application_dashboard":true,"fluentform_dashboard_access":true,"fluentform_forms_manager":true,"fluentform_entries_viewer":true,"fluentform_manage_entries":true,"fluentform_view_payments":true,"fluentform_manage_payments":true,"fluentform_settings_manager":true,"fluentform_full_access":true,"edit_item":true,"read_item":true,"delete_item":true,"delete_items":true,"edit_items":true,"edit_others_items":true,"publish_items":true,"read_private_items":true,"tve-use-tap":true,"ure_edit_roles":true,"ure_create_roles":true,"ure_delete_roles":true,"ure_create_capabilities":true,"ure_delete_capabilities":true,"ure_manage_options":true,"ure_reset_roles":true,"create_posts":true,"install_languages":true,"resume_plugins":true,"resume_themes":true,"view_site_health_checks":true,"edit_wbcr-snippets":true,"read_wbcr-snippets":true,"delete_wbcr-snippets":true,"edit_wbcr-snippetss":true,"edit_others_wbcr-snippetss":true,"publish_wbcr-snippetss":true,"read_private_wbcr-snippetss":true,"restrict_content":true,"list_roles":true,"create_roles":true,"delete_roles":true,"edit_roles":true,"pmpro_role_10":true,"pmpro_memberships_menu":true,"pmpro_dashboard":true,"pmpro_membershiplevels":true,"pmpro_edit_memberships":true,"pmpro_pagesettings":true,"pmpro_paymentsettings":true,"pmpro_emailsettings":true,"pmpro_emailtemplates":true,"pmpro_advancedsettings":true,"pmpro_addons":true,"pmpro_memberslist":true,"pmpro_memberslistcsv":true,"pmpro_reports":true,"pmpro_orders":true,"pmpro_orderscsv":true,"pmpro_discountcodes":true,"pmpro_userfields":true,"pmpro_updates":true,"administrator":true,"pmpro_role_11":true,"pmpro_role_9":true,"pmpro_role_8":true,"pmpro_role_7":true,"pmpro_role_6":true,"pmpro_role_2":true},"filter":null}

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
