 <?php
/**
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
                <div class="post-heading">
                    <h1><?php the_title(); ?></h1>
                    <span class="meta"><?php cleanblog_posted_on(); ?></span>
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
                <?php the_content(); ?>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'cleanblog' ),
                        'after'  => '</div>',
                    ) );
				?>
            </div>
        </div>

        <div class="row entry-footer"  style="margin-top:30px">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php cleanblog_entry_footer(); ?>
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