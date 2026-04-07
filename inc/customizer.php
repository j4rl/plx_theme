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

function plx_parallax_sanitize_recent_posts_count($value) {
    $value = absint($value);
    if ($value < 1) {
        $value = 1;
    }
    if ($value > 6) {
        $value = 6;
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
        'default'           => plx_parallax_get_default('plx_eyebrow_text'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_eyebrow_text', array(
        'label'   => __('Eyebrow Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_hero_title', array(
        'default'           => plx_parallax_get_default('plx_hero_title'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_hero_title', array(
        'label'   => __('Hero Title', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_hero_text', array(
        'default'           => plx_parallax_get_default('plx_hero_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('plx_hero_text', array(
        'label'   => __('Hero Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('plx_primary_button_text', array(
        'default'           => plx_parallax_get_default('plx_primary_button_text'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_primary_button_text', array(
        'label'   => __('Primary Button Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_primary_button_url', array(
        'default'           => plx_parallax_get_default('plx_primary_button_url'),
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('plx_primary_button_url', array(
        'label'   => __('Primary Button URL', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('plx_secondary_button_text', array(
        'default'           => plx_parallax_get_default('plx_secondary_button_text'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_secondary_button_text', array(
        'label'   => __('Secondary Button Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_secondary_button_url', array(
        'default'           => plx_parallax_get_default('plx_secondary_button_url'),
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

    $wp_customize->add_section('plx_content_section', array(
        'title' => __('Editable Elements', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    $wp_customize->add_setting('plx_profile_title', array(
        'default'           => plx_parallax_get_default('plx_profile_title'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_profile_title', array(
        'label'   => __('Profile Card Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    foreach (array(1, 2, 3, 4) as $index) {
        $wp_customize->add_setting('plx_stat_' . $index . '_title', array(
            'default'           => plx_parallax_get_default('plx_stat_' . $index . '_title'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('plx_stat_' . $index . '_title', array(
            'label'   => sprintf(__('Stat %d Title', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting('plx_stat_' . $index . '_text', array(
            'default'           => plx_parallax_get_default('plx_stat_' . $index . '_text'),
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control('plx_stat_' . $index . '_text', array(
            'label'   => sprintf(__('Stat %d Text', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'textarea',
        ));
    }

    $wp_customize->add_setting('plx_show_intro_section', array(
        'default'           => plx_parallax_get_default('plx_show_intro_section'),
        'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
    ));
    $wp_customize->add_control('plx_show_intro_section', array(
        'label'   => __('Show Intro Section', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('plx_intro_title', array(
        'default'           => plx_parallax_get_default('plx_intro_title'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_intro_title', array(
        'label'   => __('Intro Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_intro_text', array(
        'default'           => plx_parallax_get_default('plx_intro_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('plx_intro_text', array(
        'label'   => __('Intro Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'textarea',
    ));

    foreach (array(1, 2, 3) as $index) {
        $wp_customize->add_setting('plx_feature_' . $index . '_title', array(
            'default'           => plx_parallax_get_default('plx_feature_' . $index . '_title'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('plx_feature_' . $index . '_title', array(
            'label'   => sprintf(__('Feature %d Title', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting('plx_feature_' . $index . '_text', array(
            'default'           => plx_parallax_get_default('plx_feature_' . $index . '_text'),
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control('plx_feature_' . $index . '_text', array(
            'label'   => sprintf(__('Feature %d Text', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'textarea',
        ));
    }

    $wp_customize->add_setting('plx_empty_content_title', array(
        'default'           => plx_parallax_get_default('plx_empty_content_title'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_empty_content_title', array(
        'label'   => __('Empty Content Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_empty_content_text', array(
        'default'           => plx_parallax_get_default('plx_empty_content_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('plx_empty_content_text', array(
        'label'   => __('Empty Content Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('plx_show_recent_posts', array(
        'default'           => plx_parallax_get_default('plx_show_recent_posts'),
        'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
    ));
    $wp_customize->add_control('plx_show_recent_posts', array(
        'label'   => __('Show Recent Posts Section', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('plx_recent_posts_title', array(
        'default'           => plx_parallax_get_default('plx_recent_posts_title'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_recent_posts_title', array(
        'label'   => __('Recent Posts Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_recent_posts_count', array(
        'default'           => plx_parallax_get_default('plx_recent_posts_count'),
        'sanitize_callback' => 'plx_parallax_sanitize_recent_posts_count',
    ));
    $wp_customize->add_control('plx_recent_posts_count', array(
        'label'       => __('Recent Posts Count', 'plx-parallax'),
        'section'     => 'plx_content_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 6,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('plx_footer_tagline', array(
        'default'           => plx_parallax_get_default('plx_footer_tagline'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('plx_footer_tagline', array(
        'label'   => __('Footer Tagline', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_section('plx_style_section', array(
        'title' => __('Appearance', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    $wp_customize->add_setting('plx_color_mode', array(
        'default'           => plx_parallax_get_default('plx_color_mode'),
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
        'plx_primary_color'      => __('Primary Color', 'plx-parallax'),
        'plx_secondary_color'    => __('Accent Color', 'plx-parallax'),
        'plx_surface_color'      => __('Surface Color', 'plx-parallax'),
        'plx_text_color'         => __('Text Color', 'plx-parallax'),
        'plx_text_inverse_color' => __('Inverse Text Color', 'plx-parallax'),
        'plx_gradient_color_1'   => __('Gradient Color 1', 'plx-parallax'),
        'plx_gradient_color_2'   => __('Gradient Color 2', 'plx-parallax'),
        'plx_gradient_color_3'   => __('Gradient Color 3', 'plx-parallax'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => plx_parallax_get_default($setting),
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label'   => $config,
            'section' => 'plx_style_section',
        )));
    }

    $wp_customize->add_section('plx_dark_style_section', array(
        'title' => __('Dark Mode Colors', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    foreach (array(
        'plx_dark_primary_color'      => __('Dark Primary Color', 'plx-parallax'),
        'plx_dark_secondary_color'    => __('Dark Accent Color', 'plx-parallax'),
        'plx_dark_surface_color'      => __('Dark Surface Color', 'plx-parallax'),
        'plx_dark_text_color'         => __('Dark Text Color', 'plx-parallax'),
        'plx_dark_text_inverse_color' => __('Dark Inverse Text Color', 'plx-parallax'),
        'plx_dark_gradient_color_1'   => __('Dark Gradient Color 1', 'plx-parallax'),
        'plx_dark_gradient_color_2'   => __('Dark Gradient Color 2', 'plx-parallax'),
        'plx_dark_gradient_color_3'   => __('Dark Gradient Color 3', 'plx-parallax'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => plx_parallax_get_default($setting),
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label'   => $config,
            'section' => 'plx_dark_style_section',
        )));
    }

    $wp_customize->add_setting('plx_dark_overlay_opacity', array(
        'default'           => plx_parallax_get_default('plx_dark_overlay_opacity'),
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
        'default'           => plx_parallax_get_default('plx_font_family'),
        'sanitize_callback' => 'plx_parallax_sanitize_font_choice',
    ));
    $wp_customize->add_control('plx_font_family', array(
        'label'   => __('Google Font', 'plx-parallax'),
        'section' => 'plx_style_section',
        'type'    => 'select',
        'choices' => array_combine(array_keys(plx_parallax_get_font_choices()), array_keys(plx_parallax_get_font_choices())),
    ));

    $wp_customize->add_setting('plx_gradient_angle', array(
        'default'           => plx_parallax_get_default('plx_gradient_angle'),
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
        'default'           => plx_parallax_get_default('plx_overlay_opacity'),
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
        'plx_enable_parallax'         => __('Enable Parallax', 'plx-parallax'),
        'plx_disable_mobile_parallax' => __('Disable Parallax on Mobile', 'plx-parallax'),
        'plx_sticky_header'           => __('Sticky Header', 'plx-parallax'),
        'plx_smooth_scroll'           => __('Smooth Scroll', 'plx-parallax'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => plx_parallax_get_default($setting),
            'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
        ));
        $wp_customize->add_control($setting, array(
            'label'   => $config,
            'section' => 'plx_behavior_section',
            'type'    => 'checkbox',
        ));
    }

    $wp_customize->add_setting('plx_parallax_speed', array(
        'default'           => plx_parallax_get_default('plx_parallax_speed'),
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
        'default'           => plx_parallax_get_default('plx_content_width'),
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
