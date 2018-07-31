<?php

function custom_script_enqueue()
{
    wp_enqueue_style('app-style', get_template_directory_uri() . '/dist/css/app.css', [], '1.0.0', 'all');

    wp_enqueue_style('theme-styles', get_stylesheet_uri()); // This is where you enqueue your theme's main stylesheet
    $custom_css = theme_get_customizer_css();
    wp_add_inline_style('theme-styles', $custom_css);
}

function custom_theme_setup()
{
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');

    /* admin panel */
    if (is_user_logged_in())
        show_admin_bar(true);
}

function theme_customize_register($wp_customize)
{
    // Background color
    $wp_customize->add_setting('background_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'section' => 'colors',
        'label' => esc_html__('Background Color', 'theme'),
    )));

    // Text color
    $wp_customize->add_setting('text_color', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'section' => 'colors',
        'label' => esc_html__('Text color', 'theme'),
    )));

    // Link color
    $wp_customize->add_setting('link_color', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'section' => 'colors',
        'label' => esc_html__('Link color', 'theme'),
    )));

    // Accent color
    $wp_customize->add_setting('accent_color', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'section' => 'colors',
        'label' => esc_html__('Accent color', 'theme'),
    )));
}

function theme_get_customizer_css()
{
    ob_start();

    $text_color = get_theme_mod('text_color', '#333');
    if (!empty($text_color)) {
        ?>
        body {
        color: <?php echo $text_color; ?>;
        }
        <?php
    }

    $css = ob_get_clean();
    return $css;
}

add_action('wp_enqueue_scripts', 'custom_script_enqueue');

add_action('init', 'custom_theme_setup');

add_action('customize_register', 'theme_customize_register');