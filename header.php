<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php _e( 'Toggle navigation', TDOMAIN ); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                    if ( has_nav_menu( 'primary' ) ) :
                        wp_nav_menu( 
                            array( 
                                'theme_location' => 'primary',
                                'container' => '',
                                'menu_class' => 'nav navbar-nav navbar-right' 
                            ) 
                        );
                    else : 
                        $pages = get_pages( 'sort_column=post_parent,menu_order' ); 
                ?>
                        <ul class="nav navbar-nav navbar-right">
                <?php
                        foreach ( $pages as $page ) :
                ?>
                            <li><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>
                <?php
                        endforeach; ?>
                        </ul>
                <?php
                    endif;
                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>