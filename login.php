<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/login.css" />
    <title>Login and Signup</title>

</head>
<body>

    <div class="row">`

        <div class="title">
            <h1 >  Plant Whisperers</h1>
        </div>

        <!-- PHP FORM HANDLING -->
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(strlen($_POST['username']) > 0){ //isset, !empty 
                setcookie('user', $_POST['username'], time()+3600); //60min 
                setcookie('pwd', password_hash($_POST['pwd'], PASSWORD_DEFAULT), time()+3600);
                header('Location: home.php');
            }
            }
        ?>

        <div class="login-container">
            <h1>Login </h1>
            
            <div id="login-form">
            <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="text" name="username" class="login-input"  placeholder="Username" autofocus required /> <br/>
                <input type="password" name="pwd" class="login-input" placeholder="Password" required /> 
                <br>
                <input type="submit" value="Login" class="login-button" />   
            </form>     
            </div>


            <p style="color: rgb(7, 43, 14);">Don't have an account? <a href="signup.html" onclick="toggleForms()"><b>Sign up here </b></a></p>
        </div>

    </div>


<script>
        
</script>
</body>
</html>
