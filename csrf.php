<?php

session_start();
$_SESSION["_token"] = bin2hex(random_bytes(32)); // Random bytes + safe cryptography

// CSRF
$token = filter_input(INPUT_POST, '_token', FILTER_SANITIZE_STRING); // Only input datas

if (!$token || ($token !== $_SESSION['_token'])) {
  header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed'); // go to ERROR!
  exit;
}


###############################

// Example:

if ($_POST) 
{
  
  $token = filter_input(INPUT_POST, '_token', FILTER_SANITIZE_STRING);
  if (!$token || ($token !== $_SESSION['_token'])) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    exit;
  }
  
  // POST Operations
}
