<?php

$is_valid = false;

   if($_SERVER["REQUEST_METHOD"] === "POST") {

       $mysql = require  "data.php";

       $sql = sprintf("SELECT * FROM user
                       WHERE email = '%s'",
                       $mysql->real_escape_string($_POST["email"]));

       $result = $mysql->query($sql); 
       
       $user = $result->fetch_assoc();

      if($user) {

       if( password_verify($_POST["password"], $user["password_hash"])) {
           session_start();
           
           session_regenerate_id();
           
           $_SESSION["user_id"] = $user["id"];

           header("Location: index.php");
           exit;
       }
      }
     $is_valid = true;
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Login</title>
</head>
<body>
     <h1>Login</h1>

     <?php if($is_valid):?>
        <em>Invalid login</em>
        <?php endif;?>
     <form method="post">
       <label for="email">email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <button>Log in</button>
     </form>
</body>
</html>