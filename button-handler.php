<!-- Alex Morris xzd9nn -->
<?php 
require('connect-db.php'); 
require('plants-db.php');


$task_to_update = null;      

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if (!empty($_POST['action']) && $_POST['action'] == 'Submit')
  {
    // add a item
    addPlant($_POST['type'],$_POST['name'], $_POST['light'],$_POST['min'], $_POST['max'], $_POST['water']);
    $tasks = getAllPlants();

  }

  else if (!empty($_POST['action']) && $_POST['action'] == 'Update')
  {
    // retrieve the item to update
    $task_to_update= getPlantInfo_by_name($_POST['plant_to_update']); 
    // update after confirm
    var_dump($task_to_update);   // complete the update
  }

  else if (!empty($_POST['action']) && $_POST['action'] == 'Delete')
  {
    // delete the specific plant
    deletePlant($_POST['plant_to_delete']); 
    $tasks = getAllPlants();
  }


  if (!empty($_POST['action']) && $_POST['action'] == 'Confirm update')
  {
    updatePlant($_POST['type'],$_POST['name'], $_POST['light'],$_POST['min'], $_POST['max'], $_POST['water']);
    $tasks = getAllPlants();
  }
}
?>


<?php
//Error messages
$type = $name = $light = $min = $max = $water = NULL;
$type_msg = $name_msg = $light_msg = $temp_msg= $water_msg = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (empty($_POST['type']))
    $type_msg = "Please enter the type of plant";
  else
  {
    $type = trim($_POST['type']);
  }

  if (empty($_POST['name']))
    $name_msg = "Please enter the name of the plant";
  else
  {
    $name = trim($_POST['name']);
  }
  
  if (empty($_POST['light']))
    $light_msg = "Please enter light ";
  else
  {
    $light = trim($_POST['light']);
  }


  if (empty($_POST['max'] &&  empty($_POST['min'])))
    $temp_msg = "Please enter the temperature";
  else
  {
    $max= trim($_POST['max']);
    $min = trim($_POST['min']);
  }

  if (empty($_POST['water']))
  $water_msg = "Please enter the water schedule"; 
  else
  {
    $water= trim($_POST['water']);
  }

}
?> 
