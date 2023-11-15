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


<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-theme-d4 w3-card w3-animate-top w3-xxxlarge" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-theme-d1">Close
    <i class="fa fa-remove"></i>
  </a>
  <a href="plants.php" class="w3-bar-item w3-button">Add plant</a>

</nav>

<!-- Menu bar -->
<div class="w3-top">
<div class="w3-bar w3-xlarge w3-theme-d3 w3-left-align">
  <!-- Home button -->
  <a href="home.php" class="w3-bar-item w3-button w3-theme-dark  "><i class="fa fa-home w3-margin-right"></i>Home</a>
  <!-- My plants tab -->
  <a href="plants.php" class="w3-bar-item w3-button w3-hide-small w3-hover-green">My Plants</a>
  <!-- Setting drop down menu -->
  <div class="w3-dropdown-hover w3-hide-small ">
  <button class="w3-button " title="Notifications">Settings <i class="fa fa-caret-down"></i></button>
  <div class="w3-dropdown-content w3-card-4 w3-bar-block">
    <a href="water.html" class="w3-bar-item w3-button">Water Peferences</a>
    <a href="help.html" class="w3-bar-item w3-button">Help</a>
    <a href="blank.html" class="w3-bar-item w3-button">Profile</a>
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
      <h5>Go to the My Plants tab<br>
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
<div class="w3-row-padding w3-padding-64 w3-theme-d5" id="plants">

  <div class="w3-quarter">
  <h2>MY PLANTS</h2>
  <br>
  <div class="welcome">
    <h4><b>Welcome to your <br> GreenHouse</b></h4>
    <p> > Click on plant icon to check status  <br>
        > press  water me to manually water your plant 
    </p>
  </div>
  <br> 
  </div>


<!-- Icon 1 Cactus -->
  <!-- <div class="w3-quarter">
	<div class="w3-card w3-theme-d1">
        <img src="images/cactus.jpeg" alt="John" style="width:100%;height:100%;">
        <div class="w3-container">
          <h3 class="w3-center">Cactus</h3>
          <p class="w3-opacity w3-center">Prickly</p>

          <hr class="rounded">
          <p style="text-decoration-line: underline">Status: </p>
           
          <p> Moisture level = 20% </p>
          <p> Temperature = 30 F </p>
          <p> Light level = Low  </p>
          <p> Time watered = 3:00 pm</p>
           <p><button class="w3-button w3-theme-dark w3-block">Water me</button></p>
        </div>
      </div>
</div> -->


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

      <p style="text-decoration-line: underline">
      Recommended Settings: </p>
      
      <p> Lighting level= <?php echo  ($row['plant_light']) ?> </p>
      <p> Temperature range = <?php echo  ($row['min_temp']) ?> - <?php echo  ($row['max_temp']) ?> </p>    
      <p> Water schedule = <?php echo  ($row['plant_water']) ?> </p>
      <br>

      <form action="plants.php" method="post">
            <input type="submit" value="Update" name="action" class=" w3-button w3-theme-d4 w3-block" />
            <input type="hidden" name="plant_to_update" 
            value="<?php echo $row['plant_name'] ?>" 
            />                 
      </form>
      <br>
      <form action="plants.php" method="post">
        <input type="submit" value="Delete" name="action" class="w3-button w3-theme-d4 w3-block" />
        <input type="hidden" name="plant_to_delete" 
        value="<?php echo $row['plant_name'] ?>"    />                 
      </form>
      
    </div>
  </div>
<?php endwhile; }?>


 </div>

<!-- Add button -->
<div class="w3-container" style="position:absolute; right:0">
  <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-theme-l3"
  style="position:absolute;top:-28px;right:24px">+</a>
</div>


<!--Our Team Container -->
<div class="w3-container w3-theme-d1 w3-padding-64 w3-center" id="team">
  <h2>OUR TEAM RESPONSIBILTIES</h2>

  <div class="w3-row"><br>

    <div class="w3-quarter">
      <img src="background/alex.png" alt="Boss" style="width:45%; " class="w3-circle w3-hover-opacity">
          <h3>Alex Morris</h3>
      <p>User Interface lead</p>
    </div>

    <div class="w3-quarter">
      <img src="background/alex.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Kate Van Meter</h3>
      <p>Embedded lead</p>
    </div>

    <div class="w3-quarter">
      <img src="background/alex.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Audrey Swart</h3>
      <p>Water Mechanism lead</p>
    </div>

    <div class="w3-quarter">
      <img src="background/alex.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Sophia Decleene</h3>
      <p>Microphone lead</p>
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
  // Script for side navigation
  function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "300px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
  }

  // Close side navigation
  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
  }

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
