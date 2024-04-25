<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER UTB SCI ROOM USAGE SYSTEM</title>
    <link rel="stylesheet" href="css/new1.css">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/font-awesome.css" rel="stylesheet"/>
    
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
    
       <style>
.dropbtn {
    background-color: #c300ff;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color:  #c300ff;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
    
</head>
<body onload="viewData()">
    <div class="topnav" id="myTopnav">
<a href="userhome.php" class="active">Home</a>
                <a href="logout.php">Log Out</a>

  <a href="javascript:void(0);" class="icon" onclick="myNavFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
    <div class="container" style="margin-top:35px">
        <h4>UTB SCI ROOM USAGE SYSTEM</h4>
        <h5>SCI YEAR 2</h5>
        <p>use one search button at a time</p>
        
        <table id="tabledit" class="table table-bordered table-striped">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Room NO..">
            <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search by Day..">
            <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search by Course Code..">
            <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search for Lecturers initial..">
            <p><p>Click on the button below for the information</p>
            <p>NOTE: If the room does not show in specific day or time, the room is vacant.</p>
<div class="dropdown">
<button onclick="myDrop()" class="dropbtn">Lecturer's initial</button>
    
  <div id="myDropdown" class="dropdown-content">
    <a >AU: DR AU THIEN WAN</a>
    <a >DS: NOOR DEENINA SALLEH</a>
    <a >EJ: MOHD EFFENDY MOHD JEFFERY</a>
    <a >HI: HJ IRWAN MASHADI HJ MASHUD</a>
    <a >IB: DR IBRAHIM</a>
    <a >IM: HAJI IDHAM MASWADI BIN HAJI MASHUD </a>
    <a >IV: DR IBRAHIM VENKAT</a>
    <a >NS: DR NOR ZAINAH HJ SIAU</a>
    <a >RR: HJ RUDY RAMLE</a>
  </div>
    <div class="dropdown">
<button onclick="myDrop1()" class="dropbtn">Module Code</button>
  <div id="myDropdown1" class="dropdown-content">
    <a >CI2109: PROGRAMMING 3</a>
    <a >CI2212: HUMAN COMPUTER INTERFACE</a>
    <a >CI2110: DATABASE SYSTEMS DEVELOPMENT</a>
    <a >CN2201: INTRODUCTION TO NETWORKING</a>
    <a >CN2202: DATA AND COMPUTER NETWORKING</a>
    <a >BA1101: BUSINESS STATISTICS</a>
    <a >CC2211: BUSINESS STATISTICS</a>
    <a >CC2211: CREATIVE TECHNOLOGY</a>
    <a >CC2221: DIGITL ARTS AND DESIGN</a>
    <a >CC2223: INTRODUCTION TO AUDIO AND VIDEO PRODUCTION 1</a>
  </div>
        <div class="dropdown">
<button onclick="myDrop2()" class="dropbtn">Course Code</button>
  <div id="myDropdown2" class="dropdown-content">
    <a >BCOMP: COMPUTING</a>
    <a >BCNS: COMPUTER NETWORK SECURITY</a>
    <a >BSIC: INTERNET COPMUTING</a>
    <a >BCSDA: COMPUTING WITH DATA ANALYTICS</a>
    <a >BSDM: DIGITAL MEDIA</a>
    <a >BSCM: CREATIVE MULTIMEDIA </a>
    </div>
            <thead>
                <tr>
                    <th >Slot ID</th>
                    <th onclick="sortTable(1)" >Room ID</th>
                    <th onclick="sortTable(2)" >Lecturer's Initial</th>
                    <th onclick="sortTable(3)" >Lecturer</th>
                    <th onclick="sortTable(4)" >Module Code</th>
                    <th onclick="sortTable(5)" >Module</th>
                    <th onclick="sortTable(6)" >Day</th>
                    <th onclick="sortTable(7)" >Start</th>
                    <th onclick="sortTable(8)" >End</th>
                    <th onclick="sortTable(9)" >Capacity</th>
                    <th onclick="sortTable(10)" >Course Code</th>
                    <th onclick="sortTable(11)" >Course</th>
                    <th onclick="sortTable(12)" >Type</th>
                </tr>
                    
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.tabledit.js"></script>
    <script>
    function viewData(){
        $.ajax({
            url: 'process.php?p=view',
            method: 'GET'
        }).done(function(data){
            $('tbody').html(data)
            tableData()
        })
    }
    function tableData(){
        $('#tabledit').Tabledit({
            url: 'process.php',
            eventType: 'dblclick',
            editButton: true,
            deleteButton: true,
            hideIdentifier: false,
            buttons: {
                edit: {
                    class: 'btn btn-sm btn-warning',
                    html: '<span class="glyphicon glyphicon-pencil"></span> Edit',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: '<span class="glyphicon glyphicon-trash"></span> Trash',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Save'
                },
                restore: {
                    class: 'btn btn-sm btn-warning',
                    html: 'Restore',
                    action: 'restore'
                },
                confirm: {
                    class: 'btn btn-sm btn-default',
                    html: 'Confirm'
                }
            },
            columns: {
                identifier: [0, 'roomNo'],
                
            },
            onSuccess: function(data, textStatus, jqXHR) {
                viewData()
            },
            onFail: function(jqXHR, textStatus, errorThrown) {
                console.log('onFail(jqXHR, textStatus, errorThrown)');
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            },
            onAjax: function(action, serialize) {
                console.log('onAjax(action, serialize)');
                console.log(action);
                console.log(serialize);
            }
        });
    }
    </script>
    

</body>
</html>

     <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabledit");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
  table = document.getElementById("tabledit");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
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
function myFunction3() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabledit");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[10];
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
function myFunction4() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabledit");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
function myNavFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

    <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("tabledit");
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
        
        <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myDrop() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
    
    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myDrop1() {
    document.getElementById("myDropdown1").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
    
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myDrop2() {
    document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>