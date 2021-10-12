<?php 

if (isset($_POST['forgot_toemail1'])) {
  

	$email=$_POST['email'];
	$a=0;
	include("dbconnect.php");
	$sql="select * from users where email=?";
$stmt= mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($stmt,"s",$email);
  mysqli_stmt_execute($stmt);
  $select=mysqli_stmt_get_result($stmt);
  while($row=mysqli_fetch_assoc($select)) {
    if($row['email']==$email)
    {
    $a=$a+1;
    $tokenemail=$row['email'];
}
  }
}
  if($a>=1){
	$selector=bin2hex(random_bytes(8));
	$token=random_bytes(32);
	$validator=bin2hex($token);
	$url="http://localhost/websec/New/resetpassword.php?selector=".$selector;
	$expires=date("U")+1800;
	
     $sql="delete from password_reset where email=?";
     $stmt= mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($stmt,"s",$email);
  mysqli_stmt_execute($stmt);
}
$q="insert into password_reset(email,selector,validator) values(?,?,?)";
$stmt= mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt,$q)) {
 echo "statement failed";
}
else{
	$hashedtoken=password_hash($token,PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt,"sss",$email,$selector,$hashedtoken);
  mysqli_stmt_execute($stmt);
}
//mysqli_stmt_close($stmt);
$from = 'viateurvnshimiyimana@gmail.com';
$to = $email;
$subject = 'Reset password';
$message = '<p>Here is the link you need to follow';
$message .= '<a href="'.$url.'</a></p>';
$headers = 'From: ' . $from;
$headers .= 'Reply-To: ' . $from;
$headers .= 'Content-type:text/html';
mail($to, $subject, $message, $headers);

array_push($errors, "Reset Link has been sent to your email. Use it to reset you password");
}
else{
	echo "Email not found";
}
}
?>