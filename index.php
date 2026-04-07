<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="section">
    <div class="section__inner">
        <?php if (have_posts()) : ?>
            <header class="archive-header">
                <h1 class="archive-grid__title"><?php bloginfo('name'); ?></h1>
            </header>
            <div class="archive-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a class="post-card__image" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="post-card__body">
                            <span class="post-card__meta"><?php echo esc_html(get_the_date()); ?></span>
                            <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="no-results">
                <h1><?php esc_html_e('Nothing published yet.', 'plx-parallax'); ?></h1>
                <p><?php esc_html_e('Create posts or pages and they will appear here.', 'plx-parallax'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
