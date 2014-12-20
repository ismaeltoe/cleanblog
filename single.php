<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'single' ); ?>

    <?php endwhile; ?>

<?php get_footer(); ?>
