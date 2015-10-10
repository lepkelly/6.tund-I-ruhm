<?php
    require_once("../config_global.php");
    $database = "if15_kelllep";
    function getAllData(){
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plate WHERE deleted IS NULL");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
        $stmt->execute();
		
		//massiiv kus hoiame autosid
		$array = array();
		
        // iga rea kohta mis on ab'is teeme midagi
        while($stmt->fetch()){
            //suvaline muutuja, kus hoiame auto andmeid selle hetkeni kui lisame massiivi
			
			//tühi objekt kus hoiame väärtusi
			$car = new StdClass();
			
			$car->id = $id_from_db;
			$car->number_plate = $number_plate_from_db;
			$car->user_id = $user_id_from_db; 
            $car->color = $color_from_db;
			
			//ilsan massiivi (auto lisan massiivi)
			array_push($array, $car);
			//echo "<pre>";
			//var_dump($array);
			//echo "</pre>";
			
		}
		//auto lisan massiivi
		return $array;
		//echo "<pre>";
		//var_dump($array);
		//echo "</pre>";
        
        $stmt->close();
        $mysqli->close();
    }
	
	function deleteCarData($car_id){
        
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        
        // uuendan välja deleted, lisan praeguse date'i
        $stmt = $mysqli->prepare("UPDATE car_plate SET deleted=NOW() WHERE id=?");
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        
        // tühjendame aadressirea
        header("Location: table.php");
        
        $stmt->close();
        $mysqli->close();
        
    }
    
    
 ?>