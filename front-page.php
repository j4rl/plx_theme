<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();

$profile_title      = get_theme_mod('plx_profile_title', plx_parallax_get_default('plx_profile_title'));
$show_intro_section = get_theme_mod('plx_show_intro_section', plx_parallax_get_default('plx_show_intro_section'));
$show_featured_pages = get_theme_mod('plx_show_featured_pages', plx_parallax_get_default('plx_show_featured_pages'));
$show_recent_posts  = get_theme_mod('plx_show_recent_posts', plx_parallax_get_default('plx_show_recent_posts'));
$show_cta_section   = get_theme_mod('plx_show_cta_section', plx_parallax_get_default('plx_show_cta_section'));
$recent_posts_count = absint(get_theme_mod('plx_recent_posts_count', plx_parallax_get_default('plx_recent_posts_count')));
$featured_pages     = plx_parallax_get_featured_pages();
$featured_pages_display = get_theme_mod('plx_featured_pages_display', plx_parallax_get_default('plx_featured_pages_display'));
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
                <span class="hero__eyebrow js-plx-eyebrow" data-plx-setting="plx_eyebrow_text"><?php echo esc_html(get_theme_mod('plx_eyebrow_text', plx_parallax_get_default('plx_eyebrow_text'))); ?></span>
                <h1 class="hero__title js-plx-hero-title" data-plx-setting="plx_hero_title"><?php echo esc_html(get_theme_mod('plx_hero_title', plx_parallax_get_default('plx_hero_title'))); ?></h1>
                <p class="hero__text js-plx-hero-text" data-plx-setting="plx_hero_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_hero_text', plx_parallax_get_default('plx_hero_text'))); ?></p>
                <div class="hero__actions">
                    <a class="plx-button plx-button--primary js-plx-primary-button" data-plx-setting="plx_primary_button_text" href="<?php echo esc_url(get_theme_mod('plx_primary_button_url', plx_parallax_get_default('plx_primary_button_url'))); ?>">
                        <?php echo esc_html(get_theme_mod('plx_primary_button_text', plx_parallax_get_default('plx_primary_button_text'))); ?>
                    </a>
                    <a class="plx-button plx-button--ghost js-plx-secondary-button" data-plx-setting="plx_secondary_button_text" href="<?php echo esc_url(get_theme_mod('plx_secondary_button_url', plx_parallax_get_default('plx_secondary_button_url'))); ?>">
                        <?php echo esc_html(get_theme_mod('plx_secondary_button_text', plx_parallax_get_default('plx_secondary_button_text'))); ?>
                    </a>
                </div>
            </div>
            <aside class="hero__card">
                <p class="hero__card-title js-plx-profile-title" data-plx-setting="plx_profile_title"><?php echo esc_html($profile_title); ?></p>
                <div class="hero__stat-grid">
                    <div class="hero__stat" data-stat="1">
                        <strong class="js-plx-stat-title" data-plx-setting="plx_stat_1_title"><?php echo esc_html(get_theme_mod('plx_stat_1_title', plx_parallax_get_default('plx_stat_1_title'))); ?></strong>
                        <span class="js-plx-stat-text" data-plx-setting="plx_stat_1_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_stat_1_text', plx_parallax_get_default('plx_stat_1_text'))); ?></span>
                    </div>
                    <div class="hero__stat" data-stat="2">
                        <strong class="js-plx-stat-title" data-plx-setting="plx_stat_2_title"><?php echo esc_html(get_theme_mod('plx_stat_2_title', plx_parallax_get_default('plx_stat_2_title'))); ?></strong>
                        <span class="js-plx-stat-text" data-plx-setting="plx_stat_2_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_stat_2_text', plx_parallax_get_default('plx_stat_2_text'))); ?></span>
                    </div>
                    <div class="hero__stat" data-stat="3">
                        <strong class="js-plx-stat-title" data-plx-setting="plx_stat_3_title"><?php echo esc_html(get_theme_mod('plx_stat_3_title', plx_parallax_get_default('plx_stat_3_title'))); ?></strong>
                        <span class="js-plx-stat-text" data-plx-setting="plx_stat_3_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_stat_3_text', plx_parallax_get_default('plx_stat_3_text'))); ?></span>
                    </div>
                    <div class="hero__stat" data-stat="4">
                        <strong class="js-plx-stat-title" data-plx-setting="plx_stat_4_title"><?php echo esc_html(get_theme_mod('plx_stat_4_title', plx_parallax_get_default('plx_stat_4_title'))); ?></strong>
                        <span class="js-plx-stat-text" data-plx-setting="plx_stat_4_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_stat_4_text', plx_parallax_get_default('plx_stat_4_text'))); ?></span>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <?php if ($show_intro_section) : ?>
        <section class="section section--intro js-plx-intro-section">
            <div class="section__inner">
                <div class="intro-panel">
                    <div class="intro-panel__content">
                        <h2 class="js-plx-intro-title" data-plx-setting="plx_intro_title"><?php echo esc_html(get_theme_mod('plx_intro_title', plx_parallax_get_default('plx_intro_title'))); ?></h2>
                        <p class="js-plx-intro-text" data-plx-setting="plx_intro_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_intro_text', plx_parallax_get_default('plx_intro_text'))); ?></p>
                        <div class="feature-grid">
                            <article class="feature-card" data-feature="1">
                                <h3 class="js-plx-feature-title" data-plx-setting="plx_feature_1_title"><?php echo esc_html(get_theme_mod('plx_feature_1_title', plx_parallax_get_default('plx_feature_1_title'))); ?></h3>
                                <p class="js-plx-feature-text" data-plx-setting="plx_feature_1_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_feature_1_text', plx_parallax_get_default('plx_feature_1_text'))); ?></p>
                            </article>
                            <article class="feature-card" data-feature="2">
                                <h3 class="js-plx-feature-title" data-plx-setting="plx_feature_2_title"><?php echo esc_html(get_theme_mod('plx_feature_2_title', plx_parallax_get_default('plx_feature_2_title'))); ?></h3>
                                <p class="js-plx-feature-text" data-plx-setting="plx_feature_2_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_feature_2_text', plx_parallax_get_default('plx_feature_2_text'))); ?></p>
                            </article>
                            <article class="feature-card" data-feature="3">
                                <h3 class="js-plx-feature-title" data-plx-setting="plx_feature_3_title"><?php echo esc_html(get_theme_mod('plx_feature_3_title', plx_parallax_get_default('plx_feature_3_title'))); ?></h3>
                                <p class="js-plx-feature-text" data-plx-setting="plx_feature_3_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_feature_3_text', plx_parallax_get_default('plx_feature_3_text'))); ?></p>
                            </article>
                        </div>
                    </div>
                    <div class="intro-panel__media parallax-layer" data-depth="0.08"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($show_featured_pages && ! empty($featured_pages)) : ?>
        <?php
        global $post;
        $original_post = $post;
        ?>
        <?php if ('flow' === $featured_pages_display) : ?>
            <section class="section section--pages-flow js-plx-pages-section">
                <div class="page-flow-stack">
                    <?php foreach ($featured_pages as $page_item) : ?>
                        <?php
                        $page        = $page_item['page'];
                        $panel_style = plx_parallax_get_featured_page_panel_style($page_item['slot']);
                        ?>
                        <article class="page-flow-section" style="<?php echo esc_attr($panel_style); ?>">
                            <div class="page-flow__visual" aria-hidden="true">
                                <div class="page-flow__layer page-flow__layer--image parallax-layer" data-depth="0.12"></div>
                                <div class="page-flow__layer page-flow__layer--mesh parallax-layer" data-depth="0.26"></div>
                                <div class="page-flow__scrim"></div>
                            </div>
                            <div class="page-flow__content parallax-layer" data-depth="0.06">
                                <?php
                                $post = $page;
                                setup_postdata($post);
                                the_content();
                                ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php else : ?>
            <section class="section section--pages js-plx-pages-section">
                <div class="section__inner section__inner--pages <?php echo 'full' === $featured_pages_display ? 'section__inner--pages-full' : ''; ?>">
                    <?php if ('cards' === $featured_pages_display) : ?>
                        <div class="pages-intro">
                            <span class="hero__eyebrow"><?php esc_html_e('Selected pages', 'plx-parallax'); ?></span>
                            <h2 class="archive-grid__title js-plx-pages-title" data-plx-setting="plx_featured_pages_title"><?php echo esc_html(get_theme_mod('plx_featured_pages_title', plx_parallax_get_default('plx_featured_pages_title'))); ?></h2>
                            <p class="js-plx-pages-text" data-plx-setting="plx_featured_pages_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_featured_pages_text', plx_parallax_get_default('plx_featured_pages_text'))); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="page-stack page-stack--<?php echo esc_attr($featured_pages_display); ?>">
                        <?php foreach ($featured_pages as $page_item) : ?>
                            <?php
                            $page           = $page_item['page'];
                            $layout_class   = 'page-panel';
                            $panel_style    = plx_parallax_get_featured_page_panel_style($page_item['slot']);

                            if ('full' === $featured_pages_display) {
                                $layout_class .= ' page-panel--full page-panel--content-only';
                            } else {
                                $layout_class .= ' page-panel--' . $page_item['layout'] . ' page-panel--cards';
                                $layout_class .= has_post_thumbnail($page) ? '' : ' page-panel--no-media';
                            }
                            ?>
                            <article class="<?php echo esc_attr($layout_class); ?>" style="<?php echo esc_attr($panel_style); ?>">
                                <?php if ('full' === $featured_pages_display) : ?>
                                    <div class="page-panel__content page-panel__content--fullwidth">
                                        <?php
                                        $post = $page;
                                        setup_postdata($post);
                                        the_content();
                                        ?>
                                    </div>
                                <?php else : ?>
                                    <?php if (has_post_thumbnail($page)) : ?>
                                        <a class="page-panel__media" href="<?php echo esc_url(get_permalink($page)); ?>">
                                            <?php echo get_the_post_thumbnail($page, 'plx-featured-page'); ?>
                                        </a>
                                    <?php else : ?>
                                        <span class="page-panel__media">
                                            <span class="page-panel__fallback" aria-hidden="true"></span>
                                        </span>
                                    <?php endif; ?>

                                    <div class="page-panel__body">
                                        <span class="post-card__meta"><?php echo esc_html(get_post_field('post_name', $page->ID)); ?></span>
                                        <h3 class="page-panel__title">
                                            <a href="<?php echo esc_url(get_permalink($page)); ?>"><?php echo esc_html(get_the_title($page)); ?></a>
                                        </h3>
                                        <p><?php echo esc_html(wp_trim_words(wp_strip_all_tags(get_the_excerpt($page)), 22)); ?></p>
                                        <a class="plx-button plx-button--ghost page-panel__button js-plx-pages-button" data-plx-setting="plx_featured_pages_cta_text" href="<?php echo esc_url(get_permalink($page)); ?>">
                                            <?php echo esc_html(get_theme_mod('plx_featured_pages_cta_text', plx_parallax_get_default('plx_featured_pages_cta_text'))); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php
        if ($original_post instanceof WP_Post) {
            $post = $original_post;
            setup_postdata($post);
        } else {
            wp_reset_postdata();
        }
        ?>
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
                <div class="archive-grid__title js-plx-recent-posts-title" data-plx-setting="plx_recent_posts_title"><?php echo esc_html(get_theme_mod('plx_recent_posts_title', plx_parallax_get_default('plx_recent_posts_title'))); ?></div>
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

    <?php if ($show_cta_section) : ?>
        <section class="section section--cta js-plx-cta-section">
            <div class="section__inner">
                <div class="cta-panel">
                    <div class="cta-panel__copy">
                        <span class="hero__eyebrow"><?php esc_html_e('Call to action', 'plx-parallax'); ?></span>
                        <h2 class="js-plx-cta-title" data-plx-setting="plx_cta_title"><?php echo esc_html(get_theme_mod('plx_cta_title', plx_parallax_get_default('plx_cta_title'))); ?></h2>
                        <p class="js-plx-cta-text" data-plx-setting="plx_cta_text" data-plx-multiline="true"><?php echo esc_html(get_theme_mod('plx_cta_text', plx_parallax_get_default('plx_cta_text'))); ?></p>
                    </div>
                    <div class="cta-panel__action">
                        <a class="plx-button plx-button--primary js-plx-cta-button" data-plx-setting="plx_cta_button_text" href="<?php echo esc_url(get_theme_mod('plx_cta_button_url', plx_parallax_get_default('plx_cta_button_url'))); ?>">
                            <?php echo esc_html(get_theme_mod('plx_cta_button_text', plx_parallax_get_default('plx_cta_button_text'))); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
