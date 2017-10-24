<h1>Gmailer Settings</h1>

<form action="savesettings" method="post" id="gmailer">
  <div class="gmailer-inputs">
    <label for="email">Email address (send from)</label>
    <input type="email" required name="email" value="<?php echo $settings['email'];?>"/>
  </div>
  <div class="gmailer-inputs">
    <label for="from">From name</label>
    <input type="text" placeholder="Contact Form" name="from" value="<?php echo $settings['fromname'];?>"/>
  </div>
  <div class="gmailer-inputs">
    <label for="pass1">Password (see google <a href="https://support.google.com/accounts/answer/185833?hl=en" target="_blank"></a>App passwords)</label>
    <input type="password" name="pass1" value="" onblur="confirmPassword()"/>
  </div>
  <div class="gmailer-inputs hidden">
    <label for="pass1">Repeat Password</label>
    <input type="password" name="pass2" value=""/>
  </div>
  <input type="submit" value="save"/>
</form>