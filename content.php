<?php
/**
 * @package Clean Blog
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post-preview' ); ?>>

    <a href="<?php the_permalink(); ?>" rel="bookmark">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <h3 class="post-subtitle"><?php echo get_the_excerpt(); ?></h3>
    </a>
	
	<?php if ( 'post' == get_post_type() ) : ?>
    <p class="post-meta">
    	<?php cleanblog_posted_on(); ?>
   	</p>
	<?php endif; ?>

    <div class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'cleanblog' ), '<span class="edit-link">', '</span>' ); ?>
    </div>

</div>

<hr>