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

function getPlantInfo_by_name($task)
{
    global $db;
    $query = "SELECT * FROM plant WHERE plant_name= :pname";
    $statement = $db->prepare($query);
    $statement->bindValue(':pname', $task);
    $statement->execute();

    $results = $statement->fetch();

    $statement->closeCursor();
    return $results; 
}

function addPlant( $type, $name, $light, $min, $max, $water)
{
	// db handler
    global $db;
    // sql
   // $query = "INSERT INTO plant (plant_type, plant_name, plant_light, min_temp, max_temp, plant_water) VALUES (:ptype, :pname :plight, :pmin, :pmax, :pwater)";
    $query = "INSERT INTO `plant`(`id`, `plant_type`, `plant_name`, `plant_light`, `min_temp`, `max_temp`, `plant_water`) VALUES (NULL,\'Cactus\',\'prickley\',\'Indirect\',\'70\',\'90\',\'Once a week\');";
    // execute
    $statement = $db->prepare($query);  
    $statement->bindValue(':ptype', $type);
    $statement->bindValue(':pname', $name);
    $statement->bindValue(':plight', $light);
    $statement->bindValue(':pmin', $min);
    $statement->bindValue(':pmax', $max);
    $statement->bindValue(':pwater', $water);
    $statement->execute();

    $statement->closeCursor();
}

function updatePlant( $type, $name, $light, $min, $max, $water)
{
	// db handler
    global $db;
    // sql
    $query = "UPDATE plant SET plant_type=:ptype , plant_name=:pname, plant_light=:plight, min_temp=:pmin, max_temp=:pmax, plant_water=:pwater WHERE plant_name=:pname";

    // execute
    $statement = $db->prepare($query);  
    $statement->bindValue(':ptype', $type);
    $statement->bindValue(':pname', $name);
    $statement->bindValue(':plight', $light);
    $statement->bindValue(':pmin', $min);
    $statement->bindValue(':pmax', $max);
    $statement->bindValue(':pwater', $water);
    $statement->execute();

    $statement->closeCursor();
}

function deletePlant($type)
{
    global $db;
    $query = "DELETE FROM plant WHERE plant_name = :pname";
    $statement = $db->prepare($query);
	$statement->bindValue(':pname', $type);
    $statement->execute();
	$statement->closeCursor();
}

?>



