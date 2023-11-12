<!-- Plant table input -->
<section>
<div class="w3-container w3-theme-d1 w3-padding-64 w3-center" id="team">

<div style="position:relative; left: 10%;">
    <table id="myTable">
      <!-- Header -->
      <tr class="header">  
        <thread>
        <th>Plant Type</th>
        <th>Plant Name</th>
        <th>Light Preferences</th>    
        <th>Temp min</th>        
        <th>Temp max</th>        
        <th>Water schedule</th> 
        <th>Image</th> 
        <!-- <th>Image</th> -->
      </tr>
      </thread>
      <!-- Row Entry with data -->
      <?php foreach ($tasks as $item): ?>
      <tr>
        <td><?php echo $item['plant_type'] ?></td> 
        <td><?php echo $item['plant_name'] ?></td>     
        <td><?php echo $item['plant_light'] ?></td>
        <td><?php echo $item['min_temp'] ?></td>
        <td><?php echo $item['max_temp'] ?></td>
        <td><?php echo $item['plant_water'] ?></td>
        <td><img src="images/<?php echo $item['plant_image']; ?>"> </td>
        <td>
          <form action="plants.php" method="post">
            <input type="submit" value="Update" name="action" class="btn btn-primary" />
            <input type="hidden" name="plant_to_update" 
            value="<?php echo $item['plant_name'] ?>" 
            />                 
          </form>
        </td>     
        <td>
          <form action="plants.php" method="post">
            <input type="submit" value="Delete" name="action" class="btn btn-danger" />
            <input type="hidden" name="plant_to_delete" 
            value="<?php echo $item['plant_name'] ?>" 
            />                 
          </form>
        </td>

      </tr>
      <?php endforeach; ?>
    </table>
  </div>
  </div>
</section>


<div id="display-image">
  <h4>Image here</h4>
  <?php
    // Establish a PDO connection to your database
    $items = getAllImages(); 
    foreach ($items as $data): 
 ?>
    <img src="images/<?php echo $data['filename']; ?>">
    <?php endforeach; ?>
</div> 



<?php
  // Establish a PDO connection to your database
 try{
  global $db;
  $query = 'SELECT `plant_type` , `plant_name` , `plant_light`, `min_temp`, `max_temp` , `plant_water`, `plant_image`  FROM plant ORDER BY id';
  $result = $db->query($query);

  
  if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo '<div>' . $row['plant_type'] . '</div>';
      echo '<div>'  .($row['plant_water']) ; '</div>';
      echo '<br>';
      }
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>

