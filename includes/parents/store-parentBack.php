<?php
session_start();
$servername = "localhost:3306";
$username = "meiranga_gilad";
$password = "gilad123";
$dbname = "meiranga_mishtamshim";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql3="UPDATE giftamount  SET status=1  WHERE   id= '".$_SESSION['iid']."' AND nameofgift='".$_POST["gift"]."' ";
        $conn->query($sql3);
		
		  $_SESSION['check']=1;
	    header('Location: store-parent.php');	
?>