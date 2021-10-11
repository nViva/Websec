<?php 
// connect to the database
$db = new mysqli('localhost', 'root', '', 'websec');
if($db->connect_error){
    die("Fatal Error: Can't connect to database: ". $db->connect_error);
  }
?>