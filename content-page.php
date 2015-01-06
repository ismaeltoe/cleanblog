<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Clean Blog
 */
?>
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
                <?php 
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'cleanblog' ),
                        'after'  => '</div>',
                    ) );

                    edit_post_link( __( 'Edit', 'cleanblog' ), '<span class="edit-link">', '</span>' );
                ?>
            </div>
        </div>

        <?php if ( comments_open() || get_comments_number() ) : ?>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div>
                    <?php comments_template(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <hr>