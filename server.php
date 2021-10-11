<?php
session_start();

// initializing variables
$username = "";

$errors = array(); 

// connect to the database
//$db = new mysqli('localhost', 'root', '', 'websec');
require_once('dbconnect.php');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = $db->real_escape_string($_POST['username']);

  $password_1 = $db->real_escape_string($_POST['password_1']);
  $password_2 = $db->real_escape_string($_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
 
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  //Password validation
  $number = preg_match('@[0-9]@', $password_1);
$uppercase = preg_match('@[A-Z]@', $password_1);
$lowercase = preg_match('@[a-z]@', $password_1);
$specialChars = preg_match('@[^\w]@', $password_1);
 
if(strlen($password_1) < 10 || !$number || !$uppercase || !$lowercase || !$specialChars) {
 array_push($errors, "Password must be at least 10 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.");
} 

  /* first check the database to make sure 
   a user does not already exist with the same username and/or email */
  $result ="SELECT count(*) FROM users WHERE username=?";
$stmt = $db->prepare($result);
$stmt->bind_param('s',$username);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
  if ($count>0) { // if user exists
   
      array_push($errors, "Username already exists");
    }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = sha1($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users(username,password) 
          VALUES(?,?)";
  $stmti = $db->prepare($query);
$stmti->bind_param('ss',$username,$password);
$stmti->execute();
$stmti->close();
    $_SESSION['username'] = $username;
    $_SESSION['pwd'] = $password;
    $_SESSION['success'] = "You are now an Authorized user";
    header('location: index.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $db->real_escape_string($_POST['username']);
  $password = $db->real_escape_string($_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

    $cpassword=$password;
    $password = sha1($password);
    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss',$username,$password);
    if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
  if($num_rows > 0){
   
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";

      // if remember me clicked . Values will be stored in $_COOKIE  array
      if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("cuser",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("cpass",$cpassword,time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["cuser"])) {
setcookie ("cuser","");
if(isset($_COOKIE["cpass"])) {
setcookie ("cpass","");
        }
      }
  
  }
  header('location:index.php');
}else {
      array_push($errors, "Wrong username/password combination ");
    }
  }
}

?>