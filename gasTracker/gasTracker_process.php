<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/ensure-login.php");

require_once("__php__.php");

if(TrackerDatabase::SendFormDataGas($_GET)){
    error_log("Data sent sucessfully!");
    header("Location: ./gasTracker_success.php");
}else{
    error_log("You suck, data not sent to database!");
    header("Location: ./gasTracker_failure.php");
}
