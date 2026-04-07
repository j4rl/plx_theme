<?php
if (! defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-plx-color-mode="<?php echo esc_attr(plx_parallax_get_color_mode()); ?>">
<?php wp_body_open(); ?>
<div class="site-shell">
    <header class="site-header <?php echo get_theme_mod('plx_sticky_header', true) ? '' : 'is-static'; ?>" data-sticky="<?php echo get_theme_mod('plx_sticky_header', true) ? 'true' : 'false'; ?>">
        <div class="site-header__bar">
            <a class="brand-mark" href="<?php echo esc_url(home_url('/')); ?>">
                <span class="brand-mark__badge"><?php echo esc_html(substr(get_bloginfo('name'), 0, 2)); ?></span>
                <span class="brand-mark__meta">
                    <span class="brand-mark__title"><?php bloginfo('name'); ?></span>
                    <span class="brand-mark__tagline"><?php bloginfo('description'); ?></span>
                </span>
            </a>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">
                <?php esc_html_e('Menu', 'plx-parallax'); ?>
            </button>
            <nav id="primary-nav" class="primary-nav" aria-label="<?php esc_attr_e('Primary menu', 'plx-parallax'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => 'plx_parallax_fallback_menu',
                ));
                ?>
            </nav>
        </div>
    </header>
