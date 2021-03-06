<?php

// Link to the query files
require get_template_directory() . '/inc/queries.php';

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
  // Lightbox CSS
  if(basename( get_page_template() ) === 'gallery.php') :
    wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', [], '2.11.1');
  endif;

  // BX Slider CSS
  if(is_front_page()) :
    wp_enqueue_style('bxsliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', [], '4.2.12');
  endif;

  wp_enqueue_style('style', get_stylesheet_uri(), ['normalize', 'googleFonts'], '1.0.1');



  // LOAD JAVASCRIPT FILES
  wp_enqueue_script('jquery');
  wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', ['jquery'], '1.0.10', true);
  // LightboxJS
  if(basename( get_page_template() ) === 'gallery.php') :
    wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', ['jquery'], '2.11.1', true);
  endif;
  // BX Slider JS
  if(is_front_page()) :
    wp_enqueue_script('bxsliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', ['jquery'], '4.2.12', true);
  endif;
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

  // Adds SEO friendly Title to each page
  add_theme_support('title-tag');

}
add_action('after_setup_theme', 'gymfitness_setup');


// Create Widget Zone
function gymfitness_widgets() {
  register_sidebar ([
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="text-primary">',
    'after_title' => '</h3>',
  ]);
}
add_action('widgets_init', 'gymfitness_widgets');

// Displays background image on front-page.php
function gymfitness_hero_image() {
  $front_page_id = get_option('page_on_front');
  $image_id = get_field('hero_image', $front_page_id);
  
  $image = $image_id['url'];

  // Create a "FALSE" Stylesheet
  wp_register_style('custom', false);
  wp_enqueue_style('custom');

  $featured_image_css = "
    body.home .site-header {
      background-size: cover;
      background-image: 
      linear-gradient(
        rgba(0, 0, 0, .75),
        rgba(0, 0, 0, .75)
      ),
      url( $image );
    }
  ";
  wp_add_inline_style('custom', $featured_image_css);

}
add_action('init', 'gymfitness_hero_image');