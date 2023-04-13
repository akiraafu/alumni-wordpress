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


function alumni_features(){
    register_nav_menu( 'headerMenuLocation', 'header Menu Location' );
    add_theme_support( 'title-tag' );
}

add_action("after_setup_theme", 'alumni_features' );