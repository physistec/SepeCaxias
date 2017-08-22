<?php get_header(); ?>

            <div id="conteudo" class="site-content"  role="main">
                
                    <div id="post">
						<?php if ( have_posts() ) : ?>
                                        <h1 class="page-title"><?php printf( __( 'Resultado para: "%s"', 'specaxias' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                                        <?php get_template_part( 'content' ); ?>
            		</div>
					<?php else : ?>
                        <div id="post">
	                    	<?php get_template_part('404'); ?>
                        </div>
                    <?php endif; ?>

			</div><!-- #conteudo -->
            
<?php get_footer(); ?>