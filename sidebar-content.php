<?php
/**
 * The Content Sidebar
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
 */

if ( ! is_active_sidebar( 'sidebar-home' ) ) {
	return;
}
?>
<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-home' ); ?>
</div><!-- #home-sidebar -->
