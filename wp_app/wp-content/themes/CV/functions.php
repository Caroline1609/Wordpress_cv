<?php

function cb_cv_setup()
{
    add_theme_support('title-tag'); // Permet à WordPress de gérer le titre de la page automatiquement

    add_theme_support('post-thumbnails'); // Active le support des images à la une (featured images)

    add_image_size('custom-size', 350, 215, true); // Définit une nouvelle taille d'image personnalisée (800x600 pixels, recadrée)

    register_nav_menus(array( // Enregistre les emplacements de menus de navigation
        'menu-principal' => 'Menu de Navigation Principal',
        'footer-menu'    => 'Menu de Navigation Footer',
    ));
}

function cb_cv_custom_box(){
    add_meta_box('cv_sponso', 'Sponsoring', 'cv_rendez_sponso_box', 'post');
}

function cv_rendez_sponso_box ($post){
    echo 'salut les gens';
}




add_action('after_setup_theme', 'cb_cv_setup');
add_action('add_meta_boxes', 'cb_cv_custom_box');


