<?php
include("loginserv.php"); // Include loginserv for checking username and password that will be needed for connecting to datbase
?>

<html >
  <head>
    <meta charset="UTF-8">
    <title>UTB SCI ROOM USAGE SYSTEM</title>
    
    
    <link rel="stylesheet" href="cssv2/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="cssv2/style.css">
      <script src="js/prefixfree.min.js"></script> 

    
    
    
  </head>

  <body>

    
<div class="container">
  <div class="info">
    <h1>UTB SCI ROOM USAGE SYSTEM</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="utb.png" x="0px" y="0px"/></div>
  <form class="register-form">
    <input type="text" name="username" placeholder="name" style="text-transform: uppercase"/>
    <input type="password" name="password" placeholder="password"/>
    <input type="text" placeholder="email address"/>
    <button>create</button>
   
  </form >
  <form action="" method="post" class="login-form">
    <input type="text" name="username"  placeholder="username"/>
    <input type="password" name="password" placeholder="password"/>
    <input type="submit" value="LOG IN" name = "submit" style="background:#c300ff; color:#FFFFFF; font-weight:bold;" />
      
      
      <span> <?php echo $error; ?></span>
      
  </form>
    <a href="signup.php">Sign Up</a>
</div>


        <script src="jsv2/index.js"></script>

    
    
    
  </body>
</html>

