<?php 


function kc_theme_enqueue_styles () {
	// enqueue parent theme stylse 
	$parent_style = 'parent_style'; // Not sure why they do this? 
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'visual-composer-starter-font' );
    wp_enqueue_style( 'slick-style' );
    wp_enqueue_style( 'visual-composer-starter-general' );
    wp_enqueue_style( 'visual-composer-starter-responsive' );
    wp_enqueue_style( 'vct-theme-fonts' );
    wp_enqueue_style('child-style', 
    	get_stylesheet_directory_uri() . '/style.css', 
    	array('parent_style', 'js_composer_front'), 
    	wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'kc_theme_enqueue_styles'); 

if ( ! function_exists('childtheme_setup')) :

    function childtheme_setup () { 

        require 'includes/Class_shortcodes.php'; 
        new KC_Shortcodes(); 

    }

endif; 
add_action('after_setup_theme', 'childtheme_setup'); 

require 'includes/template-tags.php'; 


?>
