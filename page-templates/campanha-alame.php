<?php
/**
 * Template Name: Campanha Alame
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
 */

//get_header(); ?>

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

	<header id="masthead" class="site-header" role="banner" style="margin-bottom: -20px;"></header><!-- #masthead -->

	<aside class="content-area" role=”complementary”>

	<?php
		if ( is_front_page() && sepecaxias_has_featured_posts() ) {
			// Include the featured content template.
			get_template_part( 'featured-content' );
		}
	?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					endwhile;
				?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</aside><!-- #main-content -->

	<?php get_footer(); ?>
