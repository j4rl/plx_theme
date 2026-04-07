<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main>
    <?php while (have_posts()) : the_post(); ?>
        <header class="entry-header">
            <p class="post-card__meta"><?php echo esc_html(get_the_date()); ?></p>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="entry-content">
            <?php if (has_post_thumbnail()) : ?>
                <p><?php the_post_thumbnail('large'); ?></p>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
