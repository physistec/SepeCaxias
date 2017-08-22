<?php // Não apague essas linhas
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Por favor, não acesse essa página diretamente. Obrigado!');

	if (!empty($post->post_password)) { // Se há uma senha
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // e não encontrar o cookie
			?>

			<p class="nocomments">Esta publicação é protegida por senha. Entre com a senha para ver os comentários.</p>

			<?php
			return;
		}
	}

	/* Esta variável é para alternar o fundo do comentário */
	/*$oddcomment = 'class="alt" ';*/
	$oddcomment = 'alt';
?>

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Sem comentários', 'Um comentário', '% Comentários' );?></h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<!--<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">-->
        <li class="<?php echo $oddcomment; ?> <?php if ($comment->comment_author_email == get_the_author_email()) { echo 'author_comment'; } ?>" id="comment-<?php comment_ID() ?>">
        
			<?php echo get_avatar( $comment, 40 ); ?><br />
			<cite><?php comment_author_link() ?></cite>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Seu comentário está aguardando a moderação.</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata">Publicado em <?php comment_date('j M Y') ?> | <?php comment_time() ?> <?php edit_comment_link('edite','&nbsp;&nbsp;',''); ?></small>

			<?php comment_text() ?>

		</li>

	<?php
		/* Modifique qualquer comentario para uma classe diferente */
		/*$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';*/
		$oddcomment = ( empty( $oddcomment ) ) ? 'alt' : '';
	?>

	<?php endforeach; /* end for each Comentário */ ?>

	</ol>

 <?php else : // Isso é exibido se ainda houver comentários ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- Se comentários são abertos, mas não há comentários. -->

	 <?php else : // Comentário fechados ?>
		<!-- Se comentários são fechados. -->
		<p class="nocomments">Comentários fechados.</p>

	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Deixe um comentário</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Voc&ecirc; precisa <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">fazer o login</a> para publicar um comentário.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Saia desta conta">Sair &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Nome <?php if ($req) echo "(requerido)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>E-mail (n&atilde;o será exibido) <?php if ($req) echo "(requerido)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Voc&ecirc; pode usar essas tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar Comentário" size="15" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // Se o registro é requerido e não estiver logado ?>

<?php endif; // Se você apagar isso o céu cairá em sua cabeça ?>