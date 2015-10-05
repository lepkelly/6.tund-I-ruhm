<?php
    require_once("../config_global.php");
    $database = "if15_romil_1";
    function getAllData(){
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
        $stmt->execute();
        
        /*$row_nr = 0;
        // iga rea kohta mis on ab'is teeme midagi
        while($stmt->fetch()){
            //saime andmed kätte
            echo $row_nr." ".$number_plate_from_db." <br>";
            $row_nr++;
        }*/
        
        // iga rea kohta mis on ab'is teeme midagi
        while($stmt->fetch()){
            //saime andmed kätte
            echo($user_id_from_db);
            //? kuidas saada massiivi - SIIT JÄTKAME
        }
        
        $stmt->close();
        $mysqli->close();
    }
    
    
 ?>