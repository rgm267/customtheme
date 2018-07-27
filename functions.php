<?php

function customScriptEnqueue(){

    wp_enqueue_style('app-style', get_template_directory_uri() . '/dist/css/app.css', [], '1.0.0', 'all');

}

add_action('wp_enqueue_scripts', 'customScriptEnqueue');