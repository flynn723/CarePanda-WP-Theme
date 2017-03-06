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
    <div class="col-xs-12">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ?>
    <script>
    jQuery(document).ready(function(){
      window.location = (""+window.location).replace(/#[A-Za-z0-9_]*$/,'')+"#contact";
    });
    </script>
    <?php
    $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST,"message",FILTER_SANITIZE_SPECIAL_CHARS));
    
    if ($name == "" || $email == "" || $message == "") {
        $error_message = "<li>Please fill in the required fields: Name, Email and Message</li>";
    }
    if (!isset($error_message) && $_POST["address"] != "") {
        $error_message = "<li>Bad form input</li>";
    }

    require("inc/phpmailer/class.phpmailer.php");
    
    $mail = new PHPMailer;
    
    if (!isset($error_message) && !$mail->ValidateAddress($email)) {
        $error_message =  "<li>Invalid Email Address</li>";
    }

    if (!isset($error_message)){  

        $email_body = "";
        $email_body .= "Name " . $name . "\n";
        $email_body .= "Email " . $email . "\n";
        $email_body .= "Message " . $message . "\n";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "siteground263.com"; // sets the SMTP server
        $mail->Port       = 2525;                    // set the SMTP port for the GMAIL server
        $mail->Username   = "justin@justinestrada.com"; // SMTP account username
        $mail->Password   = "Splinter!817";        // SMTP account password
        
        $mail->setFrom($email, $name);
        $mail->addAddress('jebusiness723@gmail.com', 'CarePanda');     // Add a recipient
        
        $mail->isHTML(false);                                  // Set email format to HTML
        
        $mail->Subject = 'CarePanda Contact Form Submission';
        $mail->Body    = $email_body;
        
        if($mail->send()) {
            $sent = true;
        } else {
            $error_message = '<li>Message could not be sent.</li>';
            $error_message .= '<li>Mailer Error: ' . $mail->ErrorInfo.'</li>';            
        }
    }  // end if (!isset($error_message))
  
}
//echo '<pre>';
//var_dump($_POST);
//echo '</pre>';
?>

<?php
if (isset($error_message)) {
    echo '<div class="alert alert-danger" id="MessageNotSent">There was an Error:<ul>'.$error_message.'</ul></div>';
} elseif($sent) {
    echo '<div class="alert alert-success" id="MessageSent">We have received your message, we will contact you very soon.</div>';
}  
?>

<form method="post" action="" id="contact-form" class="contact-form">
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="sr-only" for="name">Name</label>
              <input type="text" name="name" id="name" placeholder="Name" value="<?php if(isset($name)){ echo $name; } ?>" class="form-control" required>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="sr-only" for="email">Email</label>
              <input type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($email)){ echo $email; } ?>" class="form-control" required>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <label class="sr-only" for="message">Message</label>
              <textarea name="message" id="message" rows="8" class="form-control" placeholder="Message:"><?php if(isset($message)){ echo $message; } ?></textarea>
          </div>
      </div>
  </div>
  <!-- Start of Honey POT Field -->
  <div class="row" style="display: none;">
      <div class="col-md-12">
          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" /><p>Please leave this field blank</p>
          </div>
      </div>
  </div>
  <!-- End of Honey POT Field -->
  <div class="row">
      <div class="col-md-12">
          <input type="submit" value="Submit" class="btn btn-theme btn-block btn-contact">
      </div>
  </div>
</form><!-- end of <form method="post" -->

    </div><!-- end of <div class="col-xs-12 col-sm-9"> -->
  </div><!-- end of <div class="container"> -->
</section><!-- end of <section id="contact" class="section-certification section-small-body clearfix"> -->

  </div><!-- end of .wrapper -->
</div><!-- end of .outer-row -->

<?php get_footer(); ?>