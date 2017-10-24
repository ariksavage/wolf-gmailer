<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Gmailer extends PHPmailer
{
  public function __construct($exceptions, $user, $secret, $fromname = 'PHP gmailer') {
    /**
    * myPHPMailer constructor.
    *
    * @param bool|null $exceptions
    * @param string  $user Gmail SMTP username
    * @param string  $secret Gmail SMTP password
    * @param string  $fromname Gmail messages "from" name
    */
    if ($user == '' || $user == null){
		echo "Please provide the gmail username and password";
		exit;
    }
    if ($secret == '' || $secret == null){
		echo "Please provide the gmail password";
		exit;
    }
    //server settings
    $this->SMTPDebug = 0;              // Enable verbose debug output
    $this->isSMTP();                  // Set mailer to use SMTP
    $this->Host = 'smtp.gmail.com';   // Specify main and backup SMTP servers
    $this->SMTPAuth = true;           // Enable SMTP authentication
    $this->Username = $user;          // SMTP username
    $this->Password = $secret;        // SMTP password
    $this->SMTPSecure = 'tls';        // Enable TLS encryption, `ssl` also accepted
    $this->Port = 587;                // TCP port to connect to
    // Mail settings
    $this->setFrom($user, $fromname);
  }
  public function debug($bool){
    $this->SMTPDebug = ($bool)? 2 : 0;
  }
  public function message($subject, $body){
    $this->IsHTML(true);
    $this->Subject = $subject;
    $this->Body  = $body;
    $this->AltBody = strip_tags($body);
  }
  public function attach($file, $name=''){
    if ($name != ''){
      $this->addAttachment($file, $name);
    } else {
      $this->addAttachment($file);
    }
  }
  public function from($email, $name){
    if ($name != ''){
      $this->setFrom($email, $name);
    } else {
      $this->setFrom($email);
    }
  }
  public function to($email, $name=''){
    if ($name != ''){
      $this->addAddress($email, $name);
    } else {
      $this->addAddress($email);
    }
  }
  public function replyto($email, $name=''){
    if ($name != ''){
      $this->addReplyTo($email, $name);
    } else {
      $this->addReplyTo($email);
    }
  }
  public function cc($email, $name=''){
    if ($name != ''){
      $this->addCC($email, $name);
    } else {
      $this->addCC($email);
    }
  }
  public function bcc($email, $name=''){
    if ($name != ''){
      $this->addBCC($email, $name);
    } else {
      $this->addBCC($email);
    }
  }
  public function send(){
    try{
      parent::send();
      return true;
    } catch (Exception $e) {
      echo '<p>message not sent</p>';
      echo $g->ErrorInfo;
      return false;
    }
  }
}
