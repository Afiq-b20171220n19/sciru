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
    <a href="adminhome.html">Home</a>
    <a href="register.php" class="active">Register</a>
    <a href="approval.php">Approval</a>
    <a href="logout.php">Log Out</a>
    
  <a href="javascript:void(0);" class="icon" onclick="myNavFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="padding-left:16px">
  <!--change here-->
    <h2>UTB SCI ROOM USAGE SYSTEM</h2>
    <h4>SCI YEAR 2</h4>
    <h3>Register</h3>
    
    <p>Please fill in this form to register a room.</p>
   
    
    <label for="course", name="course" required><b>Select Course:</b></label>
     <select name="course" required>
    <option value="">Select Course</option>
    <option value="BCOMP">COMPUTING</option>
    <option value="BSIC">INTERNET COMPUTING</option>
    <option value="BCSDA">COMPUTING WITH DATA ANALYTICS</option>
    <option value="BCNS">COMPUTER NETWORK SECURITY</option>
    <option value="BSDM">DIGITAL MEDIA</option>
    <option value="BSCM">CREATIVE MULTIMEDIA</option>
     </select>

     <hr>

    <label for="room", name="room" required><b>Room No</b></label>
     <select name="room" required>
    <option value="GF36">GF36</option>
    <option value="GF37">GF37</option>
    <option value="GF38">GF38</option>
    <option value="GF47">GF47</option>
    <option value="GF48">GF48</option>
    <option value="GF49">GF49</option>
    <option value="1F4849">1F48/49</option>
    <option value="1F50">1F50</option>
    <option value="1F51">1F51</option>
    <option value="1F59">1F59</option>
    <option value="1F60">1F60</option>
    <option value="1F61">1F61</option>
    <option value="1F115">1F115</option>
    <option value="1F116">1F116</option>
    <option value="1F117">1F117</option>
             <option value="Concourse">Concourse</option>
    <option value="LT1">LT1</option>
    <option value="LT2">LT2</option>
    <option value="LT3">LT3</option>
    </select> 

      <label for="lecturer", name="lecturer" required><b>Lecturer</b></label>
    <select name="lecturer" required>
    <option value="">Select the Lecturer</option>
    <option value="AU">Dr Au Thien Wan</option>
    <option value="IV">DR Ibrahim Venkat</option>
    <option value="HI">Haji Irwan Mashadi Hj Mashud</option>
    <option value="NS">Dr Nor Zainah Hj Siau</option>
    <option value="RR">Hj Rudy Ramle</option>  
    <option value="IB">Dr Ibrahim</option>
    <option value="EJ">Mohd Effendy Mohd Jeffrey</option> 
    <option value="DS">Noor Deenina Salleh</option> 
    <option value="IM">Haji Idham bin Haji Mashud</option> 
    </select>


    <label for="module", name="module" required><b>Module</b></label>
    <select name="module" required>
    <option value="">Select the Module</option>
    <option value="CI2109">Programming 3</option>
    <option value="CI2212">Human Computer Interface</option>
    <option value="CI2110">Database Systems Development</option>
    <option value="CN2201">Introduction to Networking</option>
    <option value="CN2202">Data and Computer Networking</option>  
    <option value="BA1101">Business Statistics</option>
        <option value="CC2211">Creative Technology 1</option> 
        <option value="CC2221">Digital Arts and Design</option> 
        <option value="CC2223">Introduction to Audio and Video Production 1</option> 
    </select>
    
    <label for="type", name="type" required><b>Type</b></label>
     <select name="type" required>
    <option value="">Select Type</option>
    <option value="lecture">Lecture</option>
    <option value="practical">Practical/Tutorial</option>
    </select> 
    

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
    <input type="time" placeholder="End Time" name="end" required>



    
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

$sql = "INSERT Into roomstatus(coursecode,roomNo,lectid,modcod,type,day,start,end) values('".$_POST["course"]."','".$_POST["room"]."','".$_POST["lecturer"]."','".$_POST["module"]."','".$_POST["type"]."','".$_POST["day"]."','".$_POST["start"]."','".$_POST["end"]."')";
if ($conn->query($sql) === TRUE) {
    echo"<script>alert('New record created successfully');</script>";
} else {
    echo "<script'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
}
?>


<script>
function myNavFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
