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
?>
<style type="text/css">
/* general */
.float-right {
  display: block;
  float: right;
}
/* page specific */
.section-page {
	background: url('<?php echo $featImgURL; ?>');
	background-size: cover;
}
/* Hide unnecessary elements to create a better traffic funnel */
#menu-main-menu,
.header-free-trial-btn,
.footer-row #footer-menu,
.footer-second-row {
    display: none !important;
}
</style>

<style type="text/css">
.checkout-wrapper .panel-body .form-col {
  padding-bottom: 5px;
}
.checkout-wrapper .panel-heading {
  padding: 15px;
}
.checkout-wrapper .panel-default>.panel-heading {
  color: #fff;
  background-color: #9a65a5;
  border-color: #ddd;
}
.checkout-wrapper .panel-title a {
  font-size: 18px;
}
.checkout-wrapper .checkout-btn {
  border: none;
  background: none;
  font-size: 22px;
  color: #9a65a5;
}
.checkout-wrapper .panel-body .form-col .this-is-required {
  display: none;
  visibility: hidden;
  height: 20px;
  padding-left: 15px;
  font-size: 16px;
  /*color: #ff0000;*/
  color: #9a65a5;
}
.checkout-wrapper .panel-body .form-col:hover>.this-is-required,
.checkout-wrapper .panel-body .form-col:focus>.this-is-required {
  visibility: visible;
}
.checkout-wrapper .panel-body .form-control {
  min-height: 40px;
  border-radius: 0px;
  font-size: 16px;
}
</style>
<div class="outer-row row clearfix">
  <div class="checkout-wrapper wrapper clearfix">

    <section id="page" class="section-page section-small-body clearfix">
      <div class="container">
        <div class="checkout-fields-col col-xs-12 col-sm-8">

<div class="panel-group" id="checkout-accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Step 1: Account Info <i class="fa fa-caret-down float-right"></i>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php
          $states = array("CA", "AL", "AK", "AS", "AZ", "AR", "CO", "CT", "DE", "DC", "FL", "GA", "GU", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MH", "MA", "MI", "FM", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "MP", "OH", "OK", "OR", "PW", "PA", "PR", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "VI", "WA", "WV", "WI", "WY");
        ?>
        <form id="account-info" class="row" action="" method="">
          <div class="col-xs-12 form-col">
            <label class="form-label">Organization Name</label>
            <input class="form-control" name="organization-name" type="text" placeholder="Organization Name"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Phone</label>
            <input class="form-control" name="phone" type="tel" placeholder="Phone"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>
          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Email</label>
            <input class="form-control" name="email" type="email" placeholder="Email"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>
          <div class="clearfix"></div>

          <div class="col-xs-12 col-sm-8 form-col">
            <label class="form-label">Street Address</label>
            <input class="form-control" name="street-address" type="text" placeholder="Street Address"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>
          <div class="col-xs-12 col-sm-4 form-col">
            <label class="form-label">Zip Code</label>
            <input class="form-control" name="zipcode" type="text" placeholder="Zip Code"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>
          <div class="clearfix"></div>
          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">City</label>
            <input class="form-control" name="city" type="text" placeholder="City"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>
          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Select State</label>
            <select class="form-control">
              <?php
              if (!isset($selectedState)){
                echo '<option disabled selected>Select State</option>';
              }
              foreach($states as $state){ 
                if ($selectedState == $state){
                  echo '<option value="'.$state.'" selected>'.$state.'</option>';
                } else {
                  echo '<option value="'.$state.'">'.$state.'</option>';
                }
              } ?>
            </select>
          </div>
          <div class="clearfix"></div>

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Country</label>
            <input class="form-control" name="country" type="text" placeholder="Country" value="United States"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>
          <div class="clearfix"></div>

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">User License Quantity</label>
            <input class="form-control" name="user-license-quantity" type="number" placeholder="User License Quantity" min="2" max="10000"/>
            <span class="form-validation this-is-required">This is required.</span>
          </div>

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Compliance Package Plan</label>
            <select class="form-control compliance-package-plan">
              <option disabled selected>Select Plan</option>
              <option value="Annually">Annually</option>
              <option value="Monthly">Monthly</option>
            </select>
            <span class="form-validation this-is-required">This is required.</span>
          </div>

          <div class="col-xs-12 col-sm-6 form-col">
            <input type="checkbox" id="agree-terms-conditions" name="agree-terms-conditions" value="agreed">
            <label for="agree-terms-conditions" class="form-label">Agree To Terms and Conditions</label>
            <small class="show-terms-conditions-modal">View Terms and Conditions</small>
            <span class="form-validation this-is-required">This is required.</span>
          </div>

          <div class="col-xs-12 form-col">
            <button type="submit" class="checkout-btn">Next <i class="fa fa-arrow-circle-o-right"></i></button>
          </div>
        </form><!-- end of <form id="account-info" -->
<script type="text/javascript">
jQuery(document).ready(function($){

  function updateEmail(){
    var email = $('#account-info input[name="email"]').val();
    $('#stripe-payment-form .email').val(email);
  }

  function updateAmount(){
    var planType = $('#account-info .compliance-package-plan').val();
    var userQuantity = $('#account-info input[name="user-license-quantity"]').val();

    if (planType == 'Annually'){
      var accountFee = 179;
      var billingInstances = 12;
      var userFee = 6;
      if (userQuantity != ""){
        $('#order-summary-accordion .order-sum-user-quantity').html(userQuantity + '<small> users * $6/per user * 12months</small>');                
      }
      if (planType != null){
        $('#order-summary-accordion .order-sum-account-fee').html('$' + accountFee + '<small> * 12months</small>');
      }
    } else {
      var accountFee = 199;
      var billingInstances = 1;
      var userFee = 8;
      if (userQuantity != ""){
        $('#order-summary-accordion .order-sum-user-quantity').html(userQuantity + '<small> users * $8/per user</small>');
      }
      if (planType != null){
        $('#order-summary-accordion .order-sum-account-fee').html('$' + accountFee);
      }
    } /* end of if (planType == 'Annually') */

    // Calc new ammount
    var amount = (accountFee * billingInstances) + ((userFee * userQuantity) * billingInstances);

    if (userQuantity != "" && planType != null){

      // Apply new amount to Payment Form
      $('#stripe-payment-form input[name="amount"]').val(btoa(amount) + '<small>Annually</small>');

      if (planType == 'Annually'){
        $('#order-summary-accordion .order-sum-total').html('$' + amount + ' <small>Annually</small>');
      } else {
        $('#order-summary-accordion .order-sum-total').html('$' + amount + ' <small>Monthly</small>');
      }
    }
  } /* end of updateAmount() */

  function showTermsAndConditions(){
    $('.terms-conditions-modal').modal({show:true});/* Requires a $ sign */
  }

  /* Update Order Summary and Payment Form Amount on Load and Change */
  jQuery(document).ready(function($){
    updateEmail();
    updateAmount();
  });
  $('.compliance-package-plan').on('change', function(){
    updateEmail();
  });
  $('.compliance-package-plan').on('change', function(){
    updateAmount();
  });
  $('input[name="user-license-quantity"]').on('change', function(){
    updateAmount();
  });
  $('.show-terms-conditions-modal').on('click', function(){
    showTermsAndConditions();
  });
});
</script>
      </div>
    </div>
  </div><!-- end of <div class="panel -->
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

          <?php
          while ( have_posts() ) : the_post();

            the_content();

          endwhile; // End of the loop.
          ?>

      </div><!-- end of <div class="panel-body"> -->
    </div>
  </div><!-- end of <div class="panel -->
</div><!-- end of <div class="panel-group" id="checkout-accordion" -->
          
        </div><!-- end of <div class="checkout-fields-col -->
        <div class="order-summary-col col-xs-12 col-sm-4">
          <?php get_template_part('checkout-parts/checkout', 'order-summary'); ?>
        </div>
      </div><!-- end of <div class="container"> -->
    </section>

  </div><!-- end of <div class="container"> -->
</section><!-- end of <section id="contact" class="section-certification section-small-body clearfix"> -->

<div class="modal terms-conditions-modal fade" id="terms-conditions-modal" tabindex="-1" role="dialog" aria-labelledby="terms-conditions-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Terms and Conditions
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
              <p>Terms and Conditions Goes Here</p>
            </div><!-- end of <div class="modal-body"> -->
        </div><!-- end of <div class="modal-content"> -->
    </div>
</div><!--/#contact-modal-->

  </div><!-- end of .wrapper -->
</div><!-- end of .outer-row -->

<?php get_footer(); ?>