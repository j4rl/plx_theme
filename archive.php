<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="section">
    <div class="section__inner">
        <header class="archive-header archive-header--rich">
            <span class="hero__eyebrow"><?php esc_html_e('Archive', 'plx-parallax'); ?></span>
            <h1 class="archive-grid__title"><?php the_archive_title(); ?></h1>
            <?php if (get_the_archive_description()) : ?>
                <div class="archive-description"><?php echo wp_kses_post(wpautop(get_the_archive_description())); ?></div>
            <?php endif; ?>
        </header>

        <?php if (have_posts()) : ?>
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

            <div class="pagination-shell">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 1,
                    'prev_text' => __('Previous', 'plx-parallax'),
                    'next_text' => __('Next', 'plx-parallax'),
                ));
                ?>
            </div>
        <?php else : ?>
            <div class="no-results no-results--panel">
                <h1><?php esc_html_e('No archive entries found.', 'plx-parallax'); ?></h1>
                <p><?php esc_html_e('There is no content in this archive yet. Try another section or return to the front page.', 'plx-parallax'); ?></p>
                <a class="plx-button plx-button--primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to front page', 'plx-parallax'); ?></a>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
