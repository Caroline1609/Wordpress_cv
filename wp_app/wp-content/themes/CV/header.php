<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="">
        <h1><?php the_title(); // affichage du titre ?></h1>
        <nav class="container_nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-principal',
                'container' => false,
                'menu_class' => 'navbar',
                'fallback_cb' => false,
            ));
            ?>
        </nav>
    </header>



    <main>
        <!-- FIN HEADER -->