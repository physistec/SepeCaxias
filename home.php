	<?php get_header(); ?>

	<div id="clear"></div>

  	<aside class="content-area" role=”complementary”>

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.jcarousel.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/jcarousel.responsive.js"></script>
		<div class="carrossel"><!--Miniaturas-->
			<div class="jcarousel-wrapper">
	            <div class="jcarousel">
	                <ul>
						<?php
						$miniaturas_args = array(
							'numberposts' => -1,
							'post_type' => 'cartaz',
							'post_parent' => 0
						);
						$miniaturas = get_posts( $miniaturas_args );
						foreach ( $miniaturas as $image ) {
							$image_atts = array(
								'alt'	=> '',
								'title'	=> '',
							);							
							$img = get_the_post_thumbnail( $image->ID, array(300, 300), $image_atts );
							$url = wp_get_attachment_url( get_post_thumbnail_id($image->ID) );							
							echo '<li><a class="add-bottom" data-rel="lightbox-0" href="'.esc_url($url).'" target="_blank"><div id="lightbox" class="img-thumbnail img-hover">'.$img.'</div></li></a>';
						} ?>
	                </ul>
	            </div>

	            <a href="#" class="jcarousel-control-prev"><div class="seta_esq">&nbsp;</div></a>
	            <a href="#" class="jcarousel-control-next"><div class="seta_dir">&nbsp;</div></a>
	        </div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<div class="videos">
					<div id="secondary">
						<?php if ( is_active_sidebar( 'sidebar-videos' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'sidebar-videos' ); ?>
						</div><!-- #videos-sidebar -->
						<?php endif; ?>
					</div><!-- #secondary -->
				</div><!-- .videos -->
			</div>

			<div class="col-md-4">
				<div class="imagem">
					<div id="secondary">
						<?php if ( is_active_sidebar( 'sidebar-imagem' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'sidebar-imagem' ); ?>
						</div><!-- #imagem-sidebar -->
						<?php endif; ?>
					</div><!-- #secondary -->
				</div><!-- .imagem -->
			</div>
		</div>

		<div class="col_esquerda">

			<div class="noticias">

	   			<h1 class="cat-tit"><i class="fa fa-newspaper-o"></i> Notícias</h1>
				<?php
				query_posts('&cat=5&posts_per_page=5');
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
				<?php endif; ?>
			</div><!-- .noticias -->
	    		
		</div><!-- .col_esquerda -->    		
	
		<div class="col_direita">

 			<div class="avisos box_round">
    			<h1 class="cat-tit" style="margin-top: 1px;"><i class="fa fa-thumb-tack"></i> Avisos</h1>
				<?php
				query_posts('&cat=10&posts_per_page=4');
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article class="post excerpt">
						<header>
							<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
					<p><?php _e( 'Em breve você poderá ler avisos aqui.', 'sepecaxias' ); ?></p>
				</div>
				<?php endif; ?>
			</div><!-- .avisos -->
		
			<div class="fanpage">
        		<h1 class="cat-tit"><i class="fa fa-facebook"></i> Curta nossa página</h1>
			<br />
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like-box" data-href="http://www.facebook.com/pages/Sepe-Caxias/161300497262784" data-width="300" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
		</div>

			<h1 class="cat-tit floatleft"><i class="fa fa-users"></i> Visitas</h1><div class="contador alignright"><?php echo do_shortcode("[CPD_VISITORS_TOTAL]"); ?></div>
			
			<?php get_template_part( 'sidebar', 'none' ); ?>

	   	</div><!-- .col_direita -->

		<div class="artigos">
			<h1 class="cat-tit"><i class="fa fa-book"></i> Artigos</h1>
			<ul class="colunas">
				<?php
				query_posts('&cat=6&posts_per_page=10');
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<li class="post">
						<header>
							<h2 class="title"><i class="fa fa-file-text-o" style="color: #fff;"></i>&nbsp;&nbsp;<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						</header>
					</li>
				<?php endwhile;

				/* If no posts, then serve error message */
				else: ?>
				<div class="post">
					<p><?php _e( 'Em breve você poderá ler artigos aqui.', 'sepecaxias' ); ?></p>
				</div>
				<?php endif; ?>
			</ul>
		</div><!-- .artigos -->

		<div class="banners">
			<div class="plantao_juridico">
			<h1 class="cat-tit"><i class="fa fa-calendar"></i> Plantão Jurídico</h1>
				<div class="plantao img-thumbnail img-hover"></div>
			</div>
			<div class="fiquedeolho">
			    <h1 class="cat-tit"><i class="fa fa-eye"></i> Fique de Olho</h1>
				<div class="fdo04 campanha img-thumbnail img-hover"></div>
				<div class="fdo03 campanha img-thumbnail img-hover"></div>
				<div class="fdo02 campanha img-thumbnail img-hover"></div>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>plano-municipal-de-educacao/" title="Plano Municipal de Educação"><div class="fdo01 campanha img-thumbnail img-hover"></div></a>
			</div>
		</div>

	</aside><!-- #conteudo .site-content -->
	
	<?php get_footer(); ?>