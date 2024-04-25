<!DOCTYPE html>
<html>
<head>
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
  <a href="adminhome.html" >Home</a>
  <a href="register.php">Register</a>
  <a href="approval.php" class="active">Approval</a>
        <a href="logout.php">Log Out</a>
  <a href="javascript:void(0);" class="icon" onclick="myNavFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="padding-left:16px">
  <!--change here-->
    <h2>UTB SCI ROOM USAGE SYSTEM</h2>
        <p></p>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Username..">
    <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for Status..">
    <h3>Room Schedule</h3>
    <div style="overflow-x:auto;">
    <table id="myTable">
    <tr class="header">
    <th onclick="sortTable(0)">Username</th>
    <th onclick="sortTable(1)">First Name</th>
    <th onclick="sortTable(2)">Last Name</th>
    <th onclick="sortTable(3)">Position</th>   
    <th onclick="sortTable(4)">Status</th>
    <th onclick="sortTable(5)">Approve</th>
    <th onclick="sortTable(6)">Reject</th>
    
      
        </tr>
    <?php
    include("connectapprove.php");
        
     $result = mysql_query("SELECT * FROM user");
   
    while($test = mysql_fetch_array($result))
    {
    echo "<tr>";
    echo"<td>"; echo $test['username']; echo "</td>";
    echo"<td>"; echo $test['firstname']; echo "</td>";
    echo"<td>"; echo $test['lastname']; echo "</td>";
    echo"<td>"; echo $test['access_level']; echo "</td>";
    echo"<td>"; echo $test['status']; echo "</td>";
    echo"<td>"; ?><a href="approve.php?id=<?php echo $test["id"]; ?>">Approve</a><?php echo "</td>";
    echo"<td>"; ?><a href="reject.php?id=<?php echo $test["id"]; ?>">Reject</a><?php echo "</td>";
    echo "</tr>";
    }
    mysql_close($conn);
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

$sql = "INSERT Into roominfo (roomNo,lecturer,module,day,start,end,capacity) values('".$_POST ["room"]."','".$_POST["lecturer"]."','".$_POST["module"]."','".$_POST["day"]."','".$_POST["start"]."','".$_POST["end"]."','".$_POST["capacity"]."')";

if ($conn->query($sql) === TRUE) {
    echo"<script>alert('New record created successfully');</script>";
} else {
    echo "<script'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
}
?>


</body>
</html>
    
     <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    
    <script>
function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    
    <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>