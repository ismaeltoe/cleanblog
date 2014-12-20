    <!-- Page Header -->
    <?php if ( has_post_thumbnail() ) : ?>
        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( '1900', '9999' ) ); ?>
        <header class="intro-header" style="background-image: url('<?php echo $image_url[0]; ?>')">
    <?php else : ?>
        <header class="intro-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/post-bg.jpg')">
    <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php the_title(); ?></h1>
                        <span class="meta"><?php _e( 'Posted by', TDOMAIN ); ?> <?php the_author_posts_link(); ?> <?php _e( 'on', TDOMAIN ); ?> <?php the_time( get_option( 'date_format' ) ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
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
					?>
                </div>
            </div>

            <div class="row" style="margin-top:20px">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p class="tags"><?php the_tags( __( 'Tags: ', TDOMAIN ), ' • ', '' ); ?></p>
                </div>
            </div>

            <div class="row" style="margin-top:20px">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="entry-meta">
                        <?php edit_post_link( __( 'Edit', TDOMAIN ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                </div>
            </div>

            <?php if ( comments_open() || get_comments_number() ) : ?>
            <div class="row" style="margin-top:30px">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div>
                        <?php comments_template(); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </article>

    <hr>