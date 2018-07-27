<?php

function customScriptEnqueue(){
    wp_enqueue_style('app-style', get_template_directory_uri() . '/dist/css/app.css', [], '1.0.0', 'all');
}

function customThemeSetup(){
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
}

add_action('wp_enqueue_scripts', 'customScriptEnqueue');

add_action('init', 'customThemeSetup');