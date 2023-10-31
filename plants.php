
<!DOCTYPE html>
<html>
<head>
<title>Plant Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-green.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style/plants.css" /> 
</head>

<body id="myPage">

<!-- Links the php database form handling -->
<div class="error">
  <?php require('button-handler.php') ?>
  <?php $tasks = getAllPlants(); ?>
</div>

<!-- Menu bar -->
<div class="w3-top">

  <div class="w3-bar w3-large w3-theme-d3 w3-left-align">
    <!-- Home button -->
    <a href="home.php" class="w3-bar-item w3-button w3-theme-dark  "><i class="fa fa-home w3-margin-right"></i>Home</a>
    <!-- My plants tab -->
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-green">My Plants</a>
    <!-- Setting drop down menu -->
    <div class="w3-dropdown-hover w3-hide-small ">
    <button class="w3-button " title="Notifications">Settings <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="water.html" class="w3-bar-item w3-button">Water Peferences</a>
      <a href="help.html" class="w3-bar-item w3-button">Help</a>
      <a href="blank.html" class="w3-bar-item w3-button">Profile</a>
      <a href="login.html" class="w3-bar-item w3-button w3-hide-small w3-theme-d1 w3-hover-dark w3-right">Log out</a>
    </div>
  </div>

 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d4 w3-hide w3-hide-large w3-hide-medium">
    
    <button class="w3-button " title="Notifications">Menu <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="plant.html" class="w3-bar-item w3-button">My Plants</a>
      <a href="water.html" class="w3-bar-item w3-button">Water Peferences</a>
      <a href="help.html" class="w3-bar-item w3-button">Help</a>
      <a href="blank.html" class="w3-bar-item w3-button">Profile</a>
      <a href="login.html" class="w3-bar-item w3-button w3-right">Log out</a>
    </div>
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-center title w3-animate-opacity ">
    <!-- background image -->
  <img src="images/wet.jpeg" alt="boat" style="width:100%;min-height:350px;max-height:400px;opacity:0.5">
  <div class="w3-container w3-display-middle w3-margin-bottom" >
    <h1 class="w3-margin ">Plants Whisperers</h1>
</div>
</div>

<?php session_start(); ?>

<?php
  if(isset($_COOKIE['user']))
  {
?>

<section>
<!-- Plant page -->
<div id="plantPage" class="w3-row-padding w3-padding-64 backgroundDark" id="work">
    
    
    <div class="formContainer">
      <h2><b>DETAILS</b></h2>
      <p>To get started fill out the form below to register your plant and add it to the virtual green house which can be shown on the home page. Setting the water peferences will help water plant on a schedule if sensors don't work</p>
      <br>

      <!--Start of the form   -->
      <form name="mainForm" action="plants.php" method="post"> 
     
      <!-- Type -->
        <label for="type"><h3>Type of Plant:</h3></label>    
         <!--Error message when field isnt filled out  -->
        <span class="msg"><?php if (empty($_POST['type'])) echo $type_msg ?></span>
        <!--php to register type of plant--> 
        <input name="type"  type="text" class="input" placeholder="Type of plant" 
          value="<?php if ($task_to_update != null) echo $task_to_update['plant_type'];
            elseif (isset($_GET['type'])) echo $_GET['type']; ?>"
          <?php if (empty($_POST['type'])) { ?> autofocus <?php } ?> 
          /> 

      <!-- Name -->
        <label for="name"><h3>Name of Plant:</h3></label>  
        <!--Error message when field isnt filled out  -->
        <span class="msg"><?php if (empty($_POST['name'])) echo $name_msg ?></span>
        <!--php to register name of plant--> 
        <input name="name"  type="text" class="input" placeholder="Plant nickname"  
        value="<?php if ($task_to_update != null) echo $task_to_update['plant_name']; 
            elseif (isset($_GET['name'])) echo $_GET['name']; ?>"
        <?php if (empty($_POST['name'])) { ?> autofocus <?php } ?> 
        /> 
      
      <!-- Light -->
        <label for="light"><h3>Light Preferences:</h3></label>  
        <!--Error message when field isnt filled out  -->
        <span class="msg"><?php if (empty($_POST['light'])) echo $light_msg ?></span>
        <!--php to register light settings of plant--> 
        <!-- <input name="light"  type="text" class="input form-control" placeholder="Direct, Indirect, or No lighting"  
        value="<?php if ($task_to_update != null) echo $task_to_update['plant_light']; 
            elseif (isset($_GET['light'])) echo $_GET['light']; ?>"
        <?php if (empty($_POST['light'])) { ?> autofocus <?php } ?>  
        /> -->
        <div class="custom-select">
          <select name="light">
            <option value="default" > Choose Plant Lighting</option>
            <option value="direct"
            <?php if ($task_to_update != null && $task_to_update['plant_light']=='Direct Lighting')
                { ?> 
                selected 
          <?php } ?>  
            > Direct Sunlight</option>
            <option value="indirect"
            <?php if ($task_to_update != null && $task_to_update['plant_light']=='Indirect Lighting')
                { ?> 
                selected 
          <?php } ?>  
            >Indirect Sunlight  </option>
            <option value="no"
            <?php if ($task_to_update != null && $task_to_update['plant_light']=='Little to No Lighting')
                { ?> 
                selected 
          <?php } ?>  
            >Little to No Lighting</option>
          </select>
        </div>

      <!-- Temp -->
       <label for="min"><h3>Temperature Conditions:</h3></label>
       <!--Error message when field isnt filled out  -->
       <span class="msg"><?php if (empty($_POST['min'])) echo $temp_msg ?></span>
       
     <!-- Min Temperature -->   
     <div>  
         <!--php to register min temperature settings of plant--> 
       <input  name="min" type="text" class="temp-input" placeholder="min temp"  style="float:left"
        value="<?php if ($task_to_update != null) echo $task_to_update['min_temp']; 
            elseif (isset($_GET['min'])) echo $_GET['min']; ?>"
        <?php if (empty($_POST['min'])) { ?> autofocus <?php } ?> 
        /> 
        
      <!-- Max Temperature -->
        <input name="max" type="text" class="temp-input" placeholder="max temp"  style="float:right"
        value="<?php if ($task_to_update != null) echo $task_to_update['max_temp']; 
          elseif (isset($_GET['max'])) echo $_GET['max']; ?>"
        <?php if (empty($_POST['max'])) { ?> autofocus <?php } ?> 
        /> 
      </div>
        
      <br>
      <!-- Water drop down menu -->
        <label for="water"><h3>Water Schedule:</h3> </label>
        <!--Error message when field isnt filled out  -->
        <span class="msg"><?php if (empty($_POST['water'])) echo $water_msg ?></span>
  
        <div class="custom-select">
          <select name="water"  class="form-select">
            <option value="default"
            <?php if ($task_to_update != null && $task_to_update['plant_water']=='default')
                { ?> 
                selected 
          <?php } ?>  
            > Enter ideal water schedule</option>
            <option value="everyday"
            <?php if ($task_to_update != null && $task_to_update['plant_water']=='2-3 days')
                { ?> 
                selected 
          <?php } ?>       
            >Once a day</option>
            <option value="2-3 days"
            <?php if ($task_to_update != null && $task_to_update['plant_water']=='2-3 days')
                { ?> 
                selected 
          <?php } ?>       
            >Every 2-3 days</option>
            <option value="once a week"
            <?php if ($task_to_update != null && $task_to_update['plant_water']=='Once a week')
                { ?> 
                selected 
          <?php } ?>  
            >Once a week</option>
            <option value="biweekly"
            <?php if ($task_to_update != null && $task_to_update['plant_water']=='Biweekly')
                { ?> 
                selected 
          <?php } ?>  
            > Every 2 weeks</option>
            <option value="dry"
            <?php if ($task_to_update != null && $task_to_update['plant_water']=='Idk')
                { ?> 
                selected 
          <?php } ?>  
            > Idk when soil is dry</option>
          </select>
        </div>
      
        
        <label for="image"><h3> Upload Image: </h3></label>
          <input type="file" name="uploadfile" />
          <input type="submit" name="action" value="upload" />


        <br>
        <br>
        <input type="submit" value="Submit" name="action" class="input" />
        </br>
        <input type="submit" value="Confirm update" name="action" class="input" />
        </br>
      </form>
      <br>
      <br>
    </div>
   </div>
</section>

<!-- Image Placement  -->


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

<footer class="w3-container w3-large w3-padding-32 w3-theme-d3 w3-center"></footer>


<!-- Dropdown backend -->
<script>
  var x, i, j, l, ll, selElmnt, a, b, c;
  /*look for any elements with the class "custom-select":*/
  x = document.getElementsByClassName("custom-select");
  l = x.length;
  for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
      /*for each option in the original select element,
      create a new DIV that will act as an option item:*/
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function(e) {
          /*when an item is clicked, update the original select box,
          and the selected item:*/
          var y, i, k, s, h, sl, yl;
          s = this.parentNode.parentNode.getElementsByTagName("select")[0];
          sl = s.length;
          h = this.parentNode.previousSibling;
          for (i = 0; i < sl; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
              s.selectedIndex = i;
              h.innerHTML = this.innerHTML;
              y = this.parentNode.getElementsByClassName("same-as-selected");
              yl = y.length;
              for (k = 0; k < yl; k++) {
                y[k].removeAttribute("class");
              }
              this.setAttribute("class", "same-as-selected");
              break;
            }
          }
          h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
      });
  }
  function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i)
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < xl; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }
  /*if the user clicks anywhere outside the select box,
  then close all select boxes:*/
  document.addEventListener("click", closeAllSelect);

</script>

<?php
  }
  else
   header('Location: login.php');
?>

</body>
</html>
