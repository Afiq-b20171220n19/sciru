<?php
$error=''; //Variable to Store error message;

if(isset($_POST['submit'])){//once the user has successfully press or enter the submit button
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error = "USERNAME/PASSWORD IS INVALID";//The following message will be shown if the user the user does not key in any data
	}
	else
	{
	
        //Define $user and $pass
		$user=$_POST['username'];
		$pass=$_POST['password'];
        //Establishing Connection with server by passing server_name, user_id and password as a patametes,Selecting Database
		$conn = mysqli_connect("localhost", "root", "r00t","login");
		//sql query to fetch information of registerd user and finds user match.
		$query = mysqli_query($conn, "SELECT * FROM user WHERE password='$pass' AND username='$user'
        UNION
        SELECT * FROM betauser WHERE password='$pass' AND username='$user'" ); 
		
		$rows = mysqli_fetch_array($query);

        //IF else coding for checking the access level for the user that is logging in
        if(( $rows ['access_level'] == 'admin') AND ($rows['status'] == 'accepted')) {   
			header("Location: /sciru/adminhome.html"); // Redirecting to other page
		}
        else if (($rows ['access_level'] == 'user') AND ($rows['status'] == 'accepted'))
        {    
            header("Location: /sciru/userhome.php");
        }
       		else
        {
			$error = "Username or Password is Invalid";
		}
		mysqli_close($conn); // Closing connection
	}
}

?>