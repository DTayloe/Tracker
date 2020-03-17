<?php

require_once("__php__.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="<?= $_SESSION['CSS_INC'] ?>">
    <link rel="stylesheet" type="text/css" href="gasTracker.css">
    <title>MPG Tracker</title>
</head>
<body>
<form action="./gasTracker_process.php" method="get" id="gasTracker">

<?php 

// example to grab users into format for making input element from

// $result = TrackerDatabase::QuerySelect("users");
// error_log(json_encode($result));

// $resultCsvString = arrToStr($result, "name");
// error_log($resultCsvString);

// error_log("Test: " . json_encode(TrackerDatabase::QuerySelect("vehicle")));


?>
    <!-- This one will be replaced with user login -->
    <?php MakeInputRowList("person", "person", "Person", arrOfObjToArr(TrackerDatabase::QuerySelect("person"), "id, name")); ?>

    <?php MakeInputRowListWithButton("vehicle", "vehicle", "Vehicle", arrOfObjToArr(TrackerDatabase::QuerySelect("vehicle"), "id, make, model, year")); ?>
    <?php MakeInputRowTextbox("odometer", "odometer", "Odometer"); ?>
    <?php MakeInputRowTextbox("milesDrivenSinceLastFillUp", "milesDrivenSinceLastFillUp", "Miles Driven Since Last Fill Up"); ?>
    <?php MakeInputRowTextbox("pricePerGallon", "pricePerGallon", "Price Per Gallon"); ?>
    <?php MakeInputRowTextbox("gallons", "gallons", "Gallons"); ?>
    <?php MakeInputRowTextbox("cost", "cost", "Cost"); ?>
    <?php MakeInputRowListWithButton("gasCompany", "gasCompany", "Gas Company", arrOfObjToArr(TrackerDatabase::QuerySelect("business"), "id, name")); ?>
    <?php MakeInputRowTextbox("notes", "notes", "Notes"); ?>
    <?php MakeInputRowDatetimebox("datetime", "datetime", "Date and Time"); ?>


    <footer>
        <button class="btn btn-block btn-primary" type="submit">Submit</button>
    </footer>
</form>
</body>
</html>