<?php

include 'csrf.class.php';
 
$csrf = new csrf();
 
// Generate Token Id and Valid
$token_id = $csrf->get_token_id();
$token_value = $csrf->get_token($token_id);
if($csrf->check_valid('post')) {
  var_dump($_POST[$token_id]);
} 
?>

<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Web Security</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username"value="<?php if(isset($_COOKIE['cuser'])){echo $_COOKIE['cuser'];}?>">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" value="<?php if(isset($_COOKIE['cpass'])){echo $_COOKIE['cpass'];}?>">
  	</div>
  <input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
      <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["cuser"])) { ?> checked <?php } ?>>
  <label> Remember Me</label>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a user ? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>