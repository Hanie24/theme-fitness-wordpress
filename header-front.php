<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container header-grid">
            <div class="nav-bar">
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo gym">
                </div>
                <?php 
                    $args = array(
                        'theme_location' => 'menu-principal',
                        'container' => 'nav',
                        'container_class' => 'main-menu'
                    );
                    wp_nav_menu($args);
                ?>
            </div>
            <div class="tagline text-center">
                    <h1><?php the_field('header_hero'); ?></h1>
                    <p><?php the_field('content_hero'); ?></p>
            </div>
        </div>
    </header>
