<?php
/*
* Plugin Name:       Custom Post Type
* Plugin URI:        https://example.com/plugins/the-basics/
* Description:       Handle post inbound & outbound links count.
* Version:           1.0
* Author:            Rohit Kanojiya
*/

if (!defined('ABSPATH')) {
    die();
}

if (!defined('CIOL_PLUGIN_DIR')) {
    define('CIOL_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));
    define('CIOL_INCLUDES_PATH', untrailingslashit(plugin_dir_path(__FILE__)) . '/includes/');
}


if (!class_exists('CIOLCustomPost')) {
    require_once CIOL_INCLUDES_PATH . 'class-custom-post.php';
}

function CIOL_CustomPostInit(): CIOLCustomPost
{
    return CIOLCustomPost::getInstance();
}

CIOL_CustomPostInit();