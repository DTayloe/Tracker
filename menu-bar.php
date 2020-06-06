<?php
session_start();
$FILE_BASENAME = basename($_SERVER["PHP_SELF"], ".php");
?>

<nav id="menu-bar">
    <ul>
        <li><a <?php error_log("[" . $FILE_BASENAME . "]"); echo(($FILE_BASENAME === "home") ? 'class="active"' : ''); ?> href="/Tracker/home.php">Home</a></li>
        <li><a <?php error_log("[" . $FILE_BASENAME . "]"); echo(($FILE_BASENAME === "gasTracker") ? 'class="active"' : ''); ?> href="/Tracker/gasTracker/gasTracker.php">Gas Tracker is a really huge sucky big ol guy</a></li>
        <li><a <?php error_log("[" . $FILE_BASENAME . "]"); echo(($FILE_BASENAME === "account") ? 'class="active"' : ''); ?> href="/Tracker/account.php">Account</a></li>
    </ul>
</nav>