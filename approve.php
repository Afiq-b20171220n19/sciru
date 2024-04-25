
<?php
$mysqli = new mysqli('localhost', 'root', 'r00t', 'room');

$id=$_GET["id"];
$result =$mysqli->query("UPDATE user SET status ='accepted' WHERE id=$id");
header("Location: /sciru/approval.php");
?>

