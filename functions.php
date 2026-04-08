<?php
if (! defined('ABSPATH')) {
    exit;
}

require get_template_directory() . '/inc/customizer.php';

function plx_parallax_get_theme_defaults() {
    return array(
        'plx_color_mode'                => 'auto',
        'plx_eyebrow_text'              => __('Parallax WordPress Theme', 'plx-parallax'),
        'plx_hero_title'                => __('Build depth into every scroll.', 'plx-parallax'),
        'plx_hero_text'                 => __('A sharp, responsive theme with flexible gradients, background imagery, typography controls, and motion tuned for both desktop and mobile.', 'plx-parallax'),
        'plx_primary_button_text'       => __('Explore the layout', 'plx-parallax'),
        'plx_primary_button_url'        => '#content',
        'plx_secondary_button_text'     => __('Read the latest posts', 'plx-parallax'),
        'plx_secondary_button_url'      => '/blog',
        'plx_primary_color'             => '#0f172a',
        'plx_secondary_color'           => '#f97316',
        'plx_surface_color'             => '#fff6eb',
        'plx_text_color'                => '#0f172a',
        'plx_text_inverse_color'        => '#f8fafc',
        'plx_gradient_color_1'          => '#0f172a',
        'plx_gradient_color_2'          => '#1d4ed8',
        'plx_gradient_color_3'          => '#f97316',
        'plx_gradient_angle'            => 132,
        'plx_overlay_opacity'           => 0.45,
        'plx_dark_primary_color'        => '#020617',
        'plx_dark_secondary_color'      => '#fb923c',
        'plx_dark_surface_color'        => '#0f172a',
        'plx_dark_text_color'           => '#e5eefb',
        'plx_dark_text_inverse_color'   => '#f8fafc',
        'plx_dark_gradient_color_1'     => '#020617',
        'plx_dark_gradient_color_2'     => '#0f3a8a',
        'plx_dark_gradient_color_3'     => '#ea580c',
        'plx_dark_overlay_opacity'      => 0.58,
        'plx_font_family'               => 'Space Grotesk',
        'plx_enable_parallax'           => true,
        'plx_disable_mobile_parallax'   => true,
        'plx_sticky_header'             => true,
        'plx_smooth_scroll'             => true,
        'plx_parallax_speed'            => 0.24,
        'plx_content_width'             => 1180,
        'plx_profile_title'             => __('Theme profile', 'plx-parallax'),
        'plx_stat_1_title'              => __('Fluid', 'plx-parallax'),
        'plx_stat_1_text'               => __('Responsive across desktop, tablet, and mobile.', 'plx-parallax'),
        'plx_stat_2_title'              => __('Custom', 'plx-parallax'),
        'plx_stat_2_text'               => __('Fonts, colors, images, and gradients from Customizer.', 'plx-parallax'),
        'plx_stat_3_title'              => __('Motion', 'plx-parallax'),
        'plx_stat_3_text'               => __('Parallax tuned with optional mobile fallback.', 'plx-parallax'),
        'plx_stat_4_title'              => __('Editorial', 'plx-parallax'),
        'plx_stat_4_text'               => __('Strong visual rhythm for landing pages and content.', 'plx-parallax'),
        'plx_show_intro_section'        => true,
        'plx_intro_title'               => __('A front page that feels layered, not flat.', 'plx-parallax'),
        'plx_intro_text'                => __('The theme uses image depth, gradient composition, and restrained motion to create presence without breaking usability. Adjust the visual system from the Customizer and keep the layout seamless on both large and small screens.', 'plx-parallax'),
        'plx_feature_1_title'           => __('Gradient control', 'plx-parallax'),
        'plx_feature_1_text'            => __('Three gradient stops, adjustable angle, and overlay intensity.', 'plx-parallax'),
        'plx_feature_2_title'           => __('Image layers', 'plx-parallax'),
        'plx_feature_2_text'            => __('Hero and panel imagery can be swapped without editing templates.', 'plx-parallax'),
        'plx_feature_3_title'           => __('Behavior tuning', 'plx-parallax'),
        'plx_feature_3_text'            => __('Sticky header, smooth scroll, parallax speed, and mobile handling.', 'plx-parallax'),
        'plx_empty_content_title'       => __('Start with a static front page.', 'plx-parallax'),
        'plx_empty_content_text'        => __('Create a page in WordPress, assign it as your homepage, and its content will appear here under the parallax hero.', 'plx-parallax'),
        'plx_show_recent_posts'         => true,
        'plx_recent_posts_title'        => __('Latest stories', 'plx-parallax'),
        'plx_recent_posts_count'        => 3,
        'plx_show_featured_pages'       => true,
        'plx_featured_pages_title'      => __('Parallax pages', 'plx-parallax'),
        'plx_featured_pages_text'       => __('Select pages in the theme settings and decide exactly how they should stack through the front page experience.', 'plx-parallax'),
        'plx_featured_pages_cta_text'   => __('Open page', 'plx-parallax'),
        'plx_featured_pages_display'    => 'cards',
        'plx_featured_pages_sequence'   => '1,2,3,4,5,6',
        'plx_featured_page_1_id'        => 0,
        'plx_featured_page_1_layout'    => 'split-left',
        'plx_featured_page_2_id'        => 0,
        'plx_featured_page_2_layout'    => 'split-right',
        'plx_featured_page_3_id'        => 0,
        'plx_featured_page_3_layout'    => 'stacked',
        'plx_featured_page_4_id'        => 0,
        'plx_featured_page_4_layout'    => 'split-left',
        'plx_featured_page_5_id'        => 0,
        'plx_featured_page_5_layout'    => 'split-right',
        'plx_featured_page_6_id'        => 0,
        'plx_featured_page_6_layout'    => 'stacked',
        'plx_show_cta_section'          => true,
        'plx_cta_title'                 => __('Give the scroll a destination.', 'plx-parallax'),
        'plx_cta_text'                  => __('Use this closing section for contact, bookings, launch messaging, or a single strong call to action.', 'plx-parallax'),
        'plx_cta_button_text'           => __('Start a project', 'plx-parallax'),
        'plx_cta_button_url'            => '/contact',
        'plx_footer_tagline'            => __('Parallax-ready, responsive, and customizable.', 'plx-parallax'),
    );
}

function plx_parallax_get_default($key) {
    $defaults = plx_parallax_get_theme_defaults();
    return isset($defaults[$key]) ? $defaults[$key] : '';
}

function plx_parallax_theme_setup() {
    load_theme_textdomain('plx-parallax', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('plx-featured-page', 1200, 900, true);
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
    $mode = get_theme_mod('plx_color_mode', plx_parallax_get_default('plx_color_mode'));
    return in_array($mode, array('light', 'auto', 'dark'), true) ? $mode : 'auto';
}

function plx_parallax_get_page_layout_choices() {
    return array(
        'split-left'  => __('Image left', 'plx-parallax'),
        'split-right' => __('Image right', 'plx-parallax'),
        'stacked'     => __('Stacked', 'plx-parallax'),
        'compact'     => __('Compact', 'plx-parallax'),
    );
}

function plx_parallax_get_featured_pages_display_choices() {
    return array(
        'cards' => __('Cards', 'plx-parallax'),
        'full'  => __('Full content', 'plx-parallax'),
        'flow'  => __('Parallax flow', 'plx-parallax'),
    );
}

function plx_parallax_get_featured_page_background_base_choices() {
    return array(
        'gradient' => __('Gradient', 'plx-parallax'),
        'color'    => __('Solid color', 'plx-parallax'),
    );
}

function plx_parallax_get_featured_page_background_defaults($slot) {
    $presets = array(
        1 => array(
            'base'          => 'gradient',
            'gradient_1'    => '#0f172a',
            'gradient_2'    => '#1d4ed8',
            'color'         => '#172554',
            'image'         => '',
            'image_opacity' => 0.34,
        ),
        2 => array(
            'base'          => 'gradient',
            'gradient_1'    => '#111827',
            'gradient_2'    => '#ea580c',
            'color'         => '#7c2d12',
            'image'         => '',
            'image_opacity' => 0.34,
        ),
        3 => array(
            'base'          => 'gradient',
            'gradient_1'    => '#1f2937',
            'gradient_2'    => '#14b8a6',
            'color'         => '#134e4a',
            'image'         => '',
            'image_opacity' => 0.34,
        ),
        4 => array(
            'base'          => 'gradient',
            'gradient_1'    => '#312e81',
            'gradient_2'    => '#ec4899',
            'color'         => '#831843',
            'image'         => '',
            'image_opacity' => 0.34,
        ),
        5 => array(
            'base'          => 'gradient',
            'gradient_1'    => '#0f172a',
            'gradient_2'    => '#f59e0b',
            'color'         => '#78350f',
            'image'         => '',
            'image_opacity' => 0.34,
        ),
        6 => array(
            'base'          => 'gradient',
            'gradient_1'    => '#0b132b',
            'gradient_2'    => '#5bc0be',
            'color'         => '#1c2541',
            'image'         => '',
            'image_opacity' => 0.34,
        ),
    );

    return isset($presets[$slot]) ? $presets[$slot] : $presets[1];
}

function plx_parallax_get_featured_page_background_default($slot, $key) {
    $defaults = plx_parallax_get_featured_page_background_defaults($slot);
    return isset($defaults[$key]) ? $defaults[$key] : '';
}

function plx_parallax_get_featured_page_panel_style($slot) {
    $base_mode     = get_theme_mod('plx_featured_page_' . $slot . '_background_base', plx_parallax_get_featured_page_background_default($slot, 'base'));
    $gradient_1    = get_theme_mod('plx_featured_page_' . $slot . '_background_gradient_1', plx_parallax_get_featured_page_background_default($slot, 'gradient_1'));
    $gradient_2    = get_theme_mod('plx_featured_page_' . $slot . '_background_gradient_2', plx_parallax_get_featured_page_background_default($slot, 'gradient_2'));
    $solid_color   = get_theme_mod('plx_featured_page_' . $slot . '_background_color', plx_parallax_get_featured_page_background_default($slot, 'color'));
    $image         = get_theme_mod('plx_featured_page_' . $slot . '_background_image', plx_parallax_get_featured_page_background_default($slot, 'image'));
    $image_opacity = (float) get_theme_mod('plx_featured_page_' . $slot . '_background_image_opacity', plx_parallax_get_featured_page_background_default($slot, 'image_opacity'));

    $base_choices = plx_parallax_get_featured_page_background_base_choices();
    $base_mode    = isset($base_choices[$base_mode]) ? $base_mode : 'gradient';
    $image_opacity = max(0, min(1, $image_opacity));

    if ('color' === $base_mode) {
        $background = $solid_color;
    } else {
        $background = 'linear-gradient(155deg, ' . $gradient_1 . ', ' . $gradient_2 . ')';
    }

    $vars = array(
        '--plx-page-panel-bg'            => $background,
        '--plx-page-panel-image'         => $image ? 'url("' . esc_url_raw($image) . '")' : 'none',
        '--plx-page-panel-image-opacity' => $image ? number_format($image_opacity, 2, '.', '') : '0',
    );

    $style = '';
    foreach ($vars as $name => $value) {
        $style .= $name . ':' . $value . ';';
    }

    return $style;
}

function plx_parallax_get_featured_pages() {
    $sequence_raw = get_theme_mod('plx_featured_pages_sequence', plx_parallax_get_default('plx_featured_pages_sequence'));
    $sequence     = array_filter(array_map('absint', explode(',', (string) $sequence_raw)));
    $sequence     = array_values(array_unique(array_filter($sequence, function ($slot) {
        return $slot >= 1 && $slot <= 6;
    })));

    if (count($sequence) < 6) {
        for ($index = 1; $index <= 6; $index++) {
            if (! in_array($index, $sequence, true)) {
                $sequence[] = $index;
            }
        }
    }

    $selected   = array();
    $page_ids   = array();
    $layouts    = plx_parallax_get_page_layout_choices();

    foreach ($sequence as $index) {
        $page_id = absint(get_theme_mod('plx_featured_page_' . $index . '_id', plx_parallax_get_default('plx_featured_page_' . $index . '_id')));
        $layout  = get_theme_mod('plx_featured_page_' . $index . '_layout', plx_parallax_get_default('plx_featured_page_' . $index . '_layout'));
        $layout  = isset($layouts[$layout]) ? $layout : 'split-left';

        if (! $page_id || isset($selected[$page_id])) {
            continue;
        }

        $selected[$page_id] = array(
            'slot'   => $index,
            'layout' => $layout,
        );
        $page_ids[] = $page_id;
    }

    if (empty($selected)) {
        return array();
    }

    $pages = get_posts(array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => count($page_ids),
        'post__in'       => $page_ids,
    ));

    if (empty($pages)) {
        return array();
    }

    $page_map = array();
    foreach ($pages as $page) {
        $page_map[$page->ID] = $page;
    }

    $ordered_pages = array();
    foreach ($page_ids as $page_id) {
        if (isset($page_map[$page_id])) {
            $ordered_pages[] = array(
                'page'   => $page_map[$page_id],
                'slot'   => $selected[$page_id]['slot'],
                'layout' => $selected[$page_id]['layout'],
            );
        }
    }

    return $ordered_pages;
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
    $font    = get_theme_mod('plx_font_family', plx_parallax_get_default('plx_font_family'));
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
        'disableMobile'   => (bool) get_theme_mod('plx_disable_mobile_parallax', plx_parallax_get_default('plx_disable_mobile_parallax')),
        'speed'           => (float) get_theme_mod('plx_parallax_speed', plx_parallax_get_default('plx_parallax_speed')),
        'stickyHeader'    => (bool) get_theme_mod('plx_sticky_header', plx_parallax_get_default('plx_sticky_header')),
        'smoothScroll'    => (bool) get_theme_mod('plx_smooth_scroll', plx_parallax_get_default('plx_smooth_scroll')),
        'colorMode'       => plx_parallax_get_color_mode(),
    ));

    $hero_image  = get_theme_mod('plx_hero_image');
    $panel_image = get_theme_mod('plx_panel_image');
    $shared_vars = array(
        '--plx-content-width'   => absint(get_theme_mod('plx_content_width', plx_parallax_get_default('plx_content_width'))) . 'px',
        '--plx-font-family'     => '"' . esc_html($font) . '",sans-serif',
        '--plx-hero-image'      => $hero_image ? 'url("' . esc_url_raw($hero_image) . '")' : 'none',
        '--plx-panel-image'     => $panel_image ? 'url("' . esc_url_raw($panel_image) . '")' : 'none',
        '--plx-gradient-angle'  => absint(get_theme_mod('plx_gradient_angle', plx_parallax_get_default('plx_gradient_angle'))) . 'deg',
    );

    $light_vars = array(
        '--plx-primary'             => get_theme_mod('plx_primary_color', plx_parallax_get_default('plx_primary_color')),
        '--plx-secondary'           => get_theme_mod('plx_secondary_color', plx_parallax_get_default('plx_secondary_color')),
        '--plx-surface'             => get_theme_mod('plx_surface_color', plx_parallax_get_default('plx_surface_color')),
        '--plx-text'                => get_theme_mod('plx_text_color', plx_parallax_get_default('plx_text_color')),
        '--plx-text-inverse'        => get_theme_mod('plx_text_inverse_color', plx_parallax_get_default('plx_text_inverse_color')),
        '--plx-grad-1'              => get_theme_mod('plx_gradient_color_1', plx_parallax_get_default('plx_gradient_color_1')),
        '--plx-grad-2'              => get_theme_mod('plx_gradient_color_2', plx_parallax_get_default('plx_gradient_color_2')),
        '--plx-grad-3'              => get_theme_mod('plx_gradient_color_3', plx_parallax_get_default('plx_gradient_color_3')),
        '--plx-hero-overlay'        => 'rgba(15,23,42,' . number_format((float) get_theme_mod('plx_overlay_opacity', plx_parallax_get_default('plx_overlay_opacity')), 2, '.', '') . ')',
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
        '--plx-primary'             => get_theme_mod('plx_dark_primary_color', plx_parallax_get_default('plx_dark_primary_color')),
        '--plx-secondary'           => get_theme_mod('plx_dark_secondary_color', plx_parallax_get_default('plx_dark_secondary_color')),
        '--plx-surface'             => get_theme_mod('plx_dark_surface_color', plx_parallax_get_default('plx_dark_surface_color')),
        '--plx-text'                => get_theme_mod('plx_dark_text_color', plx_parallax_get_default('plx_dark_text_color')),
        '--plx-text-inverse'        => get_theme_mod('plx_dark_text_inverse_color', plx_parallax_get_default('plx_dark_text_inverse_color')),
        '--plx-grad-1'              => get_theme_mod('plx_dark_gradient_color_1', plx_parallax_get_default('plx_dark_gradient_color_1')),
        '--plx-grad-2'              => get_theme_mod('plx_dark_gradient_color_2', plx_parallax_get_default('plx_dark_gradient_color_2')),
        '--plx-grad-3'              => get_theme_mod('plx_dark_gradient_color_3', plx_parallax_get_default('plx_dark_gradient_color_3')),
        '--plx-hero-overlay'        => 'rgba(2,6,23,' . number_format((float) get_theme_mod('plx_dark_overlay_opacity', plx_parallax_get_default('plx_dark_overlay_opacity')), 2, '.', '') . ')',
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

    if (! get_theme_mod('plx_smooth_scroll', plx_parallax_get_default('plx_smooth_scroll'))) {
        $inline_css .= 'html{scroll-behavior:auto;}';
    }

    wp_add_inline_style('plx-parallax-style', $inline_css);
}
add_action('wp_enqueue_scripts', 'plx_parallax_enqueue_assets');

function plx_parallax_enqueue_customizer_controls_assets() {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_script(
        'plx-parallax-customizer-controls',
        get_template_directory_uri() . '/assets/js/customizer-controls.js',
        array('jquery', 'customize-controls', 'jquery-ui-sortable'),
        $version,
        true
    );

    wp_localize_script('plx-parallax-customizer-controls', 'plxCustomizerControls', array(
        'slotLabel'      => __('Slot %d', 'plx-parallax'),
        'noPageSelected' => __('No page selected', 'plx-parallax'),
    ));
}
add_action('customize_controls_enqueue_scripts', 'plx_parallax_enqueue_customizer_controls_assets');

function plx_parallax_enqueue_customizer_preview_assets() {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_script(
        'plx-parallax-customizer-preview',
        get_template_directory_uri() . '/assets/js/customizer-preview.js',
        array('jquery', 'customize-preview'),
        $version,
        true
    );

    wp_localize_script('plx-parallax-customizer-preview', 'plxCustomizerPreview', array(
        'editHint' => __('Click to edit', 'plx-parallax'),
    ));
}
add_action('customize_preview_init', 'plx_parallax_enqueue_customizer_preview_assets');

function plx_parallax_body_classes($classes) {
    $classes[] = get_theme_mod('plx_sticky_header', plx_parallax_get_default('plx_sticky_header')) ? 'has-sticky-header' : 'has-static-header';
    $classes[] = 'plx-color-mode-' . plx_parallax_get_color_mode();
    return $classes;
}
add_filter('body_class', 'plx_parallax_body_classes');

function plx_parallax_excerpt_more() {
    return '...';
}
add_filter('excerpt_more', 'plx_parallax_excerpt_more');

function plx_parallax_add_admin_menu() {
    add_theme_page(
        __('Support Theme', 'plx-parallax'),
        __('Support Theme', 'plx-parallax'),
        'manage_options',
        'plx-parallax-support',
        'plx_parallax_render_support_page'
    );
}
add_action('admin_menu', 'plx_parallax_add_admin_menu');

function plx_parallax_render_support_page() {
    if (! current_user_can('manage_options')) {
        return;
    }

    $qr_path = get_template_directory() . '/assets/images/paypal-qr.png';
    $qr_url  = get_template_directory_uri() . '/assets/images/paypal-qr.png';
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Support Jarl Parallax', 'plx-parallax'); ?></h1>

        <div style="max-width:960px;display:grid;grid-template-columns:minmax(0,1.2fr) minmax(260px,360px);gap:24px;align-items:start;margin-top:24px;">
            <div style="background:#ffffff;border:1px solid #dcdcde;border-radius:20px;padding:28px;box-shadow:0 12px 32px rgba(15,23,42,0.08);">
                <h2 style="margin-top:0;"><?php esc_html_e('Who is behind this?', 'plx-parallax'); ?></h2>
                <p><?php esc_html_e('This theme was built by Charlie Jarl in his spare time.', 'plx-parallax'); ?></p>
                <p><?php esc_html_e('If you think it is good, say it out loud. Share it. Use it.', 'plx-parallax'); ?></p>
                <p><?php esc_html_e('The theme is free for a reason: good things should not be hidden behind paywalls.', 'plx-parallax'); ?></p>
                <p><?php esc_html_e('But if you want to show real appreciation, a donation is hugely appreciated.', 'plx-parallax'); ?></p>
                <p><?php esc_html_e('Completely optional. Entirely up to you.', 'plx-parallax'); ?></p>
                <p style="margin-bottom:0;"><?php esc_html_e('Scan the PayPal code if you want, and pay whatever you think it is worth.', 'plx-parallax'); ?></p>
            </div>

            <div style="background:#ffffff;border:1px solid #dcdcde;border-radius:20px;padding:20px;box-shadow:0 12px 32px rgba(15,23,42,0.08);text-align:center;">
                <?php if (file_exists($qr_path)) : ?>
                    <img
                        src="<?php echo esc_url($qr_url); ?>"
                        alt="<?php esc_attr_e('PayPal QR code for donations', 'plx-parallax'); ?>"
                        style="display:block;width:100%;height:auto;border-radius:16px;background:#ffffff;"
                    >
                <?php else : ?>
                    <p><?php esc_html_e('The QR code could not be found in the theme.', 'plx-parallax'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}

function plx_parallax_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'plx-parallax') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">' . esc_html__('Blog', 'plx-parallax') . '</a></li>';
    echo '</ul>';
}
