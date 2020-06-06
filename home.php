<?php

require_once("ensure-login.php");

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .sites{background-color: lightgrey; padding: 1rem;}
    </style>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/head-tags.php"); ?>
    <title>Welcome</title>
</head>
<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/menu-bar.php"); ?>
    <div id="content">
        <p>Have some items here, like statisticsics???</p>
        <ul>
            <li>Your average MPG</li>
            <li>Charts</li>
            <li>Statistics</li>
        </ul>
    </div>
</body>
</html>