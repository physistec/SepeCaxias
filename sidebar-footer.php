<?php
/**
 * The Footer Sidebar
 *
 * @package    WordPress
 * @subpackage Sepe_Caxias
 * @since      Sepe Caxias 1.0
*/
?>

<section class="footer-widgets">
    <div class="container">
        <div class="row">
            <?php
            if (is_active_sidebar('sidebar-2')) {
            ?>
            <div class="col-md-4">
                <div id="supplementary">
                    <div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div><!-- #footer-left-sidebar -->
                </div><!-- #supplementary -->
            </div>
            <?php
            }
            ?>
            
            <?php
            if (is_active_sidebar('sidebar-3')) {
            ?>
            <div class="col-md-4">
                <div id="supplementary">
                    <div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar('sidebar-3'); ?>
                    </div><!-- #footer-center-sidebar -->
                </div><!-- #supplementary -->
            </div>
            <?php
            }
            ?>
            
            <?php
            if (is_active_sidebar('sidebar-4')) {
            ?>
            <div class="col-md-4">
                <div id="supplementary">
                    <div id="footer-sidebar" class="footer-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar('sidebar-4'); ?>
                    </div><!-- #footer-right-sidebar -->
                </div><!-- #supplementary -->
            </div>
            <?php
            }
            ?>
        </div><!--.row-->
    </div><!--.container-->

</section><!--.footer-sidebar-->
