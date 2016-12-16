<?php
/**
 * Exibe a página que lista publicações por Categoria
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="entry-header">
				<h1 class="entry-title"><?php printf( __( '%s', 'sepecaxias' ), single_cat_title( '', false ) ); ?></h1>
			</header><!-- .entry-header -->
			
			<?php global $wp_query;
			$args = array_merge( $wp_query->query, array( 'posts_per_page' => 5 ) );
			query_posts( $args );
			
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="post excerpt">
					<?php if ( has_post_thumbnail() ) { ?>
						<a id="featured-thumbnail" href="<?php the_permalink(); ?>" rel="nofollow">
							<div class="img-thumbnail img-hover">
								<?php the_post_thumbnail(); ?>	
							</div>
						</a>
					<?php } else { ?>
						<a id="featured-thumbnail" href="<?php the_permalink(); ?>" rel="nofollow">
							<div class="featured-thumbnail img-hover">
								<img src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" alt="<?php the_title(); ?>">
							</div>
						</a>
					<?php } ?>
					<header>
						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="post-info"><span class="theauthor"><?php the_author_posts_link(); ?></span> | <span class="thetime"><?php the_time( get_option( 'date_format' ) ); ?></span></div>
					</header>
				<div class="post-content">
						<?php the_excerpt( 'Leia Mais' ); ?>
					</div>
				    <span class="leiamais"></span>
				</article>
			<?php endwhile;

			/* If no posts, then serve error message */
			else: ?>
			<div class="post">
				<p><?php _e( 'Em breve você poderá ler notícias aqui.', 'sepecaxias' ); ?></p>
			</div>
			<?php endif; 
			
			sepecaxias_paging_nav();
			wp_reset_query(); ?>
			
		</div><!-- .categorias -->
    	
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
