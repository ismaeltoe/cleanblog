<?php get_header(); ?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('<?php header_image(); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?php bloginfo( 'name' ); ?></h1>
                        <hr class="small">
                        <span class="subheading"><?php bloginfo( 'description' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content' ); ?>
                    <?php endwhile; ?>
                    <!-- Pager -->
                    <?php cleanblog_content_nav(); ?>
                <?php else : ?>
                    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                    <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', TDOMAIN ), admin_url( 'post-new.php' ) ); ?></p>

                    <?php elseif ( is_search() ) : ?>

                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', TDOMAIN ); ?></p>
                    <?php get_search_form(); ?>

                    <?php else : ?>

                    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', TDOMAIN ); ?></p>
                    <?php get_search_form(); ?>

                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <hr>

<?php get_footer(); ?>
