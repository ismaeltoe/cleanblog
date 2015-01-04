    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <ul class="list-inline text-center">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </ul>
                    <?php endif; ?>
                    <p class="copyright text-muted"><?php _e( 'Powered By WordPress and', TDOMAIN ); ?> <a href="https://github.com/ismaeltoe/cleanblog/">Clean Blog</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

    <?php if ( is_page_template( 'page-templates/contact.php' ) ) : ?>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/clean-blog.min.js"></script>
    <?php endif; ?>

    <?php wp_footer(); ?>

</body>

</html>
