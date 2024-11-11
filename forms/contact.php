<?php
// Allow from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific methods
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

  // Allow specific headers
  header("Access-Control-Allow-Headers: Content-Type, Authorization");

  $receiving_email_address = 'sanalpkwork@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/validate.js' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  if ($contact->send()) {
      echo "Message sent successfully!";
  } else {
      echo "Message could not be sent.";
  }
?>

