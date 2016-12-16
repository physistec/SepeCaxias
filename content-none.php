<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
 */
?>

<h1 class="page-title"><?php _e( 'Não encontrado', 'sepecaxias' ); ?></h1>


	<article id="post" class="hentry">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Preparado(a) para seu primeiro post? <a href="%1$s">Comece por aqui</a>.', 'sepecaxias' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

		<div class="nao-encontrado">&nbsp;</div>
		<p>&nbsp;</p>
		<p><?php _e( 'Desculpe-nos, mas o que você procura pode não estar aqui. Por favor, tente novamente com outras palavras.', 'sepecaxias' ); ?></p>

		<?php else : ?>

		<div class="nao-encontrado">&nbsp;</div>
		<p>&nbsp;</p>
		<p><?php _e( 'Desculpe-nos, mas o que você procura pode não estar aqui. Talvez, digitando no campo de pesquisa na parte superior, possa ajudar', 'sepecaxias' ); ?></p>

		<?php endif; ?>
	
	</article>
	
<!-- .page-content -->
