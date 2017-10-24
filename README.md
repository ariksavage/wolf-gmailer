# wolf-gmailer
Wolf plugin which uses PHP-Mailer to send mail via Gmail

Gmail Username, password, from name are set in the Wolf Plugin Settings.

Use the public function gmailer() to initilize a new instance of the plugin. Example below.

FUNCTIONS
  @function debug($bool): enable or disable verbose debugging of the SMTP connection (default is disabled);
  @Parameter boolean $bool: True: enable debug, False: disable.
  USAGE
    $gmailer->debug(true);
  
  @function message($subject, $body): Set the message to be sent.
  @Parameter string $subject: Message subject.
  @Parameter string $body: HTML or plaintext message body.
  USAGE
    $gmailer->message('My Subject', 'This is a message with <strong>bold</strong> text');
    
  @function attach($file, $name=''): attach a file to the email. Can be used multiple times.
  @Parameter string $file: Path to file.
  @Parameter string $name: : (Optional) name for attached file.
  USAGE
    $gmailer->attach('/temp/fakefile.txt', 'realfile.txt');
    
  @function from($email, $name): Set the message from address.
  @parameter string $email: e-mail from which the message should appear to be sent.
  @parameter string $name: (Optional) display name for from address.
  USAGE
    $gmailer->from('contact@thissite.com', 'Contact Form');
    
  @function to($email, $name=''): Add a to address to the current message.
  @parameter string $email: Recipient e-mail address.
  @parameter string $name: (Optional) Display name for the recipent.
  USAGE
    $gmailer->to('someone@gmail.com', 'Some One');
  
  @function replyto($email, $name=''): Add a reply-to address to the current message.
  @parameter string $email: Recipient e-mail address.
  @parameter string $name: (Optional) Display name for the recipent.
  USAGE
    $gmailer->replyto('someone@gmail.com', 'Some One');
    
  @function cc($email, $name=''): Add a CC address to the current message.
  @parameter string $email: Recipient e-mail address.
  @parameter string $name: (Optional) Display name for the recipent.
  USAGE
    $gmailer->cc('someone@gmail.com', 'Some One');
    
  @function bcc($email, $name=''): Add a bcc address to the current message.
  @parameter string $email: Recipient e-mail address.
  @parameter string $name: (Optional) Display name for the recipent.
  USAGE
    $gmailer->bcc('someone@gmail.com', 'Some One');
    
  @function send(): Send the message
  USAGE
    $gmailer->send();

<?php
$gmailer = gmailer();
$gmailer->to('address@domain.tld', 'name (optional)');
$gmailer->message('Subject', 'Body');
$gmailer->send();
?>
