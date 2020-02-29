<?php 

$incPath = __DIR__ . "/../" . "__php__.php";
// error_log("Include path: " . incPath);
require_once($incPath); 

// start the session so we can access the $_SESSION variable
session_start();

// bootstrap
$_SESSION['CSS_INC'] = "../" . ltrim($_SESSION['CSS_INC'], "/");
// error_log("CSS_INC: " . $_SESSION['CSS_INC']);


?>