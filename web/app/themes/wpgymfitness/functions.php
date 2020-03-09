<?php

// Create WP Hook that calls WP MeMENUS
function gymfitness_menus() {

  // Register the menu and Location
  register_nav_menus( array(
    "main-menu" => "Main Menu"
  ));
}
add_action('init', 'gymfitness_menus');


// Adding Custom CSS Stylesheets and JavaScript Files, and
// Hook to call CSS and JavaScript
function gymfitness_scripts() {

  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', [], '8.0.1');
  wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:100,300,400,700,900|Staatliches&display=swap', [], '1.0.1');
  wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', [], '1.0.10');
  wp_enqueue_style('style', get_stylesheet_uri(), ['normalize', 'googleFonts'], '1.0.1');

  // LOAD JAVASCRIPT FILES
  wp_enqueue_script('jquery');
  wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', ['jquery'], '1.0.10', true);
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', ['jquery', 'slicknavJS'], '1.0.1', true);

}
add_action('wp_enqueue_scripts', 'gymfitness_scripts');


// Enable "Featured Images" and Other features
// When theme is activated and ready
function gymfitness_setup() {

  // Register Image Sizes
  add_image_size('square', 350, 350, true);
  add_image_size('portrait', 350, 724, true);
  add_image_size('box', 400, 375, true);
  add_image_size('mediumSize', 700, 400, true);
  add_image_size('blog', 966, 6744, true);

  // To enable featured image support
  add_theme_support('post-thumbnails');

}
add_action('after_setup_theme', 'gymfitness_setup');


// Create Widget Zone
function gymfitness_widgets() {
  register_sidebar ([
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ]);
}
add_action('widgets_init', 'gymfitness_widgets');