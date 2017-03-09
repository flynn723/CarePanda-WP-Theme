<?php
/**
 * Template Name: Home
 *
 * This is a custom template for the home page.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package simple_blog
 */

get_header(); ?>  

<div class="outer-row row clearfix">
  <div class="home-wrapper wrapper clearfix">

      <!-- Section - Intro Header -->
      <?php include( 'page-parts/section-intro-header.php' ); ?>

      <!-- Section - Certification -->
      <?php include( 'page-parts/section-certification.php' ); ?>

      <!-- Section - About -->
      <?php include( 'page-parts/section-about.php' ); ?>

      <!-- Section - Free Trial -->
      <?php include( 'page-parts/section-request-demo.php' ); ?>

      <!-- Section - Customers -->
      <?php include( 'page-parts/section-customers.php' ); ?>

      <!-- Section - Features -->
      <?php include( 'page-parts/section-features.php' ); ?>

      <!-- Section - Pricing -->
      <?php include( 'page-parts/section-pricing.php' ); ?>

    <!-- Section - Contact -->
    <?php //include( 'page-parts/section-contact.php' ); ?>
<section id="contact" class="section-contact section-body clearfix">
  <div class="container">
    <div class="col-xs-12 text-center">
      <h3 class="purple-clr">Contact CarePanda and Schedule a Demo</h3>
    </div>
    <div id="contact-form" class="contact-form col-xs-12">
      <?php echo do_shortcode('[contact-form-7 id="11" title="Contact Form"]'); ?>
    </div><!-- end of <div class="col-xs-12"> -->
  </div><!-- end of <div class="container"> -->
</section><!-- end of <section id="contact" class="section-certification section-small-body clearfix"> -->

  </div><!-- end of .wrapper -->
</div><!-- end of .outer-row -->

<?php get_footer(); ?>