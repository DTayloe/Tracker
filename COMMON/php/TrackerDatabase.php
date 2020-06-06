<?php

// for better rounding of JSON float values, otherwise there are problems with floats 
// having crazy decimal points when converting between a JSON string and php object
// https://stackoverflow.com/a/46390357/3752444
if(version_compare(phpversion(), '7.1', '>=')){
    ini_set('precision', 16);
    ini_set('serialize_precision', -1);
}

class TrackerDatabase{
    private static $servername = "localhost";
    private static $database = "tracker";
    private static $port = 3307;
    private static $username = "dan";
    private static $password = "password";
    private static $options = [
        PDO::ATTR_EMULATE_PREPARES => FALSE,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    public static function Connect(){
        return new PDO(
            (
                "mysql:host=" . self::$servername . ";"
                . "dbname=" . self::$database . ";"
                . "port=" . self::$port . ";"
            ), self::$username, self::$password, self::$options);
    }

    /** tableTry => [colNames...] 
     * This must match the items on the form being submitted!
    */
    private static $mappingColumns = [
        'person' => ["id","username"],
        'vehicle' => ["id","make","model","year"],
        'business' => ["id","name"],
		'gas' => ["id","person_id","vehicle_id","odometer","miles_driven","price_per_gal","gallons_bought","cost","business_id","notes","date_time"],
        'oil' => ["id","person_id","vehicle_id","odometer","cost","business_id","notes","date_time","brand","viscosity","blend"],
        'maintainence' => ["id","person_id","vehicle_id","odometer","cost","business_id","date_time","symptom","reason","solution"],
    ];

    public static function QuerySelect($tableTry){
        try{
            // use the input parameter tableTry to get data from the database only at the column names

            $sqlResult = [];
            $sql = "";
            
            // make sure the tableTry input is a valid table
            if(array_key_exists($tableTry, self::$mappingColumns)){
                // mash array together with commas for sql statement
                $cols = implode(", ", self::$mappingColumns[$tableTry]);
                $sql = "select $cols from $tableTry";
                error_log($sql);

                // make connection to database
                $conn = self::Connect();

                error_log("[QuerySelect] Connected successfully!");
                
                // execute sql and store row result objects
                $stmt = $conn->query($sql);
                while($row = $stmt->fetch()){
                    $sqlResult[] = $row;
                }
            }else{
                error_log("'$tableTry' not found in mappingColumns for database table.");
            }

            $conn = null;
            
            return $sqlResult;
        }catch(PDOException $e2){
            error_log($e2->getMessage());
            return NULL;
        }
    }

    /**
     * we need to set the value for the select option to something that can be hooked to the database for the input dropdowns, like an id from the vehcile table.
     */
    public static function SendFormDataGas($input){
        // error_log("CRAP: " . json_encode($input));
        try{            
            // input boxes / requests and their expected types 
            // $mappingTypes = [
            //     'person' => 'string',
            //     'vehicle' => 'string',
            //     'odometer' => 'integer',
            //     'milesDrivenSinceLastFillUp' => 'double',
            //     'pricePerGallon' => 'double',
            //     'gallons' => 'double',
            //     'gasCompany' => 'string',
            // ];

            // if(count($input) != count($mappingTypes)){
            //     error_log("[ERROR] Incorrect number of fields, update types!");
            //     return false;
            // }

            // $good = true;
            // $i = 0;
            $marks = "";

            $sqlKeys = implode(", ", self::$mappingColumns['gas']);
            $sqlValues = [];

            // // go through request keys (checking types and building sql insert string)
            foreach ($input as $key => $value){
                // remove whitespaces from input
                $value = trim($value);

                // since the $_GET / $_POST store values as strings, we need to parse string numbers into numbers
                $wasNumeric = false;
                if(is_numeric($value)){
                    $wasNumeric = true;
                    $value = $value + 0;
                    error_log("$value was numeric");
                }

            //     // check if types match what we expect
            //     if(gettype($value) != $mappingTypes[$key]){
            //         // if the responses were expected to be an integer or double, and the actual value was some sort of number, it is ok.
            //         if(
            //             !(
            //                 (
            //                     ($mappingTypes[$key] == "integer")
            //                     ||
            //                     ($mappingTypes[$key] == "double")
            //                 )
            //                 && $wasNumeric
            //             )
            //         ) {
            //             $good = false;
            //             $badType = gettype($value);

            //             error_log("The value '$value' ($key, $badType) was not $mappingTypes[$key]");
            //         }
            //     }

                // add comma only if we are not at the end (TODO can simplify, remove i var and just remove ending comma from strings after done building)
                // $ending = ($i < (count($input) - 1) ? ", " : "");

            //     $sqlKeys .= $key . $ending;
                if($key != "id"){// get rid of id since is autoincremented
                    $marks .= "?" . ", ";        // for using prepared sql statement
                    
                    // insert current date if key found
                    if($key == "datetime"){
                        $sqlValues[] = date("Y-m-d H:i:s");
                    }else{
                        $sqlValues[] = $value;
                    }
                }

            //     $i++;
            }

            $sqlKeys = ltrim($sqlKeys, "id, ");     // get rid of id since is autoincremented
            $marks = rtrim($marks, ", ");

            /**
             * xxx use the values on the option lists so that it is stored with the correct person, vehicle, ... ids
             * when we make this sql call, so that we don't have to do all the crazy other sql calls...
             * but when we need to add one that will be a different call (using the add button, but that id will be 
             * populated already from the add button inserting and loading from the database)
             * 
             * this call assumes that all the ids it references to from the dropdowns will be existing in the database, 
             * which is true since they can only be loaded from the database
             * 
             */



            // build sql statement string
            $sql = "INSERT INTO gas($sqlKeys) 
            VALUES($marks)";
            error_log("$sql");
            error_log("Values: " . json_encode($sqlValues));

            $good = true;

            if($good){
                // make connection to database
                $conn = self::Connect();

                error_log("[Send] Connected successfully!");

                // create prepare sql statement (since is more secure)
                $stmt = $conn->prepare($sql);
                $stmt->execute($sqlValues);
                $conn = null;
                return true;
            }else{
                $conn = null;
                return false;
            }
        }catch(PDOException $e){
            error_log("Connection failed: " . $e->getMessage());
            return false;
        }
    }
}