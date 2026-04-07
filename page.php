<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main>
    <?php while (have_posts()) : the_post(); ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
