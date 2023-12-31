<!DOCTYPE html>
<html>
<head>
<title>Green Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-green.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style/home.css" /> 
</head>
<body id="myPage">

<?php include('button-handler.php') ?>
<?php 
  $task = getAllPlants();
?>

<?php session_start(); ?>

<?php
  if(isset($_COOKIE['user']))
  {
?>

<!-- Menu bar -->
<div class="w3-top">
<div class="w3-bar w3-xlarge w3-theme-d3 w3-left-align">
  <!-- Home button -->
    <a href="home.php" class="w3-bar-item w3-button w3-theme-dark  "><i class="fa fa-home w3-margin-right"></i>Home</a>
  
    <a href="plants.php" class="w3-bar-item w3-button w3-hide-small w3-hover-green">My Plants</a>
    <a href="help.html" class="w3-bar-item w3-button">Help</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-theme-d1 w3-hover-dark w3-right">Log out</a>
  </div>
  
</div>

</div>

<!-- Navbar on small screens -->
   <div id="navDemo" class="w3-bar-block w3-theme-d4 w3-hide w3-hide-large w3-hide-medium">
    
    <button class="w3-button " title="Notifications">Menu <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="plants.php" class="w3-bar-item w3-button">My Plants</a>
      <a href="#team" class="w3-bar-item w3-button">Team</a>
      <a href="water.html" class="w3-bar-item w3-button">Water Peferences</a>
      <a href="help.html" class="w3-bar-item w3-button">Help</a>
      <a href="blank.html" class="w3-bar-item w3-button">Profile</a>
      <a href="login.php" class="w3-bar-item w3-button w3-right">Log out</a>
    </div>
  </div>
</div>



<!-- Image Header -->
<div class="w3-display-container w3-center title w3-animate-opacity ">
    <!-- background image -->
  <br>
  <h4 style="text-align: left;">Welcome, <strong><font color="Green" style="font-style:verdana; font-size: 20px; "><?php echo $_COOKIE['user'] ?></font></strong></h4>
  <img src="background/wet.jpeg" alt="boat" style="width:100%;min-height:350px;max-height:400px;opacity:0.5">



  <div class="w3-container w3-display-middle w3-margin-bottom" >
    <h1 class="w3-margin ">Plants Whisperers</h1>
    <!-- get started button  -->
 	 <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme-d3 w3-hover-green">Get Started</button>
  </div>
</div>

<!-- Get STARTED Pop up -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-green w3-display-container">
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-green w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>How to get Started</h4>
    </header>
    <div class="w3-container">
      <h5>Go to the <a href="plants.php">My Plants tab</a><br>
       > Fill out the information for you plant
        <br>
       > Then the plant will appear on your virtual green house on the home page <i class="fa fa-smile-o"></i></h5>
    </div>
    <footer class="w3-container w3-green">
      <p>We are glad you choose us to assist your plant needs</p>
    </footer>
  </div>
</div>


<!-- Virtual Green House -->
<div class="w3-row-padding w3-padding-32 w3-theme-d5" id="plants">

  <div class="w3-quarter">
  <h2>MY PLANTS</h2>
  <br>
  <div class="welcome">
    <h4><b>Welcome to your <br> GreenHouse</b></h4>
    <p> > Click status link to see real-time sensor data </p>
    <p> > To access the water button click status link </p>
  </div>
  <br> 
  </div>



<!-- Plant Icons -->
<?php
  // Establish a PDO connection to your database
  global $db;
  $query = 'SELECT `plant_type` , `plant_name` , `plant_light`, `min_temp`, `max_temp` , `plant_water`, `plant_image`  FROM plant ORDER BY id';
  $result = $db->query($query);
  
  if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?> 
  
  <div class="w3-quarter">
    <div class="formContainer">
      <img src="images/<?php echo $row['plant_image']; ?>" style="width:100%;height:100%;">
      
      <h3 style="text-align:center;">
      <?php echo  $row['plant_type'] ?></h3>

      <h4 class="w3-opacity w3-center">
     <?php echo  $row['plant_name'] ?></h4>
     <hr class="rounded">
     <p> <b> Check Plant Status:</b> </p>
      
      <p> <a href="https://hosting.systemlinkcloud.io/webapps/dcd56321-430c-4d11-b529-765651aa9fde/content/ni-paths-NISHAREDDIR64/Web%20Server/htdocs/WebApp/index.html">Access sensors</a> <p>
      <hr class="rounded">

      <!-- <p style="text-decoration-line: underline">
      -->
      <p><b>Recommended Settings: </b></p> 
      
      <p> Lighting level = <?php echo  ($row['plant_light']) ?> </p>
      <p> Temperature range = <?php echo  ($row['min_temp']) ?> - <?php echo  ($row['max_temp']) ?> </p>    
      <p> Water schedule = <?php echo  ($row['plant_water']) ?> </p>
      <br>

      <!-- <form action="plants.php" method="post">
            <input type="submit" value="Update" name="action" class=" w3-button w3-theme-d1 w3-block" />
            <input type="hidden" name="plant_to_update" 
            value="<?php echo $row['plant_name'] ?>" 
            />                 
      </form> -->
      <br>
      <form action="home.php" method="post">
        <input type="submit" value="Delete" name="action" class="w3-button w3-theme-d4 w3-block" />
        <input type="hidden" name="plant_to_delete" 
        value="<?php echo $row['plant_name'] ?>"    />                 
      </form>
      
    </div>
  </div>
<?php endwhile; }?>


 </div>



<!--Our Team Container -->
<div class="w3-container w3-theme-d1 w3-padding-64 w3-center" id="team">
  <h2>OUR TEAM RESPONSIBILTIES</h2>

  <div class="w3-row"><br>

    <div class="w3-quarter">
      <img src="background/Alex.png" alt="Boss" style="width:45%; " class="w3-circle w3-hover-opacity">
          <h3>Alex Morris</h3>
      <p>User Interface lead</p>
    </div>

    <div class="w3-quarter">
      <img src="background/Kate.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Kate Van Meter</h3>
      <p>Embedded lead</p>
    </div>

    <div class="w3-quarter">
      <img src="background/Audrey.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Audrey Swart</h3>
      <p>Microphone lead</p>
    </div>

    <div class="w3-quarter">
      <img src="background/Sophia.jpg" alt="Boss" style="width:48%" class="w3-circle w3-hover-opacity">
      <h3>Sophia Decleene</h3>
      <p>Power Supplies lead</p>
    </div>

  </div>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d5 w3-center">

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-green w3-hide-small">Go To Top</span>
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>



<script>

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }
</script>


<?php
  }
  else
   header('Location: login.php');
?>

</body>
</html>
