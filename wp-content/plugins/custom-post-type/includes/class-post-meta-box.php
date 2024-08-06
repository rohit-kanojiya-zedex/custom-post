<?php

class CIOLPostMetaBox
{
    protected static $instance;

    public function __construct()
    {
        add_filter('manage_custom_post_posts_columns', [$this, 'CIOL_addNewColumns']);
        add_action('manage_custom_post_posts_custom_column', [$this, 'CIOL_displayColumnsInfo'], 10, 2);
        add_action('add_meta_boxes', [$this, 'CIOL_addCustoMetaBoxes']);
    }

    public function CIOL_addNewColumns($columns)
    {
        return array_merge($columns,[
            'inbound_links' => __('Inbound Links'),
            'outbound_links' => __('Outbound Links')
        ]);
    }

    public function CIOL_displayColumnsInfo($column, $post_id)
    {
        if ($column === 'inbound_links') {
            echo self::CIOL_countPostLinks($post_id);
        } elseif ($column === 'outbound_links') {
            echo self::CIOL_countPostLinks($post_id, false);
        }
    }

    public static function CIOL_countPostLinks($post_id, $type = true)
    {
        $post_content = get_post_field('post_content', $post_id);
        $site_url = home_url();
        $count = $type
            ? substr_count($post_content, 'href="' . $site_url)
            : substr_count($post_content, 'href="http') - substr_count($post_content, 'href="' . $site_url);

        return $count > 0 ? $count : 'No links found';
    }

    public function CIOL_countInboundMetaBoxLinks($post)
    {
        $count = self::CIOL_countPostLinks($post->ID);
        echo '<p>Inbound Links: ' . $count . '</p>';
    }

    public function CIOL_countOutboundMetaBoxLinks($post)
    {
        $count = self::CIOL_countPostLinks($post->ID, false);
        echo '<p>Outbound Links: ' . $count . '</p>';
    }

    public function CIOL_addCustoMetaBoxes()
    {
        add_meta_box(
            'inbound_links_meta_box',
            'Inbound Links Count',
            [$this, 'CIOL_countInboundMetaBoxLinks'],
            'custom_post',
            'normal',
            'high'
        );

        add_meta_box(
            'outbound_links_meta_box',
            'Outbound Links Count',
            [$this, 'CIOL_countOutboundMetaBoxLinks'],
            'custom_post',
            'normal',
            'high'
        );
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}
