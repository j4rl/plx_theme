<?php
if (! defined('ABSPATH')) {
    exit;
}

require get_template_directory() . '/inc/customizer.php';

function plx_parallax_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'plx-parallax'),
    ));
}
add_action('after_setup_theme', 'plx_parallax_theme_setup');

function plx_parallax_get_font_choices() {
    return array(
        'Space Grotesk'      => 'Space+Grotesk:wght@300;400;500;700',
        'Manrope'            => 'Manrope:wght@300;400;500;700;800',
        'DM Sans'            => 'DM+Sans:wght@300;400;500;700',
        'Plus Jakarta Sans'  => 'Plus+Jakarta+Sans:wght@300;400;500;700;800',
        'Outfit'             => 'Outfit:wght@300;400;500;600;700',
        'Cormorant Garamond' => 'Cormorant+Garamond:wght@400;500;600;700',
    );
}

function plx_parallax_get_color_mode() {
    $mode = get_theme_mod('plx_color_mode', 'auto');
    return in_array($mode, array('light', 'auto', 'dark'), true) ? $mode : 'auto';
}

function plx_parallax_build_css_vars($selector, $vars) {
    $css = $selector . '{';

    foreach ($vars as $name => $value) {
        if ($value === '') {
            continue;
        }

        $css .= $name . ':' . $value . ';';
    }

    return $css . '}';
}

function plx_parallax_enqueue_assets() {
    $version = wp_get_theme()->get('Version');
    $font    = get_theme_mod('plx_font_family', 'Space Grotesk');
    $fonts   = plx_parallax_get_font_choices();

    if (isset($fonts[$font])) {
        wp_enqueue_style(
            'plx-parallax-font',
            'https://fonts.googleapis.com/css2?family=' . $fonts[$font] . '&display=swap',
            array(),
            null
        );
    }

    wp_enqueue_style('plx-parallax-style', get_stylesheet_uri(), array(), $version);
    wp_enqueue_script(
        'plx-parallax-script',
        get_template_directory_uri() . '/assets/js/theme.js',
        array(),
        $version,
        true
    );

    wp_localize_script('plx-parallax-script', 'plxTheme', array(
        'parallaxEnabled' => (bool) get_theme_mod('plx_enable_parallax', true),
        'disableMobile'   => (bool) get_theme_mod('plx_disable_mobile_parallax', true),
        'speed'           => (float) get_theme_mod('plx_parallax_speed', 0.24),
        'stickyHeader'    => (bool) get_theme_mod('plx_sticky_header', true),
        'smoothScroll'    => (bool) get_theme_mod('plx_smooth_scroll', true),
        'colorMode'       => plx_parallax_get_color_mode(),
    ));

    $hero_image  = get_theme_mod('plx_hero_image');
    $panel_image = get_theme_mod('plx_panel_image');
    $shared_vars = array(
        '--plx-content-width'   => absint(get_theme_mod('plx_content_width', 1180)) . 'px',
        '--plx-font-family'     => '"' . esc_html($font) . '",sans-serif',
        '--plx-hero-image'      => $hero_image ? 'url("' . esc_url_raw($hero_image) . '")' : 'none',
        '--plx-panel-image'     => $panel_image ? 'url("' . esc_url_raw($panel_image) . '")' : 'none',
        '--plx-gradient-angle'  => absint(get_theme_mod('plx_gradient_angle', 132)) . 'deg',
    );

    $light_vars = array(
        '--plx-primary'             => get_theme_mod('plx_primary_color', '#0f172a'),
        '--plx-secondary'           => get_theme_mod('plx_secondary_color', '#f97316'),
        '--plx-surface'             => get_theme_mod('plx_surface_color', '#fff6eb'),
        '--plx-text'                => get_theme_mod('plx_text_color', '#0f172a'),
        '--plx-text-inverse'        => get_theme_mod('plx_text_inverse_color', '#f8fafc'),
        '--plx-grad-1'              => get_theme_mod('plx_gradient_color_1', '#0f172a'),
        '--plx-grad-2'              => get_theme_mod('plx_gradient_color_2', '#1d4ed8'),
        '--plx-grad-3'              => get_theme_mod('plx_gradient_color_3', '#f97316'),
        '--plx-hero-overlay'        => 'rgba(15,23,42,' . number_format((float) get_theme_mod('plx_overlay_opacity', 0.45), 2, '.', '') . ')',
        '--plx-page-bg'             => '#f7f3ed',
        '--plx-page-glow-1'         => 'rgba(249, 115, 22, 0.22)',
        '--plx-page-glow-2'         => 'rgba(29, 78, 216, 0.16)',
        '--plx-header-bg'           => 'rgba(15, 23, 42, 0.68)',
        '--plx-header-shadow'       => '0 8px 40px rgba(15, 23, 42, 0.18)',
        '--plx-card-bg'             => 'rgba(15, 23, 42, 0.28)',
        '--plx-card-border'         => 'rgba(248, 250, 252, 0.18)',
        '--plx-panel-bg'            => 'rgba(255, 246, 235, 0.86)',
        '--plx-panel-border'        => 'rgba(15, 23, 42, 0.08)',
        '--plx-feature-bg'          => 'rgba(255, 255, 255, 0.72)',
        '--plx-post-bg'             => 'rgba(255, 255, 255, 0.86)',
        '--plx-muted-text'          => 'rgba(15, 23, 42, 0.54)',
        '--plx-inverse-muted'       => 'rgba(248, 250, 252, 0.76)',
        '--plx-hero-chip-bg'        => 'rgba(248, 250, 252, 0.12)',
        '--plx-hero-chip-border'    => 'rgba(248, 250, 252, 0.30)',
        '--plx-button-primary-bg'   => '#fff7ed',
        '--plx-button-primary-text' => '#0f172a',
        '--plx-ghost-bg'            => 'rgba(248, 250, 252, 0.08)',
        '--plx-ghost-border'        => 'rgba(248, 250, 252, 0.28)',
        '--plx-mobile-nav-bg'       => 'rgba(15, 23, 42, 0.92)',
        '--plx-footer-border'       => 'rgba(15, 23, 42, 0.12)',
    );

    $dark_vars = array(
        '--plx-primary'             => get_theme_mod('plx_dark_primary_color', '#020617'),
        '--plx-secondary'           => get_theme_mod('plx_dark_secondary_color', '#fb923c'),
        '--plx-surface'             => get_theme_mod('plx_dark_surface_color', '#0f172a'),
        '--plx-text'                => get_theme_mod('plx_dark_text_color', '#e5eefb'),
        '--plx-text-inverse'        => get_theme_mod('plx_dark_text_inverse_color', '#f8fafc'),
        '--plx-grad-1'              => get_theme_mod('plx_dark_gradient_color_1', '#020617'),
        '--plx-grad-2'              => get_theme_mod('plx_dark_gradient_color_2', '#0f3a8a'),
        '--plx-grad-3'              => get_theme_mod('plx_dark_gradient_color_3', '#ea580c'),
        '--plx-hero-overlay'        => 'rgba(2,6,23,' . number_format((float) get_theme_mod('plx_dark_overlay_opacity', 0.58), 2, '.', '') . ')',
        '--plx-page-bg'             => '#07111f',
        '--plx-page-glow-1'         => 'rgba(234, 88, 12, 0.18)',
        '--plx-page-glow-2'         => 'rgba(37, 99, 235, 0.22)',
        '--plx-header-bg'           => 'rgba(2, 6, 23, 0.82)',
        '--plx-header-shadow'       => '0 8px 40px rgba(2, 6, 23, 0.36)',
        '--plx-card-bg'             => 'rgba(2, 6, 23, 0.38)',
        '--plx-card-border'         => 'rgba(226, 232, 240, 0.16)',
        '--plx-panel-bg'            => 'rgba(15, 23, 42, 0.82)',
        '--plx-panel-border'        => 'rgba(148, 163, 184, 0.16)',
        '--plx-feature-bg'          => 'rgba(15, 23, 42, 0.58)',
        '--plx-post-bg'             => 'rgba(15, 23, 42, 0.78)',
        '--plx-muted-text'          => 'rgba(226, 232, 240, 0.68)',
        '--plx-inverse-muted'       => 'rgba(248, 250, 252, 0.78)',
        '--plx-hero-chip-bg'        => 'rgba(15, 23, 42, 0.26)',
        '--plx-hero-chip-border'    => 'rgba(226, 232, 240, 0.24)',
        '--plx-button-primary-bg'   => '#e2e8f0',
        '--plx-button-primary-text' => '#020617',
        '--plx-ghost-bg'            => 'rgba(148, 163, 184, 0.14)',
        '--plx-ghost-border'        => 'rgba(226, 232, 240, 0.22)',
        '--plx-mobile-nav-bg'       => 'rgba(2, 6, 23, 0.96)',
        '--plx-footer-border'       => 'rgba(148, 163, 184, 0.18)',
    );

    $inline_css = plx_parallax_build_css_vars(':root', $shared_vars);
    $inline_css .= plx_parallax_build_css_vars('body[data-plx-color-mode="light"]', $light_vars + array('color-scheme' => 'light'));
    $inline_css .= plx_parallax_build_css_vars('body[data-plx-color-mode="dark"]', $dark_vars + array('color-scheme' => 'dark'));
    $inline_css .= plx_parallax_build_css_vars('body[data-plx-color-mode="auto"]', $light_vars + array('color-scheme' => 'light'));
    $inline_css .= '@media (prefers-color-scheme: dark) {' . plx_parallax_build_css_vars('body[data-plx-color-mode="auto"]', $dark_vars + array('color-scheme' => 'dark')) . '}';

    if (! get_theme_mod('plx_smooth_scroll', true)) {
        $inline_css .= 'html{scroll-behavior:auto;}';
    }

    wp_add_inline_style('plx-parallax-style', $inline_css);
}
add_action('wp_enqueue_scripts', 'plx_parallax_enqueue_assets');

function plx_parallax_body_classes($classes) {
    $classes[] = get_theme_mod('plx_sticky_header', true) ? 'has-sticky-header' : 'has-static-header';
    $classes[] = 'plx-color-mode-' . plx_parallax_get_color_mode();
    return $classes;
}
add_filter('body_class', 'plx_parallax_body_classes');

function plx_parallax_excerpt_more() {
    return '...';
}
add_filter('excerpt_more', 'plx_parallax_excerpt_more');

function plx_parallax_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'plx-parallax') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">' . esc_html__('Blog', 'plx-parallax') . '</a></li>';
    echo '</ul>';
}
