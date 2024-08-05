<?php
/*
* Plugin Name:       Custom Post Type
* Plugin URI:        https://example.com/plugins/the-basics/
* Description:       Handle post inbound & outbound links count.
* Version:           1.0
* Author:            Rohit Kanojiya
*/

function register_custom_post_type() {
    register_post_type('custom_post', array(
        'labels' => array(
            'name'               => __('Custom Posts'),
            'singular_name'      => __('Custom Post'),
            'all_items'          => __('All Custom Posts'),
            'add_new'            => __('Add Custom Post'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
    ));
}
add_action('init', 'register_custom_post_type');

function addNewColumns($columns) {
    return array_merge($columns, array(
        'inbound_links' => __('Inbound Links'),
        'outbound_links' => __('Outbound Links')
    ));
}
add_filter('manage_custom_post_posts_columns', 'addNewColumns');

function countLinks($post_id, $type = true) {
    $post_content = get_post_field('post_content', $post_id);
    $site_url = home_url();
    $count = $type
        ? substr_count($post_content, 'href="' . $site_url)
        : substr_count($post_content, 'href="http') - substr_count($post_content, 'href="' . $site_url);
    return $count > 0 ? $count : 'No links found';
}

function displayColumnsInfo($column, $post_id) {
    switch ($column) {
        case 'inbound_links':
            echo countLinks($post_id);
            break;
        case 'outbound_links':
            echo countLinks($post_id, false);
            break;
    }
}
add_action('manage_custom_post_posts_custom_column', 'displayColumnsInfo', 10, 2);

function inbound_links_meta_box_callback($post) {
    $count = countLinks($post->ID);
    echo '<p>Inbound Links: ' . $count . '</p>';
}

function outbound_links_meta_box_callback($post) {
    $count = countLinks($post->ID, false);
    echo '<p>Outbound Links: ' . $count . '</p>';
}

function add_custom_meta_boxes() {
    add_meta_box(
        'inbound_links_meta_box',
        'Inbound Links Count',
        'inbound_links_meta_box_callback',
        'custom_post',
        'normal',
        'high'
    );

    add_meta_box(
        'outbound_links_meta_box',
        'Outbound Links Count',
        'outbound_links_meta_box_callback',
        'custom_post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');
