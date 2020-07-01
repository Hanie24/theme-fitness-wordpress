<?php

/* Consultas reutilizables */
require get_template_directory() . '/includes/queries.php';
require get_template_directory() . '/includes/shortcodes.php';

// Cuando el tema es activado
function fitness_setup() {

    // Habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    // Titulos SEO
    add_theme_support('title-tag');

    // Agregar tamaños personalizados para imagenes
    add_image_size('square', 350, 320, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('box', 400, 375, true);
    add_image_size('medium2', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}
add_action('after_setup_theme', 'fitness_setup');

// Se pueden agregar más menus dentro del array
function fitness_menus(){
    register_nav_menus(array(
        'menu-principal' => __( 'Menu Principal', 'fitness ')
    ));
}

add_action('init', 'fitness_menus');

// Scripts y styles
function fitness_scripts_styles(){
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    
    wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');

    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:ital,wght@0,400;0,700;1,900&family=Staatliches&display=swap', array(), '1.0.0');
    
    if(is_page('galeria')):
        wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.1');
    endif;

    if(is_page('contacto')):
        wp_enqueue_style('leaftletCSS', 'https://unpkg.com/leaflet@1.5.1/dist/leaflet.css', array(), '1.6.0');
    endif;

    if(is_page('inicio')):
        wp_enqueue_style('bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    endif;

    // Hoja de estilos principal
    wp_enqueue_style('styles', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');
    // Scripts
    wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);

    if(is_page('galeria')):
        wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.1', true);
    endif;

    if(is_page('contacto')):
        wp_enqueue_script('leafletJS', 'https://unpkg.com/leaflet@1.5.1/dist/leaflet.js', array(), '1.6.0', true);
    endif;

    if(is_page('inicio')):
        wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    endif;

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'fitness_scripts_styles');

/* Widgets */
function fitness_widgets(){
    register_sidebar( array(
        'name' => 'Sidebar 1',
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3'
    ));
    register_sidebar( array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3'
    ));
}
add_action('widgets_init', 'fitness_widgets');

/* IMAGEN HERO */
function fitness_hero_image() {
    
    $front_page_id = get_option('page_on_front');
    $id_image = get_field('image_hero',  $front_page_id);
    $image = wp_get_attachment_image_src($id_image, 'full')[0];

    // Style CSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $outstanding_image_css = "
        body.home .site-header {
            background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url($image) ;
        }
    ";

    wp_add_inline_style('custom', $outstanding_image_css);
}
add_action('init', 'fitness_hero_image');