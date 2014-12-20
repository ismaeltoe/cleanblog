<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-preview' ); ?>>

    <a href="<?php the_permalink(); ?>" rel="bookmark">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <h3 class="post-subtitle"><?php echo get_the_excerpt(); ?></h3>
    </a>

    <p class="post-meta"><?php _e( 'Posted by', TDOMAIN ); ?> <?php the_author_posts_link(); ?> <?php _e( 'on', TDOMAIN ); ?> <?php the_time( get_option( 'date_format' ) ); ?></p>

    <div class="entry-meta">
		<?php edit_post_link( __( 'Edit', TDOMAIN ), '<span class="edit-link">', '</span>' ); ?>
    </div>

</div>

<hr>