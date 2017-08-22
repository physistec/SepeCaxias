<?php /**
 * Template Name: Documentos
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
 */
 
	get_header(); ?>

	<div id="clear"></div>

  	<aside class="content-area" role=”complementary”>
				
			<div class="col_esquerda">
	
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
			</div><!-- .col_esquerda -->
		
			<div class="col_direita">
				<?php dynamic_sidebar('sidebar-documents'); ?>
			</div><!-- .col_direita -->
			
		</aside><!-- .content-area -->

	<?php get_footer(); ?>
