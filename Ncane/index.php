<?php

  session_start();

  if(isset($_SESSION["user_id"])) {

    $mysqli = require "data.php";
    $sql = "SELECT * FROM user
             WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
  }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="style.css">
   <title>Home</title>
   <style>
h1 {text-align: center;}
p {text-align: center;}
a {font-size: 30px}
div {text-align: center;}
</style>
</head>
<body>
   <div>
     <h1>Home</h1>

     <?php if(isset($user)): ?>

        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>

        <p><a href="logout.php">Log out</a></p>

        <?php else: ?>

            <p><a href="log.php">Log in</a> or <a href="register.html">Sign up </a></p>



            <h2 style="font-size:2vw">Daily Tip </h2>
                <p style="font-size:1vw">
                Recycling does not have to be a chore,</p>
               <p style="font-size:1vw"> with a few simple changes it can be seamlessly integrated into everyday life.</p> 
                <p style="font-size:1vw"> Just follow our simple tips below and start making a difference.
                </p>
        <?php endif; ?>
        </div>    
        <div class="container">
        
        <img src="img/trash-can.png" class="mobile1">
        <img src="img/test.png" class="mobile2">
        <img src="img/donate.png" class="mobile3">
        <img src="img/flight.png" class="mobile4">
            <div id="home" class="flex-column flex center">
                <a href="rewards.html" class="btn">Rewards <i class="fa fa-cc-mastercard" aria-hidden="true"></i></a>
                <a href="collect.html" class="btn">Collect <i class="fa fa-recycle" aria-hidden="true"></i></a>
                <a href="questionnaire.html" class="btn">Questionnaire <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                 
            </div>
        </div>
        
</body>
</html>
