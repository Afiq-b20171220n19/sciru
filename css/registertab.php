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
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="tab.php">Home</a>
  <a href="registertab.php" class="active">Register</a>
     <a href="signup.php">Sign Up</a>
    
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

    <label for="room", name="room" required><b>Room No</b></label>
     <select name="room" required>
    <option value="">Select Room</option>
    <option value="1F48/49">1F48/49</option>
    <option value="1F50">1F50</option>
    <option value="1F51">1F51</option>
  
    </select>

    <label for="lecturer"><b>Lecturer</b></label>
    <input type="text" placeholder="Enter Lecturer's Name" name="lecturer" required>

    <label for="module"><b>Module</b></label>
    <input type="text" placeholder="Enter Module" name="module" required>
    

    <label for="day", name="day" required><b>Day</b></label>
    <select name="day" required>
    <option value="">Select the Day</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Saturday">Saturday</option>    
    </select>
    
    
    <label for="start"><b>Start</b></label>     
    <input type="time" placeholder="Start Time" name="start" required>
      
    <label for="end"><b>End</b></label>
    <input type="time" placeholder="Start Time" name="end" required>


    <label for="capacity",name="capacity" required><b>Capacity</b></label>
     <select name="capacity" required>
    <option value="">Select the Capacity</option>
    <option value="25">25</option>
    <option value="50">50</option>
    <option value="75">75</option>
    <option value="100">100</option>
    </select>
    
        
    <p>
    <button type="submit" class="registerbtn" name="submit">Submit</button>
    </div></body></head></html>

<?php
if(isset($_POST["submit"])){
$servername = "localhost";
$username = "root";
$password = "r00t";
$dbname = "room";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT Into roominfo (roomNo,lecturer,module,day,start,end,capacity) values('".$_POST ["room"]."','".$_POST["lecturer"]."','".$_POST["module"]."','".$_POST["day"]."','".$_POST["start"]."','".$_POST["end"]."','".$_POST["capacity"]."')";

if ($conn->query($sql) === TRUE) {
    echo"<script>alert('New record created successfully');</script>";
} else {
    echo "<script'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
}
?>
