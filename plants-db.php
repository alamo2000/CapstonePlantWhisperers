<?php

function getAllPlants()
{
   global $db;
   $query = "select * from plant";
   $statement = $db->prepare($query);
   $statement->execute();

   $results = $statement->fetchAll();  // retrieve all row

   $statement->closeCursor();

   return $results;
}


function addItem( $type, $name, $light, $min, $max, $water)
{
	// db handler
    global $db;
    // sql
    $query = "INSERT INTO plant (plant_type, plant_name, plant_light, min_temp, max_temp, plant_water) VALUES (:itype, :iname :ilight, :imin, :imax, :iwater)";

    // execute
    $statement = $db->prepare($query);  
    $statement->bindValue(':itype', $type);
    $statement->bindValue(':iname', $name);
    $statement->bindValue(':ilight', $light);
    $statement->bindValue(':imin', $min);
    $statement->bindValue(':imax', $max);
    $statement->bindValue(':iwater', $water);
    $statement->execute();

    // release 
    $statement->closeCursor();
}

// function deleteTask($type)
// {
//     global $db;
//     $query = "DELETE FROM plant WHERE plant_type = :itype";
//     $statement = $db->prepare($query);
// 	$statement->bindValue(':itype', $type);
//     $statement->execute();
// 	$statement->closeCursor();
// }

?>



