<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
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
                <span class="hero__eyebrow"><?php echo esc_html(get_theme_mod('plx_eyebrow_text', __('Parallax WordPress Theme', 'plx-parallax'))); ?></span>
                <h1 class="hero__title"><?php echo esc_html(get_theme_mod('plx_hero_title', __('Build depth into every scroll.', 'plx-parallax'))); ?></h1>
                <p class="hero__text"><?php echo esc_html(get_theme_mod('plx_hero_text', __('A sharp, responsive theme with flexible gradients, background imagery, typography controls, and motion tuned for both desktop and mobile.', 'plx-parallax'))); ?></p>
                <div class="hero__actions">
                    <a class="plx-button plx-button--primary" href="<?php echo esc_url(get_theme_mod('plx_primary_button_url', '#content')); ?>">
                        <?php echo esc_html(get_theme_mod('plx_primary_button_text', __('Explore the layout', 'plx-parallax'))); ?>
                    </a>
                    <a class="plx-button plx-button--ghost" href="<?php echo esc_url(get_theme_mod('plx_secondary_button_url', home_url('/blog'))); ?>">
                        <?php echo esc_html(get_theme_mod('plx_secondary_button_text', __('Read the latest posts', 'plx-parallax'))); ?>
                    </a>
                </div>
            </div>
            <aside class="hero__card">
                <p class="hero__card-title"><?php esc_html_e('Theme profile', 'plx-parallax'); ?></p>
                <div class="hero__stat-grid">
                    <div class="hero__stat">
                        <strong><?php esc_html_e('Fluid', 'plx-parallax'); ?></strong>
                        <span><?php esc_html_e('Responsive across desktop, tablet, and mobile.', 'plx-parallax'); ?></span>
                    </div>
                    <div class="hero__stat">
                        <strong><?php esc_html_e('Custom', 'plx-parallax'); ?></strong>
                        <span><?php esc_html_e('Fonts, colors, images, and gradients from Customizer.', 'plx-parallax'); ?></span>
                    </div>
                    <div class="hero__stat">
                        <strong><?php esc_html_e('Motion', 'plx-parallax'); ?></strong>
                        <span><?php esc_html_e('Parallax tuned with optional mobile fallback.', 'plx-parallax'); ?></span>
                    </div>
                    <div class="hero__stat">
                        <strong><?php esc_html_e('Editorial', 'plx-parallax'); ?></strong>
                        <span><?php esc_html_e('Strong visual rhythm for landing pages and content.', 'plx-parallax'); ?></span>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <section class="section section--intro">
        <div class="section__inner">
            <div class="intro-panel">
                <div class="intro-panel__content">
                    <h2><?php esc_html_e('A front page that feels layered, not flat.', 'plx-parallax'); ?></h2>
                    <p><?php esc_html_e('The theme uses image depth, gradient composition, and restrained motion to create presence without breaking usability. Adjust the visual system from the Customizer and keep the layout seamless on both large and small screens.', 'plx-parallax'); ?></p>
                    <div class="feature-grid">
                        <article class="feature-card">
                            <h3><?php esc_html_e('Gradient control', 'plx-parallax'); ?></h3>
                            <p><?php esc_html_e('Three gradient stops, adjustable angle, and overlay intensity.', 'plx-parallax'); ?></p>
                        </article>
                        <article class="feature-card">
                            <h3><?php esc_html_e('Image layers', 'plx-parallax'); ?></h3>
                            <p><?php esc_html_e('Hero and panel imagery can be swapped without editing templates.', 'plx-parallax'); ?></p>
                        </article>
                        <article class="feature-card">
                            <h3><?php esc_html_e('Behavior tuning', 'plx-parallax'); ?></h3>
                            <p><?php esc_html_e('Sticky header, smooth scroll, parallax speed, and mobile handling.', 'plx-parallax'); ?></p>
                        </article>
                    </div>
                </div>
                <div class="intro-panel__media parallax-layer" data-depth="0.08"></div>
            </div>
        </div>
    </section>

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
                    <h2><?php esc_html_e('Start with a static front page.', 'plx-parallax'); ?></h2>
                    <p><?php esc_html_e('Create a page in WordPress, assign it as your homepage, and its content will appear here under the parallax hero.', 'plx-parallax'); ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <?php
    $recent_posts = new WP_Query(array(
        'posts_per_page'      => 3,
        'ignore_sticky_posts' => true,
    ));

    if ($recent_posts->have_posts()) :
        ?>
        <section class="section">
            <div class="section__inner">
                <div class="archive-grid__title"><?php esc_html_e('Latest stories', 'plx-parallax'); ?></div>
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
