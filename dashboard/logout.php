<?php 
session_start(); 

//unsets the sessions and destroys it
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['email']);
unset($_SESSION['website']);
unset($_SESSION['image']);
unset($_SESSION['desc']);
unset($_SESSION['role']);

session_destroy();

//redirects the user to the start page
header("Location: ../index.php?logout=true");

?>
