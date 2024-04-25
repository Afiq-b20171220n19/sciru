<!DOCTYPE html>
<html>
<head>
    <form  method="POST">
         <link rel="stylesheet" href="css/register.css">
     <link rel="stylesheet" href="css/test.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #c300ff;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
    .username_availability_result{
	display:block;
	width:auto;
	float:center;
	padding-left:0.5px;
}
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
     <a href="signup.php"  class="active">Sign Up</a>
    <a href="logout.php">Back to Log in Page</a>
  <a href="javascript:void(0);" class="icon" onclick="myNavFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="padding-left:16px">
  <!--change here-->
    <h2>UTB SCI ROOM USAGE SYSTEM</h2>
    
    <h3>Register</h3>
    <p>Please fill in this form to register a room.</p>
    <hr>


    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter User Name" id="username" name="username" required style="text-transform: uppercase">
<p class="username_availability_result" id="username_availability_result"/> 
    <label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname" required>
    
    <label for="lastname"><b>Last Name</b></label>     
    <input type="text" placeholder="Enter Last Name" name="lastname" required>
    
    <label for="access", name="access" required><b>Position</b></label>
     <select name="access" required>
    <option value="">Select Position</option>
    <option value="admin">Admin</option>
    <option value="user">User</option>
        
      </select>  
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" required>


    
        
    <p>
    <button type="submit" class="registerbtn" name="submit">Submit</button>
    </div></body></head></html>

<?php
if(isset($_POST["submit"])){
$servername = "localhost";
$username = "root";
$password = "r00t";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$POSTuser = array_map("strtoupper", $_POST);
    
$sql = "INSERT Into user (username,firstname,lastname,access_level,password,status) values('".$POSTuser ["username"]."','".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["access"]."','".$_POST["password"]."','pending')";

if ($conn->query($sql) === TRUE) {
    echo"<script>alert('New record created successfully, wait for an approval from admin');</script>";
} else {
    if(mysqli_errno($conn) == 1062)
                       echo "<script>alert('username has already been taken');</script>";
                   else    
    echo "<script'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
    
}
    
    

$conn->close();
}
?>
