<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="section section--404">
    <div class="section__inner">
        <div class="error-panel">
            <span class="hero__eyebrow"><?php esc_html_e('404', 'plx-parallax'); ?></span>
            <h1 class="entry-title"><?php esc_html_e('That page does not exist.', 'plx-parallax'); ?></h1>
            <p class="error-panel__text"><?php esc_html_e('The link may be outdated, the page may have moved, or the URL may be incorrect. Search below or return to the front page.', 'plx-parallax'); ?></p>
            <div class="search-shell">
                <?php get_search_form(); ?>
            </div>
            <div class="hero__actions">
                <a class="plx-button plx-button--primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go home', 'plx-parallax'); ?></a>
                <a class="plx-button plx-button--ghost" href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Open blog', 'plx-parallax'); ?></a>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
