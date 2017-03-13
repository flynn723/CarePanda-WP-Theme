<?php 
if (isset($_POST["submit_account_info_form"]) && $_POST['user_quantity'] != "" && $_POST['planType'] != ""){

    $user_quantity = strip_tags($_POST['user_quantity'], "");
    $planType = strip_tags($_POST['planType'], "");
    if ($planType == "Annually"){
    	$billing_interval = "year";
    } else { // planType == month
    	$billing_interval = "month";
    }

	echo do_shortcode('[payment_form_advanced billing_interval="' . $billing_interval . '" user_quantity=' . $user_quantity . ']'); 	
} else {
	echo '<h2>Error Account Info Not Set or Incorrectly entered.</h2>';
}
?>