<?php
session_start();

// initializing variables
$username = "";

$errors = array(); 

// connect to the database
//$db = new mysqli('localhost', 'root', '', 'websec');
require_once('dbconnect.php');

// LOGIN USER
if (isset($_POST['verify'])) {
  $username=$_SESSION['username'];
    $password=$_SESSION['pwd'];
    $email=$_SESSION['em'];
    $code=$_POST['code'];

    
   $query = "SELECT * FROM users WHERE activation_code=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i',$code);
    if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
  if($num_rows > 0){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $query = "UPDATE users SET email_status='Verified' WHERE email=? ";
  $stmti = $db->prepare($query);
$stmti->bind_param('s',$email);
$stmti->execute();
$stmti->close();
header('location:index.php');

    }
  else{
    array_push($errors, "Wrong activation code ");
  }

  }

//..........................................
  //Verify after creating an account




?>