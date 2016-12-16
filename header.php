<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />

<?php if ( is_search() || is_author() ) : ?>
	<meta name="robots" content="noindex, nofollow" />
<?php endif ?>

	<meta property="og:locale" content="pt_BR">
<?php if ( is_home() || is_front_page() ) { ?>
	<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
<?php } else { ?>
	<meta property="og:url" content="<?php the_permalink(); ?>">
<?php } ?>
	<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:image" content="<?php header_image(); ?>">
	<meta property="og:image:type" content="image/jpeg">

    <!--[if lt IE 9]><script src="<?php echo bloginfo('template_url'); ?>/scripts/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo bloginfo('template_url'); ?>/scripts/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<?php wp_head(); ?>

	<?php wp_enqueue_script( 'jquery' ); ?>
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/scripts/fonte.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/scripts/modernizr.full.min.js"></script>
	<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/scripts/bootstrap.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-2238507-12', 'sepecaxias.org.br');
	  ga('send', 'pageview');

	</script>

	<script type="text/javascript" charset="utf-8">
	var $z = jQuery.noConflict();
	// Use jQuery com a variavel $e(...)
	$z(document).ready(function(){
	$z("#inc-font").click(function () { 
	    var size = $z("p").css('font-size');
	      
	    size = size.replace('px', '');
	    size = parseInt(size) + 2; // aumenta 2px na fonte
	      
	    $z("p").animate({'font-size' : size + 'px'}); // animação ao alterar font
	  return false;
	   });

	  //diminuindo a fonte
	  $z("#dec-font").click(function () {
	    var size = $z("p").css('font-size');
	      
	    size = size.replace('px', '');
	    size = parseInt(size) - 2; // diminuir 2px na fonte
	      
	    $z("p").animate({'font-size' : size + 'px'}); // animação ao alterar font
	    return false;
	  });
	    
	});
	</script>

</head>

<body <?php body_class(); ?> role="document">

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<div class="rsociais">
				<ul>
					<li><a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/pages/Sepe-Caxias/161300497262784" target="_blank"><i class="fa fa-facebook"></i></a></li>
				</ul>
			</div>

			<?php if ( get_header_image() ) : ?>
			<div id="site-header">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			</div>
			<?php else: ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>

			
			<div id="search-container" class="search-box-wrapper">
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
			</div>

			<div class="decinc">
				<span id="dec-font">
					<img src="<?php echo bloginfo('template_url'); ?>/images/decrease_font.png" alt="Diminuir" />
				</span>
				<span id="inc-font">
					<img src="<?php echo bloginfo('template_url'); ?>/images/increase_font.png" alt="Aumentar" />
				</span>
			</div>
		</div>
		
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<?php
				            wp_nav_menu( array(
				                'menu'              => 'primary',
				                'theme_location'    => 'primary',
				                'depth'             => 2,
				                'container'         => 'div',
				                'container_class'   => 'collapse navbar-collapse',
				       			'container_id'      => 'bs-example-navbar-collapse-1',
				                'menu_class'        => 'nav navbar-nav',
				                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				                'walker'            => new wp_bootstrap_navwalker())
				            );
				        ?>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</nav>

	</header><!-- #masthead -->

	<?php if ( is_home() ) { ?>

	<div id="clear"></div>

	<section class="slider-home">
		<aside id="slider">
			<?php get_template_part( 'sidebar-content', 'none' ); ?>
		</aside>
	</section>
	<?php  } ?>

	<div id="clear"></div>
	
	<section id="main" class="site-main container-fluid" role="main">