<?php
/**
 * Template Name: Contact Page
 *
 */

get_header(); ?>
    
<?php while ( have_posts() ) : the_post(); ?>
    <!-- Page Header -->
    <?php if ( has_post_thumbnail() ) : ?>
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( '1900', '9999' ) ); ?>
        <header class="intro-header" style="background-image: url('<?php echo $image_url[0]; ?>')">
    <?php else : ?>
        <header class="intro-header" style="background-image: url('<?php header_image(); ?>')">
    <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><?php the_title(); ?></h1>
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
                <?php the_content(); ?>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label><?php _e( 'Name', 'cleanblog' ); ?></label>
                            <input type="text" class="form-control" placeholder="<?php _e( 'Name', 'cleanblog' ); ?>" id="name" required data-validation-required-message="<?php _e( 'Please enter your name.', 'cleanblog' ); ?>">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label><?php _e('Email Address', 'cleanblog' ); ?></label>
                            <input type="email" class="form-control" placeholder="<?php _e('Email Address', 'cleanblog' ); ?>" id="email" required data-validation-required-message="<?php _e( 'Please enter your email address.', 'cleanblog' ); ?>">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label><?php _e( 'Message', 'cleanblog' ); ?></label>
                            <textarea rows="5" class="form-control" placeholder="<?php _e( 'Message', 'cleanblog' ); ?>" id="message" required data-validation-required-message="<?php _e( 'Please enter a message.', 'cleanblog' ); ?>"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <input type="hidden" id="memail" value="<?php echo get_theme_mod( 'email' ); ?>">
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default"><?php _e( 'Send', 'cleanblog' ); ?></button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>

    <hr>
    <?php endwhile; ?>

<?php get_footer(); ?>
