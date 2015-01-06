<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Clean Blog
 */
?>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <ul class="list-inline text-center">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </ul>
                    <?php endif; ?>
                    <p class="copyright text-muted"><?php _e( 'Powered By WordPress and', 'cleanblog' ); ?> <a href="https://github.com/ismaeltoe/cleanblog/">Clean Blog</a></p>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
