<?php
/**
 * The Video Sidebar
 *
 * @package WordPress
 * @subpackage Sepe_Caxias
 * @since Sepe Caxias 1.0
 */

if ( ! is_active_sidebar( 'sidebar-videos' ) ) {
	return;
}
?>
<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-videos' ); ?>
</div><!-- #video-sidebar -->
