<?php
session_start();

// initializing variables
$username = "";

$errors = array(); 
$verifynow = array(); 

// connect to the database
//$db = new mysqli('localhost', 'root', '', 'websec');
require_once('dbconnect.php');
// REGISTER USER
if (isset($_POST['resetnow'])) {
  // receive all input values from the form
$pass=0;
  $selector =  $db->real_escape_string($_POST['selector']);
  $password_1 = $db->real_escape_string($_POST['password_1']);
  $password_2 = $db->real_escape_string($_POST['password_2']);

  
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  $pass=1;
  }
  //Password validation
  $number = preg_match('@[0-9]@', $password_1);
$uppercase = preg_match('@[A-Z]@', $password_1);
$lowercase = preg_match('@[a-z]@', $password_1);
$specialChars = preg_match('@[^\w]@', $password_1);
 
if(strlen($password_1) < 10 || !$number || !$uppercase || !$lowercase || !$specialChars) {
 array_push($errors, "Password must be at least 10 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.");
} 

    if ($pass!=1) {
     $count=0;
   
    $query = "SELECT * FROM password_reset WHERE selector=? ";
    $stmt=mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt,$query)) {
      
      array_push($errors, "Account not reset");
    }
    else{
      mysqli_stmt_bind_param($stmt,"s",$selector);
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);
  while($data=mysqli_fetch_assoc($result)) {
           if($data['selector']==$selector){
          $count=1;
          $email2=$data['email'];
        }
      }
      if($count==1){
        $salt="Viateurwebsite".$password_1;
    $password=hash('sha1', $salt);
        $query = "UPDATE users SET password='$password' WHERE email=? ";
  $stmti = $db->prepare($query);
$stmti->bind_param('s',$email2);
$stmti->execute();
$stmti->close();
$query = "DELETE FROM password_reset  WHERE email=? ";
  $stmti = $db->prepare($query);
$stmti->bind_param('s',$email2);
$stmti->execute();
$stmti->close();
header('location:index.php');
      }
    }
  }
 else{ 

header("location:resetpassword.php?selector=$selector&message=matching");
  }
}


?>