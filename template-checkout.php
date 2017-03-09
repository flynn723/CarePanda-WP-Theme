<?php
/**
 * Template Name: Checkout
 *
 * This is a custom template for the home page.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package simple_blog
 */
get_header();
$featImgURL = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
get_template_part('checkout-parts/checkout-style'); ?>
<style type="text/css">
@media (min-width: 768px){
  .section-page {
    background: url('<?php echo $featImgURL; ?>');
    background-size: cover;
  }  
}
</style>
<div class="outer-row row clearfix">
  <div class="checkout-wrapper wrapper clearfix">

    <section id="page" class="section-page section-small-body clearfix">
      <div class="container">
        <div class="checkout-logo-col col-xs-12">
          <a href="<?php echo get_site_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_site_url(); ?>/wp-content/themes/carepanda/img/carepanda-logo.png" class="checkout-logo"></a>
        </div>
        <?php if(!isset($_GET['payment']) && $_GET['payment'] != 'paid') : ?>
          <div class="checkout-fields-col col-xs-12 col-md-7">

            <div class="panel-group" id="checkout-accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Step 1: Account Info <i class="fa fa-caret-down float-right"></i>
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse <?php if ( !isset($_POST["submit_account_info_form"]) ){ echo 'in'; } ?>" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">

                    <?php get_template_part('checkout-parts/checkout', 'account-info'); ?>

                  </div>
                </div>
              </div><!-- end of <div class="panel -->
              <?php /* Check if Data has been stored in Database */
              if ( isset($_POST["submit_account_info_form"])) { ?>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Step 2: Payment Info <i class="fa fa-caret-down float-right"></i>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">

                      <?php get_template_part('checkout-parts/checkout', 'stripe-payment-info'); ?>

                    </div><!-- end of <div class="panel-body"> -->
                  </div>
                </div><!-- end of <div class="panel -->
              <?php } /* End if Data has been stored in Database */ ?>
            </div><!-- end of <div class="panel-group" id="checkout-accordion" -->
            
          </div><!-- end of <div class="checkout-fields-col -->
          <div class="order-summary-col col-xs-12 col-md-4">
            <?php get_template_part('checkout-parts/checkout', 'order-summary'); ?>
          </div>
        <?php else: ?>
          <div class="thank-you-col col-xs-12 text-center">
            <h2>Thank You For The Payment</h2>
          </div>
        <?php endif; /* end of if(!isset($_GET['payment']) && $_GET['payment'] != 'paid') */ ?>
      </div><!-- end of <div class="container"> -->
    </section>

  </div><!-- end of <div class="container"> -->
</section><!-- end of <section id="contact" class="section-certification section-small-body clearfix"> -->

<div class="modal terms-conditions-modal fade" id="terms-conditions-modal" tabindex="-1" role="dialog" aria-labelledby="terms-conditions-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                Terms and Conditions
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body clearfix">
              <p>Terms and Conditions Goes Here</p>
            </div><!-- end of <div class="modal-body"> -->
        </div><!-- end of <div class="modal-content"> -->
    </div>
</div><!--/#contact-modal-->

  </div><!-- end of .wrapper -->
</div><!-- end of .outer-row -->

<?php get_footer(); ?>