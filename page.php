<?php
/**
 * The Page
 *
 * @package WordPress
 * @subpackage CarePanda
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>  

<div class="outer-row row clearfix">
  <div class="home-wrapper wrapper clearfix">

    <section id="page" class="section-contact section-body clearfix">
      <div class="container">
        <div class="col-xs-12 text-center">

          <?php
          while ( have_posts() ) : the_post();

            the_content();

          endwhile; // End of the loop.
          ?>
          
        </div>
      </div>
    </section>

  </div><!-- end of <div class="container"> -->
</section><!-- end of <section id="contact" class="section-certification section-small-body clearfix"> -->

  </div><!-- end of .wrapper -->
</div><!-- end of .outer-row -->

<?php get_footer(); ?>