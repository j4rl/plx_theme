<?php
if (! defined('ABSPATH')) {
    exit;
}
?>
    <footer class="site-footer">
        <div class="site-footer__inner">
            <span><?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?></span>
            <span class="js-plx-footer-tagline"><?php echo esc_html(get_theme_mod('plx_footer_tagline', plx_parallax_get_default('plx_footer_tagline'))); ?></span>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
