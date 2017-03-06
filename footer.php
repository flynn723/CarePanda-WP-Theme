<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage CarePanda
 * @since 1.0
 * @version 1.0
 */
?>
<footer class="footer-row row clearfix grey-bg">
  <div class="footer-wrapper wrapper footer-small-body clearfix">

    <!-- Footer - First Row -->
	<?php get_template_part( 'footer-parts/footer', 'first-row' ); ?>

      <!-- Footer - Second Row -->
      <?php include( 'footer-parts/footer-second-row.php' ); ?>

  </div><!-- end of <div class="footer-wrapper wrapper clearfix"> -->
</footer><!-- end of <footer class="footer-row -->

<!-- Modal - App Store Buttons -->
<?php // get_template_part( 'modal-parts/modal', 'app-btns' ); ?>

<!-- Modal - Contact -->
<?php // get_template_part( 'modal-parts/modal', 'contact' ); ?>

</div><!-- end of <div class="container-fluid"> -->
<?php wp_footer(); ?>
<script type="text/javascript">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-81470313-1', 'auto');
ga('send', 'pageview');
</script>
</body>
</html>