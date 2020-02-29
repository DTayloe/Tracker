<?php 

session_start();

// include php files
$_SESSION['COMMON_PHP'] = "COMMON/php";
require_once($_SESSION['COMMON_PHP'] . "/TrackerDatabase.php");
require_once($_SESSION['COMMON_PHP'] . "/HtmlUtilities.php");
require_once($_SESSION['COMMON_PHP'] . "/PhpUtilities.php");

// bootstrap
$_SESSION['CSS_INC'] = "COMMON/lib/bootstrap-4.4.1-dist/css/bootstrap.css";

// echo var_dump(pathinfo(__FILE__)); // have something like this saved in the local __php__ and set some vars for current folder to let us know where things are?

?>