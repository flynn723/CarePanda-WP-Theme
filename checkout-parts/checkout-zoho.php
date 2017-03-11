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

  /*
  * Send Data To Zoho
  */
  $zohoResponse = "";
  $authToken = "65e3de49815ff3f5ee4db79eea1a9c0c";
  /*
  * Add Accounts
  */
  $accountsXml = '<?xml version="1.0" encoding="UTF-8"?>';
  $accountsXml .= '<Accounts>';
  $accountsXml .= '<row no="1">';
  $accountsXml .= '<FL val="Account Name">'. $organizationName .'</FL>'; // Organization Name
  $accountsXml .= '<FL val="Employees">'. $userQuantity .'</FL>'; // User License Quantity
  if ($planType == "Annually"){
    $accountsXml .= '<FL val="Account Type">Annual Compliance Package Plan </FL>';  // Annual Compliance Package Plan
  } else {
    $accountsXml .= '<FL val="Account Type">Monthly Compliance Package Plan </FL>';  // Monthly Compliance Package Plan
  }
  $accountsXml .= '<FL val="Shipping Street">'. $streetAddress .'</FL>';  // Street Address
  $accountsXml .= '<FL val="Shipping City">'. $city .'</FL>';  // City
  $accountsXml .= '<FL val="Shipping State">'. $selectedState .'</FL>';  // State
  $accountsXml .= '<FL val="Shipping Code">'. $zipCode .'</FL>';  // Zip
  $accountsXml .= '</row>';
  $accountsXml .= '</Accounts>';

  $accountsUrl = "https://crm.zoho.com/crm/private/xml/Accounts/insertRecords";
  $accountsQuery = "authtoken=". $authToken ."&scope=crmapi&newFormat=1&xmlData=". $accountsXml;
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, $accountsUrl); /* set url to send post request */
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); /* allow redirects */
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); /* return a response into a variable */
  curl_setopt($ch, CURLOPT_TIMEOUT, 30); /* times out after 30s */
  curl_setopt($ch, CURLOPT_POST, 1); /* set POST method */
  curl_setopt($ch, CURLOPT_POSTFIELDS, $accountsQuery); /* add POST fields parameters */

  //Execute cUrl session
  $accountsResponse = curl_exec($ch);
  curl_close($ch);

  if (strpos($accountsResponse, 'added successfully') !== false) {
      $zohoResponse .= '<li>Account Record Added Successfully</li>';
  } else {
      $zohoResponse .= '<li>Account Record Added Un-Successfully</li>';    
  }

  /*
  * Add Contacts
  */
  $contactsXml = '<?xml version="1.0" encoding="UTF-8"?>';
  $contactsXml .= '<Contacts>';
  $contactsXml .= '<row no="1">';
  $contactsXml .= '<FL val="Account Name">'. $organizationName .'</FL>'; // Organization Name
  $contactsXml .= '<FL val="First Name">'. $contactFirstName .'</FL>'; // Contact First Name
  $contactsXml .= '<FL val="Last Name">'. $contactLastName .'</FL>'; // Contact Last Name
  $contactsXml .= '<FL val="Phone">'. $phone .'</FL>'; // Phone
  $contactsXml .= '<FL val="Email">'. $email .'</FL>'; // Email
  if ($agreeTermsConditions == "agreed"){
    $contactsXml .= '<FL val="Description">Agreed To Terms</FL>'; // Agree to Terms and Conditions    
  }
  $contactsXml .= '</row>';
  $contactsXml .= '</Contacts>';

  $contactsUrl = "https://crm.zoho.com/crm/private/xml/Contacts/insertRecords";
  $contactsQuery = "authtoken=". $authToken ."&scope=crmapi&newFormat=1&xmlData=". $contactsXml;
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, $contactsUrl); /* set url to send post request */
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); /* allow redirects */
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); /* return a response into a variable */
  curl_setopt($ch, CURLOPT_TIMEOUT, 30); /* times out after 30s */
  curl_setopt($ch, CURLOPT_POST, 1); /* set POST method */
  curl_setopt($ch, CURLOPT_POSTFIELDS, $contactsQuery); /* add POST fields parameters */

  //Execute cUrl session
  $contactsResponse = curl_exec($ch);
  curl_close($ch);

  if (strpos($contactsResponse, 'added successfully') !== false) {
      $zohoResponse .= '<li>Contact Record Added Successfully</li>';
  } else {
      $zohoResponse .= '<li>Contact Record Added Un-Successfully</li>';    
  }
  /*
  * Output Zoho Response
  */
  //echo '<ul class="zoho-response" style="">'.$zohoResponse.'</ul>';
}
?>