<?php

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
