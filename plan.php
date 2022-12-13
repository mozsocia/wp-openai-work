<?php

$membershipPlans = [
    [
        "Membership" => "Monthly $9.99",
        "user_role" => "pmpro_role_2",
        "word_count" => 20000,
    ],
    [
        "Membership" => "Monthly $9.99 annual",
        "user_role" => "pmpro_role_6",
        "word_count" => 240000,
    ],
    [
        "Membership" => "Monthly $19.99",
        "user_role" => "pmpro_role_7",
        "word_count" => 60000,
    ],
    [
        "Membership" => "Monthly $19.99 annual",
        "user_role" => "pmpro_role_8",
        "word_count" => 600000,
    ],
    [
        "Membership" => "Monthly $29.99",
        "user_role" => "pmpro_role_9",
        "word_count" => 100000,
    ],
    [
        "Membership" => "Monthly $29.99 annual",
        "user_role" => "pmpro_role_10",
        "word_count" => 1000000,
    ],
    [
        "Membership" => "Monthly $49.99",
        "user_role" => "pmpro_role_11",
        "word_count" => 300000,
    ],
    [
        "Membership" => "Monthly $49.99 annual",
        "user_role" => "pmpro_role_12",
        "word_count" => 3000000,
    ],
];

foreach ($membershipPlans as $plan) {
    echo $plan["user_role"] . " " . $plan["word_count"] . "\n";
}
