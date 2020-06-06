<?php

require_once("ensure-login.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/head-tags.php"); ?>
    <link rel="stylesheet" type="text/css" href="account.css">
    <title>Account Options</title>
</head>

<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/menu-bar.php"); ?>
    <div class="goop">
        <span>Account Options</span>
        <div class="chunk">
            <span class="vl"></span>
            <span class="user"><?= $_SESSION['username']; ?></span>
        </div>
    </div>
    <div id="content">
        <div><a href="change-password.php" class="btn btn-block btn-warning">Change Your Password</a></div>
        <div><a href="logout.php" class="btn btn-block btn-danger">Sign Out of Your Account</a></div>
    </div>
</body>

</html>