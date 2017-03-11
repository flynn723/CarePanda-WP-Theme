<?php
$states = array("AL", "AK", "AS", "AZ", "AR","CA", "CO", "CT", "DE", "DC", "FL", "GA", "GU", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MH", "MA", "MI", "FM", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "MP", "OH", "OK", "OR", "PW", "PA", "PR", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "VI", "WA", "WV", "WI", "WY");

// global $wpdb;
// // creates table checkout_info in database if not exists
// $table = $wpdb->prefix . "checkout_info"; 
// $charset_collate = $wpdb->get_charset_collate();
// $sql = "CREATE TABLE $table (
//       id mediumint(9) NOT NULL AUTO_INCREMENT,
//       time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
//       organizationName tinytext NOT NULL,
//       contactFirstName tinytext NOT NULL,
//       contactLastName tinytext NOT NULL,
//       phone tinytext NOT NULL,
//       email tinytext NOT NULL,
//       streetAddress tinytext NOT NULL,
//       zipCode tinytext NOT NULL,
//       userQuantity tinytext NOT NULL,
//       planType tinytext NOT NULL,
//       agreeTermsConditions tinytext NOT NULL,
//       extraColumn1 tinytext NOT NULL,
//       extraColumn2 tinytext NOT NULL,
//       extraColumn3 tinytext NOT NULL,
//       extraColumn4 tinytext NOT NULL,
//       url varchar(55) DEFAULT '' NOT NULL,
//       PRIMARY KEY  (id)
//     ) $charset_collate;";
// require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
// dbDelta( $sql );

// $_POST Read Post Variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $organizationName = trim(filter_input(INPUT_POST,"organization_name",FILTER_SANITIZE_STRING));
    $contactFirstName = trim(filter_input(INPUT_POST,"contact_first_name",FILTER_SANITIZE_STRING));
    $contactLastName = trim(filter_input(INPUT_POST,"contact_last_name",FILTER_SANITIZE_STRING));
    $phone = trim(filter_input(INPUT_POST,"phone",FILTER_SANITIZE_EMAIL));
    $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS));
    $streetAddress = trim(filter_input(INPUT_POST,"street_address",FILTER_SANITIZE_SPECIAL_CHARS));
    $city = trim(filter_input(INPUT_POST,"city",FILTER_SANITIZE_SPECIAL_CHARS));
    $selectedState = trim(filter_input(INPUT_POST,"state",FILTER_SANITIZE_SPECIAL_CHARS));
    $zipCode = trim(filter_input(INPUT_POST,"zipcode",FILTER_SANITIZE_SPECIAL_CHARS));
    $userQuantity = trim(filter_input(INPUT_POST,"user_quantity",FILTER_SANITIZE_SPECIAL_CHARS));
    $planType = trim(filter_input(INPUT_POST,"planType",FILTER_SANITIZE_SPECIAL_CHARS));
    $agreeTermsConditions = trim(filter_input(INPUT_POST,"agree_terms_conditions",FILTER_SANITIZE_SPECIAL_CHARS));
    
    if ($organizationName == "" || $contactFirstName == "" || $contactLastName == "" || $phone == "" || $email == "" || $streetAddress == "" || $city == "" || $selectedState == "" || $zipCode == "" || $userQuantity == "" || $planType == "" || $agreeTermsConditions == "") {
        $error_message = "<li>* Pleaes fill in required fields.</li>";
    }
}
?>
        <form id="account-info" class="row" action="" method="post">
          <div class="form-col col-xs-12">
            <?php if (isset($error_message)) {
                echo '<div class="alert alert-danger" id="MessageNotSent">There was an Error:<ul>'.$error_message.'</ul></div>';
            } ?>
          </div>

          <div class="col-xs-12 form-col">
            <label class="form-label">Organization Name</label>
            <input class="form-control" name="organization_name" type="text" placeholder="Organization Name" value="<?php if(isset($organizationName)){ echo $organizationName; } ?>" maxlength="85" required/>
          </div>

          <div class="col-xs-12 form-col">
            <div class="row">
              <div class="col-xs-12">
                <label class="form-label">Contact Name</label>
              </div>
              <div class="col-xs-6">
                <input class="form-control" name="contact_first_name" type="text" placeholder="First Name" value="<?php if(isset($contactFirstName)){ echo $contactFirstName; } ?>" maxlength="85" required/>
              </div>
              <div class="col-xs-6">
                  <input class="form-control" name="contact_last_name" type="text" placeholder="Last Name" value="<?php if(isset($contactLastName)){ echo $contactLastName; } ?>" maxlength="85" required/>
              </div>
            </div>
          </div><!-- end of <div class="form-col col-xs-12"> -->

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Phone</label>
            <input class="form-control" name="phone" type="tel" placeholder="Phone" value="<?php if(isset($phone)){ echo $phone; } ?>" maxlength="20" required/>
          </div>
          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Email</label>
            <input class="form-control" name="email" type="email" placeholder="Email" value="<?php if(isset($email)){ echo $email; } ?>" maxlength="30" required/>
          </div>
          <div class="clearfix"></div>

          <div class="col-xs-12 form-col">
            <label class="form-label">Street Address</label>
            <input class="form-control" name="street_address" type="text" placeholder="Street Address" value="<?php if(isset($streetAddress)){ echo $streetAddress; } ?>" maxlength="85" required/>
          </div>
          <div class="clearfix"></div>

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">City</label>
            <input class="form-control" name="city" type="text" placeholder="City" value="<?php if(isset($city)){ echo $city; } ?>" maxlength="85" required/>
          </div>
          <div class="col-xs-12 col-sm-3 form-col">
            <label class="form-label">State</label>
            <select class="form-control" name="state" required>
              <?php
              if (!isset($selectedState)){
                echo '<option disabled selected>State</option>';
              }
              foreach($states as $state){ 
                if (isset($selectedState) && $selectedState == $state){
                  echo '<option value="'.$state.'" selected>'.$state.'</option>';
                } else {
                  echo '<option value="'.$state.'">'.$state.'</option>';
                }
              } ?>
            </select>
          </div>
          <div class="col-xs-12 col-sm-3 form-col">
            <label class="form-label">ZIP Code</label>
            <input class="form-control" name="zipcode" type="text" placeholder="ZIP" value="<?php if(isset($zipCode)){ echo $zipCode; } ?>" maxlength="10" required/>
          </div>
          <div class="clearfix"></div>

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">User License Quantity</label>
            <input class="form-control" name="user_quantity" type="number" placeholder="User License Quantity" min="2" max="9999" maxlength="4" value="<?php if(isset($userQuantity)){ echo $userQuantity; } ?>" required/>
          </div>

          <div class="col-xs-12 col-sm-6 form-col">
            <label class="form-label">Compliance Package Plan</label>
            <div class="form-radio-btn-wrapper plan-type-annually-btn-wrapper clearfix">
              <input id="planType-annually" type="radio" name="planType" value="Annually" <?php if(isset($planType) && $planType == "Annually"){ echo 'checked'; } elseif ($planType == "") { echo 'checked'; } ?> required/>
              <label for="planType-annually">$179 Annually + $6/user</label>
            </div>
            <div class="form-radio-btn-wrapper plan-type-monthly-btn-wrapper clearfix">
              <input id="planType-monthly" type="radio" name="planType" value="Monthly" <?php if(isset($planType) && $planType == "Monthly"){ echo 'checked'; } ?> required/>
              <label for="planType-monthly">$199 Monthly + $8/user</label>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 form-col">
            <input type="checkbox" id="agree-terms-conditions" name="agree_terms_conditions" value="agreed" <?php if(isset($agreeTermsConditions) && $agreeTermsConditions == "agreed"){ echo 'checked'; } ?> required/>
            <label for="agree-terms-conditions" class="form-label" style="cursor: pointer;">Agree To Terms and Conditions</label>
            <small class="show-terms-conditions-modal" style="cursor: pointer;">View Terms</small>
          </div>

          <div class="col-xs-12 form-col">
            <button type="submit" class="checkout-btn" name="submit_account_info_form">Next <i class="fa fa-arrow-circle-o-right"></i></button>
          </div>
        </form><!-- end of <form id="account-info" -->

 <?php
if ( isset($_POST["submit_account_info_form"]) && $_POST['organization_name'] != "" && $_POST['contact_first_name'] != "" && $_POST['contact_last_name'] != "" && $_POST['phone'] != "" && $_POST['email'] != "" && $_POST['street_address'] != "" && $_POST['city'] != "" && $_POST['state'] != "" || $_POST['zipcode'] != "" && $_POST['user_quantity'] != "" && $_POST['planType'] != "" && $_POST['agree_terms_conditions'] != "") {
    
    $organizationName = strip_tags($_POST['organization_name'], "");
    $contactFirstName = strip_tags($_POST['contact_first_name'], "");
    $contactLastName = strip_tags($_POST['contact_last_name'], "");
    $phone = strip_tags($_POST['phone'], "");
    $email = strip_tags($_POST['email'], "");
    $streetAddress = strip_tags($_POST['street_address'], "");
    $city = strip_tags($_POST['city'], "");
    $selectedState = strip_tags($_POST['state'], "");
    $zipCode = strip_tags($_POST['zipcode'], "");
    $userQuantity = strip_tags($_POST['user_quantity'], "");
    $planType = strip_tags($_POST['planType'], "");
    $agreeTermsConditions = strip_tags($_POST['agree_terms_conditions'], "");

    // echo $contactFirstName . '<br/>';
    // echo $contactLastName . '<br/>';
    // echo $phone . '<br/>';
    // echo $email . '<br/>';
    // echo $streetAddress . '<br/>';
    // echo $city . '<br/>';
    // echo $selectedState . '<br/>';
    // echo $zipCode . '<br/>';
    // echo $userQuantity . '<br/>';
    // echo $planType . '<br/>';
    // echo $agreeTermsConditions . '<br/>';

    global $wpdb;
    $table = $wpdb->prefix."checkout_info";
    $wpdb->insert(
        $table, 
        array( 
            'time' => current_time( 'mysql' ),
            'organizationName' => $organizationName,
            'contactFirstName' => $contactFirstName,
            'contactLastName' => $contactLastName,
            'phone' => $phone,
            'email' => $email,
            'streetAddress' => $streetAddress,
            'zipCode' => $zipCode,
            'userQuantity' => $userQuantity,
            'planType' => $planType,
            'agreeTermsConditions' => $agreeTermsConditions,
        )
    );
    // $myrows = $wpdb->get_results( "SELECT * FROM carewp_checkout_info" );
    // echo '<pre>';
    // var_dump($myrows);
    // echo '</pre>';
}
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  function updateEmail(){
    var email = $('#account-info input[name="email"]').val();
    $('#stripe-payment-form .email').val(email);
  }

  function updateAmount(){
    // Get Plan Type
    var planType;
    $('#account-info input[name="planType"]').each(function(){
      if ($(this).is(':checked')){
        planType = $(this).attr('value');
      }
    });

    var userQuantity = $('#account-info input[name="user_quantity"]').val();
    if (planType == 'Annually'){
      var accountFee = 179;
      var billingInstances = 12;
      var userFee = 6;
    } else {
      var accountFee = 199;
      var billingInstances = 1;
      var userFee = 8;
    } /* end of if (planType == 'Annually') */

    // Calc new ammount
    var amount = (accountFee * billingInstances) + ((userFee * userQuantity) * billingInstances);

    // Output Order Summary
    if (userQuantity >= 2 && planType != null){

      // Apply new amount to Payment Form
      $('#stripe-payment-form input[name="amount"]').val(btoa(amount));

      // Apply new amount to Order Summary
      $('#order-summary-accordion .order-sum-account-fee').html('+ $' + accountFee); 

      $('#order-summary-accordion .order-sum-total').html('$' + amount);
      if (planType == 'Annually'){
        $('#order-summary-accordion .order-sum-total-col').html('Annual Total');
      } else {
        $('#order-summary-accordion .order-sum-total-col').html('Monthly Total');
      }
      // Calc Order Summary
      $('#order-summary-accordion .order-sum-user-quantity').html(userQuantity);      
      $('#order-summary-accordion .order-sum-user-fee').html('* $' + userFee); 
      $('#order-summary-accordion .order-sum-account-fee').html('+ $' + accountFee);
      // Show Order Summary
      $('#order-summary-accordion .order-sum-user-quantity-wrapper, #order-summary-accordion .order-sum-user-fee-wrapper, #order-summary-accordion .order-sum-account-fee-wrapper, #order-summary-accordion .order-sum-total-wrapper').slideDown();
    } else {
      // Hide Order Summary
      $('#order-summary-accordion .order-sum-user-quantity-wrapper, #order-summary-accordion .order-sum-user-fee-wrapper').slideUp();
      $('#order-summary-accordion .order-sum-account-fee-wrapper').slideUp();
      $('#order-summary-accordion .order-sum-total-wrapper').slideUp();      
    }
    // Order Summary Discount
    // if Annual Price selected
    if (userQuantity >= 2  && planType == 'Annually'){
      // discounted amount = monthlyAmount minus annuallyAmount
      var monthlyAmount = (199) + (8 * userQuantity);
      var annuallyAmount = (179) + (6 * userQuantity);
      var discountedAmount = (monthlyAmount - annuallyAmount) * 12; 
      // Show Order Summary
      $('#order-summary-accordion .order-sum-amount-saved').html('$' + discountedAmount );
      // Show Order Summary
      $('#order-summary-accordion .order-sum-amount-saved-wrapper').slideDown();
    } else {
      // hide Order Summary
      $('#order-summary-accordion .order-sum-amount-saved-wrapper').slideUp();
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
  $('#account-info input[name="email"]').on('change', function(){
    updateEmail();
  });
  $('#account-info input[name="user_quantity"]').on('change', function(){
    updateAmount();
  });
  $('#account-info input[name="planType"]').on('change', function(){
    updateAmount();
  });
  $('#account-info .show-terms-conditions-modal').on('click', function(){
    $( "#terms-conditions-modal .modal-body" ).load( "<?php echo get_site_url(); ?>/legal/ .legal-col", function() {
      showTermsAndConditions();
    });
  });

});
</script>