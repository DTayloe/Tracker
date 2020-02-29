<?php

header("Location: ./mpgTracker_success.php");

require_once("__php__.php");

if(TrackerDatabase::SendFormDataGas($_GET)){
    error_log("Data sent sucessfully!");
}else{
    error_log("You suck, data not sent to database!");
}
