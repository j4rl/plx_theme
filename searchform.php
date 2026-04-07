<?php
if (! defined('ABSPATH')) {
    exit;
}
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text" for="plx-search-field"><?php esc_html_e('Search for:', 'plx-parallax'); ?></label>
    <div class="search-form__inner">
        <input id="plx-search-field" type="search" class="search-field" placeholder="<?php echo esc_attr__('Search the site', 'plx-parallax'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
        <button type="submit" class="search-submit"><?php esc_html_e('Search', 'plx-parallax'); ?></button>
    </div>
</form>
