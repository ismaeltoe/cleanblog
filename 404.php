<?php get_header(); ?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?php _e( 'Not Found', TDOMAIN ); ?></h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
               <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', TDOMAIN ); ?></p>

                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <hr>

<?php get_footer(); ?>
