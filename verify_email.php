<?php include('email_verification.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Web security</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="verify_email.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
      <div class="input-group">
      <label>Thank you for registering with us. OTP for Account Verification is sent to you email</label>
      <input type="text" name="code" >
    </div>
  	  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="verify">Verify</button>
  	</div>
  	<p>
  		Already a user ? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>