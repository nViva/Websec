
<?php 
$errors = array(); 
$selector = $_GET['selector'];
if(empty($selector)){
  
  array_push($errors, "Password Can not be reset");
}
else{



?>
<!DOCTYPE html>
<html>
<head>
  <title>Web security</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Reset Password</h2>
  </div>
	
  <form method="post" action="resetnow.php">
  	<?php 

if(!empty($_GET['message'])){
  if($_GET['message']=='matching'){
   //echo"Passwords do not match";
   array_push($errors, "Passwords do not match");
  }
}?>
<?php include('errors.php') ?>
  	
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
    <div class="input-group">
      
      <input type="hidden" name="selector" value="<?php echo $selector; ?>">
    </div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="resetnow">Reset</button>
  	</div>
  	<p>
  		Already a user ? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
<?php } ?>