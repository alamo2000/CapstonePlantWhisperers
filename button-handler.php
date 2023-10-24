<!-- Alex Morris xzd9nn -->
<?php 
require('connect-db.php'); 
require('plants-db.php');


$task_to_update = null;       // row of item (contains 6 columns)

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  if (!empty($_POST['action']) && $_POST['action'] == 'Submit')
  {
    // add a item
    addPlant($_POST['type'],$_POST['name'], $_POST['light'],$_POST['min'], $_POST['max'], $_POST['water']);
     $objects = getAllPlants();
  }

  else if (!empty($_POST['action']) && $_POST['action'] == 'Update')
  {
     // retrieve the item to update
     $task_to_update= getPlantInfo_by_name($_POST['plant_to_update']); 
     // update after confirm
     var_dump($task_to_update);         // complete the update
  }
  else if (!empty($_POST['action']) && $_POST['action'] == 'Delete')
  {
    // delete the given item
    deletePlant($_POST['plant_to_delete']);    // will write code tomorrow
    $objects = getAllPlants();
  }
}
?>


<?php
$type = $name = $light = $min = $max = $water = NULL;
$type_msg = $name_msg = $light_msg = $min_msg = $max_msg= $water_msg = NULL;

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
    $date_msg = "Please enter light ";
  else
  {
    $date = trim($_POST['light']);
  }

  if (empty($_POST['min']))
    $loc_msg = "Please enter the min temp";
  else
  {
    $location = trim($_POST['min']);
  }

  if (empty($_POST['max']))
    $contact_msg = "Please enter the max temp";
  else
  {
    $contact= trim($_POST['max']);
  }

  if (empty($_POST['water']))
  $contact_msg = "Please enter the water schedule"; 
  else
  {
    $contact= trim($_POST['water']);
  }

}
?> 
