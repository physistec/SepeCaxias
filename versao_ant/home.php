	<?php get_header(); ?>

		<?php get_template_part( 'sidebar-content', 'none' ); ?>

    	<div id="clear"></div>
    	
      	<aside class="content-area" role=”complementary”>

			<div id="clear" class="divisor"></div>

    		<div class="cartazes_top row">
   				<a class="add-bottom" data-rel="lightbox-0" href="<?php echo get_stylesheet_directory_uri(); ?>/images/cartazes/resolucao_007_2007.jpg" target="_blank"><div id="lightbox" class="cartaz00 img-thumbnail img-hover"></div></a>
   				<a class="add-bottom" data-rel="lightbox-0" href="<?php echo get_stylesheet_directory_uri(); ?>/images/cartazes/toda_crianca_na_escola.jpg" target="_blank"><div id="lightbox" class="cartaz01 img-thumbnail img-hover"></div></a>
   				<a class="add-bottom" data-rel="lightbox-0" href="<?php echo get_stylesheet_directory_uri(); ?>/images/cartazes/cade_meu_salario_redest.jpg" target="_blank"><div id="lightbox" class="cartaz02 img-thumbnail img-hover"></div></a>
    		</div><!-- .cartazes -->

    		<div class="cartazes_bottom row">
   				<a class="add-bottom" data-rel="lightbox-0" href="<?php echo get_stylesheet_directory_uri(); ?>/images/cartazes/13o_indefinido.jpg" target="_blank"><div id="lightbox" class="cartaz03 img-thumbnail img-hover"></div></a>
   				<a class="add-bottom" data-rel="lightbox-0" href="<?php echo get_stylesheet_directory_uri(); ?>/images/cartazes/natal_magro.jpg" target="_blank"><div id="lightbox" class="cartaz04 img-thumbnail img-hover"></div></a>
   				<a class="add-bottom" data-rel="lightbox-0" href="<?php echo get_stylesheet_directory_uri(); ?>/images/cartazes/sem_previsao_13o.jpg" target="_blank"><div id="lightbox" class="cartaz05 img-thumbnail img-hover"></div></a>
    		</div><!-- .cartazes -->

			<div id="clear" class="divisor"></div>

    		<div class="videos">
				<div class="box_video"><!--Vídeo 01-->
					<!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
					<video class="wp-video-shortcode" id="video-01" preload="metadata" controls="controls" width="300" height="265">
						<source type="video/mp4" src="<?php echo get_stylesheet_directory_uri(); ?>/images/videos/poema_contra_reducao_da_maioridade_penal.mp4">
					</video>
					<center><a class="video-tit" href="<?php echo get_stylesheet_directory_uri(); ?>/images/videos/poema_contra_reducao_da_maioridade_penal.mp4" target="_blank">Redução da Maioridade Penal</a></center>
				</div>

				<div class="box_video"><!--Vídeo 02-->
					<!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
					<video class="wp-video-shortcode" id="video-02" preload="metadata" controls="controls" width="300" height="265">
						<source type="video/mp4" src="<?php echo get_stylesheet_directory_uri(); ?>/images/videos/anamatra_contra_terceirizacao_do_trabalho.mp4">
					</video>
					<center><a class="video-tit" href="<?php echo get_stylesheet_directory_uri(); ?>/images/videos/anamatra_contra_terceirizacao_do_trabalho.mp4" target="_blank">Contra Terceirização do Trabalho</a></center>

				</div>
				
				<div class="box_video"><!--Vídeo 03-->
					<!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
					<video class="wp-video-shortcode" id="video-02" preload="metadata" controls="controls" width="300" height="265">
						<source type="video/mp4" src="<?php echo get_stylesheet_directory_uri(); ?>/images/videos/beto_richa_educacao_parana.mp4">
					</video>
					<center><a class="video-tit" href="<?php echo get_stylesheet_directory_uri(); ?>/images/videos/beto_richa_educacao_parana.mp4" target="_blank">Beto Richa e a Educação no Paraná</a></center>

				</div>
    		</div><!-- .videos -->
    		
    		<div class="col_esquerda">

    			<div class="noticias">

       				<h1 class="cat-tit"><i class="fa fa-newspaper-o"></i> Notícias</h1>
					<?php
					query_posts('&cat=5&posts_per_page=4');
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

     			<div class="avisos">
        			<h1 class="cat-tit" style="margin-top: 1px;"><i class="fa fa-thumb-tack"></i> Avisos</h1>
					<?php
					query_posts('&cat=10&posts_per_page=2');
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
					<center><div class="fb-like-box" data-href="http://www.facebook.com/pages/Sepe-Caxias/161300497262784" data-width="300" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div></center>
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
							<?php //if ( has_post_thumbnail() ) { ?>
								<!--a id="featured-thumbnail" href="<?php the_permalink(); ?>" rel="nofollow">
									<div class="img-thumbnail img-hover">
										<?php the_post_thumbnail(); ?>	
									</div>
								</a-->
							<?php //} else { ?>
								<!--a id="featured-thumbnail" href="<?php the_permalink(); ?>" rel="nofollow">
									<div class="featured-thumbnail img-hover">
										<img src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" alt="<?php the_title(); ?>">
									</div>
								</a-->
							<?php //} ?>
							<header>
								<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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

			<!--div class="banners">
				<div class="plantao_juridico">
    				<h1 class="cat-tit"><i class="fa fa-calendar"></i> Plantão Jurídico</h1>
					<div class="plantao img-thumbnail img-hover"></div>
				</div>
				<div class="fiquedeolho">
				    <h1 class="cat-tit"><i class="fa fa-eye"></i> Fique de Olho</h1>
					<div class="campanha img-thumbnail img-hover"></div>
					<div class="campanha img-thumbnail img-hover"></div>
					<div class="campanha img-thumbnail img-hover"></div>
					<div class="campanha img-thumbnail img-hover"></div>
				</div>
			</div-->

		</aside><!-- #conteudo .site-content -->
		
	<?php get_footer(); ?>