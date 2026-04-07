<?php
if (! defined('ABSPATH')) {
    exit;
}

function plx_parallax_sanitize_font_choice($value) {
    $choices = array_keys(plx_parallax_get_font_choices());
    return in_array($value, $choices, true) ? $value : 'Space Grotesk';
}

function plx_parallax_sanitize_color_mode($value) {
    return in_array($value, array('light', 'auto', 'dark'), true) ? $value : 'auto';
}

function plx_parallax_sanitize_checkbox($value) {
    return (bool) $value;
}

function plx_parallax_sanitize_float($value) {
    $value = (float) $value;
    if ($value < 0) {
        $value = 0;
    }
    if ($value > 1) {
        $value = 1;
    }
    return $value;
}

function plx_parallax_customize_register($wp_customize) {
    $wp_customize->add_panel('plx_theme_options', array(
        'title'    => __('PLX Theme Options', 'plx-parallax'),
        'priority' => 30,
    ));

    $wp_customize->add_section('plx_hero_section', array(
        'title' => __('Hero', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    $wp_customize->add_setting('plx_eyebrow_text', array(
        'default'           => __('Parallax WordPress Theme', 'plx-parallax'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_eyebrow_text', array(
        'label'   => __('Eyebrow Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_hero_title', array(
        'default'           => __('Build depth into every scroll.', 'plx-parallax'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_hero_title', array(
        'label'   => __('Hero Title', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_hero_text', array(
        'default'           => __('A sharp, responsive theme with flexible gradients, background imagery, typography controls, and motion tuned for both desktop and mobile.', 'plx-parallax'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('plx_hero_text', array(
        'label'   => __('Hero Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('plx_primary_button_text', array(
        'default'           => __('Explore the layout', 'plx-parallax'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_primary_button_text', array(
        'label'   => __('Primary Button Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_primary_button_url', array(
        'default'           => '#content',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('plx_primary_button_url', array(
        'label'   => __('Primary Button URL', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('plx_secondary_button_text', array(
        'default'           => __('Read the latest posts', 'plx-parallax'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_secondary_button_text', array(
        'label'   => __('Secondary Button Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_secondary_button_url', array(
        'default'           => '/blog',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('plx_secondary_button_url', array(
        'label'   => __('Secondary Button URL', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('plx_hero_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'plx_hero_image', array(
        'label'   => __('Hero Background Image', 'plx-parallax'),
        'section' => 'plx_hero_section',
    )));

    $wp_customize->add_setting('plx_panel_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'plx_panel_image', array(
        'label'   => __('Intro Panel Image', 'plx-parallax'),
        'section' => 'plx_hero_section',
    )));

    $wp_customize->add_section('plx_style_section', array(
        'title' => __('Appearance', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    $wp_customize->add_setting('plx_color_mode', array(
        'default'           => 'auto',
        'sanitize_callback' => 'plx_parallax_sanitize_color_mode',
    ));
    $wp_customize->add_control('plx_color_mode', array(
        'label'   => __('Color Mode', 'plx-parallax'),
        'section' => 'plx_style_section',
        'type'    => 'select',
        'choices' => array(
            'light' => __('Light', 'plx-parallax'),
            'auto'  => __('Auto', 'plx-parallax'),
            'dark'  => __('Dark', 'plx-parallax'),
        ),
    ));

    foreach (array(
        'plx_primary_color'      => array(__('Primary Color', 'plx-parallax'), '#0f172a'),
        'plx_secondary_color'    => array(__('Accent Color', 'plx-parallax'), '#f97316'),
        'plx_surface_color'      => array(__('Surface Color', 'plx-parallax'), '#fff6eb'),
        'plx_text_color'         => array(__('Text Color', 'plx-parallax'), '#0f172a'),
        'plx_text_inverse_color' => array(__('Inverse Text Color', 'plx-parallax'), '#f8fafc'),
        'plx_gradient_color_1'   => array(__('Gradient Color 1', 'plx-parallax'), '#0f172a'),
        'plx_gradient_color_2'   => array(__('Gradient Color 2', 'plx-parallax'), '#1d4ed8'),
        'plx_gradient_color_3'   => array(__('Gradient Color 3', 'plx-parallax'), '#f97316'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => $config[1],
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label'   => $config[0],
            'section' => 'plx_style_section',
        )));
    }

    $wp_customize->add_section('plx_dark_style_section', array(
        'title' => __('Dark Mode Colors', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    foreach (array(
        'plx_dark_primary_color'      => array(__('Dark Primary Color', 'plx-parallax'), '#020617'),
        'plx_dark_secondary_color'    => array(__('Dark Accent Color', 'plx-parallax'), '#fb923c'),
        'plx_dark_surface_color'      => array(__('Dark Surface Color', 'plx-parallax'), '#0f172a'),
        'plx_dark_text_color'         => array(__('Dark Text Color', 'plx-parallax'), '#e5eefb'),
        'plx_dark_text_inverse_color' => array(__('Dark Inverse Text Color', 'plx-parallax'), '#f8fafc'),
        'plx_dark_gradient_color_1'   => array(__('Dark Gradient Color 1', 'plx-parallax'), '#020617'),
        'plx_dark_gradient_color_2'   => array(__('Dark Gradient Color 2', 'plx-parallax'), '#0f3a8a'),
        'plx_dark_gradient_color_3'   => array(__('Dark Gradient Color 3', 'plx-parallax'), '#ea580c'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => $config[1],
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label'   => $config[0],
            'section' => 'plx_dark_style_section',
        )));
    }

    $wp_customize->add_setting('plx_dark_overlay_opacity', array(
        'default'           => 0.58,
        'sanitize_callback' => 'plx_parallax_sanitize_float',
    ));
    $wp_customize->add_control('plx_dark_overlay_opacity', array(
        'label'       => __('Dark Hero Overlay Opacity', 'plx-parallax'),
        'section'     => 'plx_dark_style_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.05,
        ),
    ));

    $wp_customize->add_setting('plx_font_family', array(
        'default'           => 'Space Grotesk',
        'sanitize_callback' => 'plx_parallax_sanitize_font_choice',
    ));
    $wp_customize->add_control('plx_font_family', array(
        'label'   => __('Google Font', 'plx-parallax'),
        'section' => 'plx_style_section',
        'type'    => 'select',
        'choices' => array_combine(array_keys(plx_parallax_get_font_choices()), array_keys(plx_parallax_get_font_choices())),
    ));

    $wp_customize->add_setting('plx_gradient_angle', array(
        'default'           => 132,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('plx_gradient_angle', array(
        'label'       => __('Gradient Angle', 'plx-parallax'),
        'section'     => 'plx_style_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 0,
            'max' => 360,
        ),
    ));

    $wp_customize->add_setting('plx_overlay_opacity', array(
        'default'           => 0.45,
        'sanitize_callback' => 'plx_parallax_sanitize_float',
    ));
    $wp_customize->add_control('plx_overlay_opacity', array(
        'label'       => __('Hero Overlay Opacity', 'plx-parallax'),
        'section'     => 'plx_style_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.05,
        ),
    ));

    $wp_customize->add_section('plx_behavior_section', array(
        'title' => __('Behavior', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    foreach (array(
        'plx_enable_parallax'         => array(__('Enable Parallax', 'plx-parallax'), true),
        'plx_disable_mobile_parallax' => array(__('Disable Parallax on Mobile', 'plx-parallax'), true),
        'plx_sticky_header'           => array(__('Sticky Header', 'plx-parallax'), true),
        'plx_smooth_scroll'           => array(__('Smooth Scroll', 'plx-parallax'), true),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => $config[1],
            'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
        ));
        $wp_customize->add_control($setting, array(
            'label'   => $config[0],
            'section' => 'plx_behavior_section',
            'type'    => 'checkbox',
        ));
    }

    $wp_customize->add_setting('plx_parallax_speed', array(
        'default'           => 0.24,
        'sanitize_callback' => 'plx_parallax_sanitize_float',
    ));
    $wp_customize->add_control('plx_parallax_speed', array(
        'label'       => __('Parallax Speed', 'plx-parallax'),
        'section'     => 'plx_behavior_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.02,
        ),
    ));

    $wp_customize->add_setting('plx_content_width', array(
        'default'           => 1180,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('plx_content_width', array(
        'label'       => __('Content Width', 'plx-parallax'),
        'section'     => 'plx_behavior_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1440,
            'step' => 10,
        ),
    ));
}
add_action('customize_register', 'plx_parallax_customize_register');
