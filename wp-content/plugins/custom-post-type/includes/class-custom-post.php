<?php

class CIOLCustomPost{
    protected static $instance;
    protected  $instanceOfMetaBox;

     public function __construct(){
         add_action( 'init', [ $this, 'initialize' ]);
         add_action('init', [$this,'CIOL_registerCustomePost']);
    }

    public function CIOL_registerCustomePost(){
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

    public static function getInstance() {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function initialize() {
        $this->includes();
        $this->init();
    }

    public function includes() {
        include_once CIOL_INCLUDES_PATH . 'class-post-meta-box.php';
    }

    public function init() {
        $this->instanceOfMetaBox= CIOLPostMetaBox::getInstance();
    }

}
