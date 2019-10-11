    <div id="clear"></div>
    
    <div id="toTop" style="display: none;"><i class="fa fa-chevron-circle-up"></i></div>

    </section><!-- #main -->

    <footer class="site-footer" role="contentinfo">

        <?php if (has_nav_menu('secondary')) : ?>
        <nav role="navigation" class="navigation site-navigation secondary-navigation">
            <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
        </nav>
        <?php endif; ?>

        <?php get_sidebar('sidebar-3'); ?>

        <div class="site-info">
            <p><?php echo date("Y");?> &copy; SEPE Caxias - Sindicato Estadual dos Profissionais de Educação do RJ - Rua Conde Porto Alegre, 131<br />
            Vinte e Cinco de Agosto - Duque de Caxias - RJ - CEP 25070-350 - (21)2671-1709</p>
            <p><a href="mailto:contato@sepecaxias.org.br">contato@sepecaxias.org.br</a></p>
            <span class="assinatura">
                Desenvolvimento <br /><a href="http://physistec.com.br" target="_blank" class="physis_logo"></a>
            </span>
        </div><!-- .site-info -->
    </footer><!-- #rodape -->
    
    <?php wp_footer(); ?>
    
    <script>
        // Use jQuery com a variavel $j(...)
        var $j = jQuery.noConflict();
        $j(document).ready(function() {
            $j("#toTop").hide();
            $j(function () {
                $j(window).scroll(function () {
                    if ($j(this).scrollTop() > 300) {
                    $j('#toTop').fadeIn();
                    } else {
                    $j('#toTop').fadeOut();
                    }
                });
                $j('#toTop').click(function() {
                    $j('body,html').animate({scrollTop:0},600);
                }); 
            });
        });
    </script>

    <script>
    $(function () {
      var nua = navigator.userAgent
      var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
      if (isAndroid) {
        $('select.form-control').removeClass('form-control').css('width', '100%')
      }
    })
    </script>

</body>
</html>