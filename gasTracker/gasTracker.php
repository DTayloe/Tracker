<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/ensure-login.php");

require_once("__php__.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/head-tags.php"); ?>
    <link rel="stylesheet" type="text/css" href="gasTracker.css">
    <title>MPG Tracker</title>
</head>

<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Tracker/menu-bar.php"); ?>
    <form action="./gasTracker_process.php" method="get" id="gasTracker">

        <?php

        // example to grab users into format for making input element from

        // $result = TrackerDatabase::QuerySelect("users");
        // error_log(json_encode($result));

        // $resultCsvString = arrToStr($result, "name");
        // error_log($resultCsvString);

        // error_log("Test: " . json_encode(TrackerDatabase::QuerySelect("vehicle")));


        ?>

        <?php MakeInputRowHidden("person", "person", "Person", $_SESSION['id']); ?>
        <?php MakeInputRowListWithButton("vehicle", "vehicle", "Vehicle", arrOfObjToArr(TrackerDatabase::QuerySelect("vehicle"), "id, make, model, year")); ?>
        <?php MakeInputRowBigNumberbox("odometer", "odometer", "Odometer"); ?>
        <?php MakeInputRowNumberbox("milesDrivenSinceLastFillUp", "milesDrivenSinceLastFillUp", "Miles Driven Since Last Fill Up"); ?>
        <?php MakeInputRowNumberbox("pricePerGallon", "pricePerGallon", "Price Per Gallon"); ?>
        <?php MakeInputRowNumberbox("gallons", "gallons", "Gallons"); ?>
        <?php MakeInputRowNumberbox("cost", "cost", "Cost"); ?>
        <?php MakeInputRowListWithButton("gasCompany", "gasCompany", "Gas Company", arrOfObjToArr(TrackerDatabase::QuerySelect("business"), "id, name")); ?>
        <?php MakeInputRowTextbox("notes", "notes", "Notes"); ?>

        <!-- Hidden since does not have good behavior, kept so still submits data -->
        <?php MakeInputRowHidden("datetime", "datetime", "Date and Time", ""); ?>


    </form>
    <div class="bottom-footer">
        <button id="submit-button" class="btn btn-block btn-primary" form="gasTracker" type="submit">Submit</button>
    </div>
</body>

</html>