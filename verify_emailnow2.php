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
if (isset($_POST['verifynow'])) {
  // receive all input values from the form
 
  $email = $db->real_escape_string($_POST['email']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) {
    array_push($errors, "Email is required");
  } else {
   
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Invalid Email format");
    }
  }
  
  /* first check the database to make sure 
   an entered email is in the Database*/
  
    $result ="SELECT count(*) FROM users WHERE email=?";
$stmt = $db->prepare($result);
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
  if ($count==0) { // if user exists
   
      array_push($errors, "No account with the Email provided");
    }

  // create and send a verification code to the email
  if (count($errors) == 0) {
    
$otp= mt_rand(100000, 999999);

    $query = "UPDATE users SET activation_code=? WHERE email=? ";
  $stmti = $db->prepare($query);
$stmti->bind_param('is',$otp,$email);
$stmti->execute();
$stmti->close();
    $_SESSION['username'] = $username;
    $_SESSION['pwd'] = $password;
    $_SESSION['em'] = $email;
    $_SESSION['code'] = $otp;
    //$_SESSION['stat'] = $status;
    $to=$email;
    $from="From: viateurvnshimiyimana@gmail.com";
    $subject="Verification Code for Viateur Website";
    $message =$otp;
  
    $mailing = mail($to,$subject,$message,$from);

    header('location: verify_email.php');
    
  }
}


?>