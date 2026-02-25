<?php

function cb_cv_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    
    register_nav_menus(array(
        'menu-principal' => 'Menu de Navigation Principal',
    ));
    register_nav_menu('footer-menu', 'Menu de Navigation Footer');
    add_image_size('custom-size', 800, 600, true);
}

add_action('after_setup_theme', 'cb_cv_support');



function cb_add_thumbnails()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'cb_add_thumbnails');

function navbar_setup()
{
    add_theme_support('title-tag');
    register_nav_menus(array(
        'menu-principal' => 'Menu de Navigation Principal',
    ));
}
add_action('init', 'navbar_setup');
