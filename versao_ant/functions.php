<?php
/**
 * Funções e Definições do Tema Sepe Caxias
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
*/
 
if ( ! isset( $content_width ) ) {
	$content_width = 300; /* pixels */
}

/**
 * Sepe Caxias only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'sepecaxias_setup' ) ) :

function sepecaxias_setup() {

	// Aplicando possibilidade de tradução do tema.
	load_theme_textdomain( 'sepecaxias', get_template_directory() . '/languages' );

	// Adiciona link RSS no <head> de posts e comentários.
	add_theme_support( 'automatic-feed-links' );

	// Habilita suporte a miniaturas, e define tamanhos.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'destaque', 520, 250, true );
	add_image_size( 'medio', 300, 200, true );
	add_image_size( 'pequeno', 140, 100, true );
	
	/**
	 * Bootstrap Navigation
	 * @since Sepe Caxias 1.0
	 * @return void
	 */
	require_once('wp_bootstrap_navwalker.php');
	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'sepecaxias' ),
	) );
	
	/*
	 * Muda marcação padrão do núcleo para formulário de pesquisa,
	 * formulário de comentários e comentários para uma saída HTML5 válida.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Habilita suporte a Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio',
	) );

	// Este tema permite que usuários personalizem a imagem de fundo.
	// add_theme_support( 'custom-background', apply_filters( 'sepecaxias_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'sepecaxias_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // sepecaxias_setup
add_action( 'after_setup_theme', 'sepecaxias_setup' );

/**
 * Ajusta o tamanho da imagem adicionada.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
function sepecaxias_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 940;
	}
}

add_action( 'template_redirect', 'sepecaxias_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Sepe Caxias 1.0
 * @return array An array of WP_Post objects.
 */
function sepecaxias_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Sepe Caxias.
	 *
	 * @since Sepe Caxias 1.0
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'sepecaxias_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Sepe Caxias 1.0
 * @return bool Whether there are featured posts.
 */
function sepecaxias_has_featured_posts() {
	return ! is_paged() && (bool) sepecaxias_get_featured_posts();
}

/**
 * Registra áreas de Widget.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
 
function sepecaxias_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'SepeCaxias_Widget' );

	register_sidebar( array(
		'name'          => __( 'Sidebar Home', 'sepecaxias' ),
		'id'            => 'sidebar-home',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sepecaxias' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Área de Rodapé - Esquerda', 'sepecaxias' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Área de Rodapé - Centro', 'sepecaxias' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Área de Rodapé - Direita', 'sepecaxias' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

add_action( 'widgets_init', 'sepecaxias_widgets_init' );

/**
 * Register Lato Google font for Sepe Caxias.
 *
 * @since Sepe Caxias 1.0
 * @return string
 */
function sepecaxias_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'sepecaxias' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
function sepecaxias_scripts() {
	wp_enqueue_style( 'sepecaxias-fonts', 'http://fonts.googleapis.com/css?family=Sintony' );
	wp_enqueue_style( 'sepecaxias-basic-style', get_stylesheet_uri() );

	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'sepecaxias-lato', sepecaxias_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'sepecaxias-style', get_stylesheet_uri(), array( 'genericons' ) );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'sepecaxias-ie', get_template_directory_uri() . '/css/ie.css', array( 'sepecaxias-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'sepecaxias-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'sepecaxias-keyboard-image-navigation', get_template_directory_uri() . '/scripts/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-2' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	wp_enqueue_script( 'sepecaxias-script', get_template_directory_uri() . '/scripts/functions.js', array( 'jquery' ), '20131209', true );
}
add_action( 'wp_enqueue_scripts', 'sepecaxias_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
function sepecaxias_admin_fonts() {
	wp_enqueue_style( 'sepecaxias-lato', sepecaxias_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'sepecaxias_admin_fonts' );

if ( ! function_exists( 'sepecaxias_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
function sepecaxias_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Sepe Caxias attachment size.
	 *
	 * @since Sepe Caxias 1.0
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'sepecaxias_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Exibe uma lista de todos os usuários que publicam pelo menos um post.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
if ( ! function_exists( 'sepecaxias_list_authors' ) ) :
function sepecaxias_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Segue adiante caso o usuário ainda não tenha publicado.
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Artigo', '%d Artigos', $post_count, 'sepecaxias' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Sepe Caxias 1.0
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function sepecaxias_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-1' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-2' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_active_sidebar( 'sidebar-4' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'sepecaxias_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 * @since Sepe Caxias 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function sepecaxias_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'sepecaxias_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Sepe Caxias 1.0
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function sepecaxias_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Página %s', 'sepecaxias' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'sepecaxias_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
//require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}
/* End of extend the default WordPress body classes. */
 
/**
 * 
 * Registra a personalização do Avatar
 * 
 * @since Sepe Caxias 1.0
 * @return void
 */
add_filter( 'sepecaxias_avatar_defaults', 'spcx_avatar' );
 
function spcx_avatar ($sepecaxias_avatar_defaults) {
$myavatar = get_bloginfo('template_directory') . '/images/spcxavatar.gif';
$avatar_defaults[$myavatar] = "Sepe Caxias";
return $sepecaxias_avatar_defaults;
}

/**
 * Habilita suporte a resumo.
 * 
 * @since Sepe Caxias 1.0
 * @return void
 */
function leia_mais($more) {
	global $post;
	return ' <a href="'. get_permalink( $post->ID ) . '" title="Continue lendo..." class="leiamais">Continue lendo...</a>';
}
add_filter( 'excerpt_more', 'leia_mais' );

function tamanho_do_resumo($length) {
	return 35;
}

add_filter( 'excerpt_length', 'tamanho_do_resumo' );

add_action( 'widgets_init', 'sepecaxias_widgets_init' );

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

?>