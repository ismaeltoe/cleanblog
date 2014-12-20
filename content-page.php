    <!-- Page Header -->
    <?php if ( has_post_thumbnail() ) : ?>
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( '1900', '9999' ) ); ?>
        <header class="intro-header" style="background-image: url('<?php echo $image_url[0]; ?>')">
    <?php else : ?>
        <header class="intro-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/home-bg.jpg')">
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
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', TDOMAIN ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );

                    edit_post_link( __( 'Edit', TDOMAIN ), '<span class="edit-link">', '</span>' );
                ?>
            </div>
        </div>

        <?php if ( comments_open() || '0' != get_comments_number() ) : ?>
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