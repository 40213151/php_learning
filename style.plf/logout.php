<?php
session_start();
include('functions.php');
chkSSID();
$_SESSION = array();

if (isset($_COOKIE[session_name()])) { 
setcookie(session_name(), '', time()-42000, '/');  } 

session_destroy(); 
header("location: top.php");
exit();

?>