<?php

function alumni_files(){

    wp_enqueue_script( 'alumni_main_js',get_theme_file_uri( '/js/bootstrap.js'), NULL, microtime(), true);
      
    wp_enqueue_style( 'alumni_main_style', get_template_directory_uri() . '/css/styles.css',false, microtime(),'all');

    wp_enqueue_style('style',  get_stylesheet_uri(  ), NULL, microtime());
    
    wp_enqueue_style( 'custom-google-fonts','//fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    
    wp_enqueue_style( 'box-icon','//unpkg.com/boxicons@2.1.4/css/boxicons.min.css');


}
add_action( "wp_enqueue_scripts", 'alumni_files' );



// add custom class on every page body tag except the homepage

function custom_class( $classes ) {
    if (!is_front_page()) {
        $classes[] = 'sub-page';
    }
    return $classes;
}
add_filter( 'body_class', 'custom_class' );

//add menu
function alumni_features(){
    register_nav_menu( 'headerMenuLocation', 'header Menu Location' );
    add_theme_support( 'title-tag' );
}

add_action("after_setup_theme", 'alumni_features' );


//add thumbnails
function my_theme_setup(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');


//add new post type
function alumni_post_types(){
    register_post_type( 'event', array(
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'events'),
        'has_archive'=> true,
        'public' => true,
        'menu_icon' => 'dashicons-calendar',
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items'=> 'All Events',
            'singular_name' => 'Event'
        )
    ));

    register_post_type( 'job', array(
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'jobs'),
        'has_archive'=> true,
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'labels' => array(
            'name' => 'Jobs',
            'add_new_item' => 'Add New Job',
            'edit_item' => 'Edit Job',
            'all_items'=> 'All Jobs',
            'singular_name' => 'Job'
        )
    ));
}

add_action('init', 'alumni_post_types' );


// Manipulate Default URL Based Queries
function alumni_adjust_queries($query){
   
    if(!is_admin(  ) AND is_post_type_archive( 'event' ) AND $query -> is_main_query( )){
        $today = date('Ymd');
        $query -> set('meta_key', "event_date");
        $query -> set('orderby', "meta_value_num");
        $query -> set('order', "DESC");
        $query -> set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        ));
    }

}
add_action( 'pre_get_posts','alumni_adjust_queries' );


//post time

function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');

}


function get_first_image_from_post_content($post_content) {
    preg_match('/<img.+?src="(.+?)"/', $post_content, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    }
    return '';
}



 //*********Building a widget**********

 function alumni_widget_init() {
	
	register_sidebar( array(
		'name'=> 'Akira Widget',
		'id' => 'my_new_widget_area',
		'before_widget' => '<div class="widget-area" >',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	
	));
}

add_action( 'widgets_init','alumni_widget_init');