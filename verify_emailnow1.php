<?php include('verify_emailnow2.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Web security</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Verify Email</h2>
  </div>
	
  <form method="post" action="verify_emailnow1.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
      <div class="input-group">
      <label>Enter your email</label>
      <input type="text" name="email" >
    </div>
  	  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="verifynow">Submit</button>
  	</div>
  	<p>
  		Already a user ? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>