<?php

function tablulizeArray($array){
    echo '<table>';
    foreach ($array as $key => $value) {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$value</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// not used anymore
// join folders into a path
function JoinPath(...$paths){
    $result = "";
    foreach ($paths as $value) {
        $result .= $value . "/";
    }

    error_log("[JoinPath] before: " . $result);

    // trim off ending slash before 
    $result = str_replace("\\", "/", rtrim($result, "/"));

    error_log("[JoinPath] after: " . $result);

    return $result;
}

// from the array of objects extract a property into a comma-seperated value string
// [{"name":"Carlee"},{"name":"Daniel"},{"name":"Nicholas"},{"name":"Will"}]
// to
// "Carlee, Daniel, Nicholas, Will"
function arrToStr($arr, $extract){
    return implode(", ", arrOfObjToArr($arr, $extract));
}

$arr = [
    "1" => "toyota - celica - 2002",
];

// [{"name":"Carlee"},{"name":"Daniel"},{"name":"Nicholas"},{"name":"Will"}]
// to
// ["Carlee", "Daniel", "Nicholas", "Will"]

/**
 * input: 
 *      arr =       {"id":1,"make":"toyota","model":"celica","year":2002}
 *      extract =   "id, make, model, year"
 * output:{"1":"toyota - celica - 2002"}
 */
function arrOfObjToArr($arr, $extract){
    $result = [];

    // split csv string into array
    $extract = explode(", ", $extract);
    error_log("extract: " . json_encode($extract));
    
    // put the values in their places
    foreach ($arr as $index => $rowObj) {
        $asdf = json_encode($rowObj);
        error_log("index: $index, rowobj: $asdf");
        $temp = "";
        $tempId = -1;

        // smash other needed data together
        foreach ($extract as $value) {
            if($value != "id"){
                $temp .= $rowObj[$value] . " - ";
            }else{
                $tempId = $rowObj[$value];
            }
        }
        $temp = rtrim($temp, " - ");
        $result[$tempId] = $temp;
    }

    return $result;
}

?>