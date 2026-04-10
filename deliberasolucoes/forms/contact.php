<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Substitua pelo seu e-mail de recebimento
  $receiving_email_address = 'contato@deliberasolucoes.com.br';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = "Novo contato do site Delibera Soluções";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'Nome');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['phone'], 'Telefone');
  $contact->add_message( $_POST['company'], 'Empresa');
  $contact->add_message( $_POST['service_interest'], 'Serviço de Interesse');
  $contact->add_message( $_POST['how_found'], 'Como conheceu a empresa');
  $contact->add_message( $_POST['message'], 'Mensagem', 10);

  echo $contact->send();
?>
