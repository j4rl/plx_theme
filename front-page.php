<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();

$profile_title      = get_theme_mod('plx_profile_title', plx_parallax_get_default('plx_profile_title'));
$show_intro_section = get_theme_mod('plx_show_intro_section', plx_parallax_get_default('plx_show_intro_section'));
$show_recent_posts  = get_theme_mod('plx_show_recent_posts', plx_parallax_get_default('plx_show_recent_posts'));
$recent_posts_count = absint(get_theme_mod('plx_recent_posts_count', plx_parallax_get_default('plx_recent_posts_count')));
?>
<main>
    <section class="hero">
        <div class="hero__visual" aria-hidden="true">
            <div class="hero__layer hero__layer--gradient parallax-layer" data-depth="0.12"></div>
            <div class="hero__layer hero__layer--image parallax-layer" data-depth="0.2"></div>
            <div class="hero__layer hero__layer--mesh parallax-layer" data-depth="0.32"></div>
            <div class="hero__scrim"></div>
        </div>
        <div class="hero__inner">
            <div class="hero__copy">
                <span class="hero__eyebrow"><?php echo esc_html(get_theme_mod('plx_eyebrow_text', plx_parallax_get_default('plx_eyebrow_text'))); ?></span>
                <h1 class="hero__title"><?php echo esc_html(get_theme_mod('plx_hero_title', plx_parallax_get_default('plx_hero_title'))); ?></h1>
                <p class="hero__text"><?php echo esc_html(get_theme_mod('plx_hero_text', plx_parallax_get_default('plx_hero_text'))); ?></p>
                <div class="hero__actions">
                    <a class="plx-button plx-button--primary" href="<?php echo esc_url(get_theme_mod('plx_primary_button_url', plx_parallax_get_default('plx_primary_button_url'))); ?>">
                        <?php echo esc_html(get_theme_mod('plx_primary_button_text', plx_parallax_get_default('plx_primary_button_text'))); ?>
                    </a>
                    <a class="plx-button plx-button--ghost" href="<?php echo esc_url(get_theme_mod('plx_secondary_button_url', plx_parallax_get_default('plx_secondary_button_url'))); ?>">
                        <?php echo esc_html(get_theme_mod('plx_secondary_button_text', plx_parallax_get_default('plx_secondary_button_text'))); ?>
                    </a>
                </div>
            </div>
            <aside class="hero__card">
                <p class="hero__card-title"><?php echo esc_html($profile_title); ?></p>
                <div class="hero__stat-grid">
                    <div class="hero__stat">
                        <strong><?php echo esc_html(get_theme_mod('plx_stat_1_title', plx_parallax_get_default('plx_stat_1_title'))); ?></strong>
                        <span><?php echo esc_html(get_theme_mod('plx_stat_1_text', plx_parallax_get_default('plx_stat_1_text'))); ?></span>
                    </div>
                    <div class="hero__stat">
                        <strong><?php echo esc_html(get_theme_mod('plx_stat_2_title', plx_parallax_get_default('plx_stat_2_title'))); ?></strong>
                        <span><?php echo esc_html(get_theme_mod('plx_stat_2_text', plx_parallax_get_default('plx_stat_2_text'))); ?></span>
                    </div>
                    <div class="hero__stat">
                        <strong><?php echo esc_html(get_theme_mod('plx_stat_3_title', plx_parallax_get_default('plx_stat_3_title'))); ?></strong>
                        <span><?php echo esc_html(get_theme_mod('plx_stat_3_text', plx_parallax_get_default('plx_stat_3_text'))); ?></span>
                    </div>
                    <div class="hero__stat">
                        <strong><?php echo esc_html(get_theme_mod('plx_stat_4_title', plx_parallax_get_default('plx_stat_4_title'))); ?></strong>
                        <span><?php echo esc_html(get_theme_mod('plx_stat_4_text', plx_parallax_get_default('plx_stat_4_text'))); ?></span>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <?php if ($show_intro_section) : ?>
        <section class="section section--intro">
            <div class="section__inner">
                <div class="intro-panel">
                    <div class="intro-panel__content">
                        <h2><?php echo esc_html(get_theme_mod('plx_intro_title', plx_parallax_get_default('plx_intro_title'))); ?></h2>
                        <p><?php echo esc_html(get_theme_mod('plx_intro_text', plx_parallax_get_default('plx_intro_text'))); ?></p>
                        <div class="feature-grid">
                            <article class="feature-card">
                                <h3><?php echo esc_html(get_theme_mod('plx_feature_1_title', plx_parallax_get_default('plx_feature_1_title'))); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('plx_feature_1_text', plx_parallax_get_default('plx_feature_1_text'))); ?></p>
                            </article>
                            <article class="feature-card">
                                <h3><?php echo esc_html(get_theme_mod('plx_feature_2_title', plx_parallax_get_default('plx_feature_2_title'))); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('plx_feature_2_text', plx_parallax_get_default('plx_feature_2_text'))); ?></p>
                            </article>
                            <article class="feature-card">
                                <h3><?php echo esc_html(get_theme_mod('plx_feature_3_title', plx_parallax_get_default('plx_feature_3_title'))); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('plx_feature_3_text', plx_parallax_get_default('plx_feature_3_text'))); ?></p>
                            </article>
                        </div>
                    </div>
                    <div class="intro-panel__media parallax-layer" data-depth="0.08"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section section--content" id="content">
        <div class="section__inner">
            <div class="content-block">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
                } else {
                    ?>
                    <h2><?php echo esc_html(get_theme_mod('plx_empty_content_title', plx_parallax_get_default('plx_empty_content_title'))); ?></h2>
                    <p><?php echo esc_html(get_theme_mod('plx_empty_content_text', plx_parallax_get_default('plx_empty_content_text'))); ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <?php
    $recent_posts = new WP_Query(array(
        'posts_per_page'      => max(1, $recent_posts_count),
        'ignore_sticky_posts' => true,
    ));

    if ($show_recent_posts && $recent_posts->have_posts()) :
        ?>
        <section class="section">
            <div class="section__inner">
                <div class="archive-grid__title"><?php echo esc_html(get_theme_mod('plx_recent_posts_title', plx_parallax_get_default('plx_recent_posts_title'))); ?></div>
                <div class="post-grid">
                    <?php
                    while ($recent_posts->have_posts()) :
                        $recent_posts->the_post();
                        ?>
                        <article <?php post_class('post-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <a class="post-card__image" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-card__body">
                                <span class="post-card__meta"><?php echo esc_html(get_the_date()); ?></span>
                                <h3 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </section>
        <?php
        wp_reset_postdata();
    endif;
    ?>
</main>
<?php get_footer(); ?>
