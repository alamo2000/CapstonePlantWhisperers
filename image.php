<?php
  error_reporting(0);
  
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
      $filename = $_FILES["uploadfile"]["name"];
      $tempname = $_FILES["uploadfile"]["tmp_name"];
      $folder = "images/" . $filename;
  
      global $db;
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Get all the submitted data from the form
      $query = "INSERT INTO 'image' ('filename') VALUES (:uimage)";
      
      // Execute query
      $statement = $db->prepare($query);
      $statement->bindValue(':uimage', $filename);
      $statement->execute();
  
      // Now let's move the uploaded image into the folder: image
      if (move_uploaded_file($tempname, $folder)) {
          echo "<Image uploaded successfully!";
      } else {
          echo "Failed to upload image!";
      }
  }
?>

<?php
        global $db;
        $query = "SELECT * FROM image";
        $stmt = $db>query($query);

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <img src="./image/<?php echo $data['filename']; ?>">
        <?php
        }
 ?>



<!-- <?php
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
   $name = $_FILES['image']['name'];
   $type = $_FILES['image']['type'];
   $data = file_get_contents($_FILES['image']['tmp_name']);
   // connect to the database
   global $db; // insert the image data into the database
   $stmt = $db->prepare("INSERT INTO images (name, type, data) VALUES (?, ?, ?)");
   $stmt->bindParam(1, $name);
   $stmt->bindParam(2, $type);
   $stmt->bindParam(3, $data);
   $stmt->execute();
 }
 ?> -->