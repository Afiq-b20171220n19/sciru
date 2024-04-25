<?php
$mysqli = new mysqli('localhost', 'root', 'r00t', 'login');

$id=$_GET["id"];
$result =$mysqli->query("UPDATE user SET status ='rejected' WHERE id=$id");
$result=$mysqli->query("DELETE  FROM user WHERE status='rejected'");

header("Location: /sciru/approval.php");
?>

