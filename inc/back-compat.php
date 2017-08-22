<?php
/**
 * PhT SPCX compat functionality
 * 
 * Impede a execução do tema em versões anteriores à 3.6 do WordPress,
 * uma vez que este tema não é feito para ser compatível com versões anteriores
 * e conta com muitas funções mais recentes e com as mudanças introduzidas na versão 3.6.
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
 */

/**
 * Previne para não haver mal funcionamento em versões anteriores a 3.6 do WordPress.
 *
 * Muda para o tema padrão.
 *
 * @since Sepe Caxias1.0
 * @return void
 */
function sepecaxias_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'sepecaxias_upgrade_notice' );
}
add_action( 'after_switch_theme', 'sepecaxias_switch_theme' );

/**
 * Mensagem de malfuncionamento.
 *
 * Exibe mensagem para atualização após tentativas frustradas de executar 
 * o tema Sepe Caxias em versão anterior a 3.6 do WordPress.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
function sepecaxias_upgrade_notice() {
	$message = sprintf( __( 'O tema Sepe Caxias requer uma versão mais atualizada do WordPress. Você está utilizando a versão %s. Por favor, atualize e tente novamente.', 'sepecaxias' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Impede que Configuradores de Tema sejam carregados em versões anteriores à 3.6 do WordPress.
 *
 * @since Sepe Caxias 1.0
 * @return void
 */
function sepecaxias_customize() {
	wp_die( sprintf( __( 'O tema Sepe Caxias requer uma versão mais atualizada do WordPress. Você está utilizando a versão %s. Por favor, atualize e tente novamente.', 'sepecaxias' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'sepecaxias_customize' );

/**
 * Impede que PreviewThemes sejam carregados em versões anteriores à 3.6 do WordPress.
 *
 * @since Sepe Caixas 1.0
 * @return void
 */
function sepecaxias_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'O tema Sepe Caxias requer uma versão mais atualizada do WordPress. Você está utilizando a versão %s. Por favor, atualize e tente novamente.', 'sepecaxias' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'sepecaxias_preview' );
