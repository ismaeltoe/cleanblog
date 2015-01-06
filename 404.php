<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Clean Blog
 */

get_header(); ?>

    <!-- Page Header -->
    <header class="intro-header" style="background-image: url('<?php header_image(); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'cleanblog' ); ?></h1>
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
               <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'cleanblog' ); ?></p>

                <?php get_search_form(); ?>

                <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

                <?php if ( cleanblog_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                    <div class="widget widget_categories">
                        <h2 class="widget-title"><?php _e( 'Most Used Categories', 'cleanblog' ); ?></h2>
                        <ul>
                        <?php
                            wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'number'     => 10,
                            ) );
                        ?>
                        </ul>
                    </div><!-- .widget -->
                <?php endif; ?>

                <?php
                    /* translators: %1$s: smiley */
                    $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'cleanblog' ), convert_smilies( ':)' ) ) . '</p>';
                    the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                ?>

                <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
            </div>
        </div>
    </div>

    <hr>

<?php get_footer(); ?>
