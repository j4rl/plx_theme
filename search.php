<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="section">
    <div class="section__inner">
        <header class="archive-header archive-header--rich">
            <span class="hero__eyebrow"><?php esc_html_e('Search', 'plx-parallax'); ?></span>
            <h1 class="archive-grid__title">
                <?php
                printf(
                    esc_html__('Results for "%s"', 'plx-parallax'),
                    esc_html(get_search_query())
                );
                ?>
            </h1>
            <div class="archive-description">
                <p><?php esc_html_e('Refine the search or browse the matching content below.', 'plx-parallax'); ?></p>
            </div>
            <div class="search-shell">
                <?php get_search_form(); ?>
            </div>
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
                            <span class="post-card__meta"><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?></span>
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
                <h1><?php esc_html_e('No matches found.', 'plx-parallax'); ?></h1>
                <p><?php esc_html_e('Try a broader phrase, a shorter keyword, or browse the site manually.', 'plx-parallax'); ?></p>
                <div class="search-shell">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
