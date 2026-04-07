<?php
if (! defined('ABSPATH')) {
    exit;
}
?>
    <footer class="site-footer">
        <div class="site-footer__inner">
            <span><?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?></span>
            <span><?php esc_html_e('Parallax-ready, responsive, and customizable.', 'plx-parallax'); ?></span>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
