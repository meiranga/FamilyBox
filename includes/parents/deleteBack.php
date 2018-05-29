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

if($_POST["deleteUser"]!=""){
	 $sql3="DELETE FROM parents WHERE email= '".$_POST["deleteUser"]."'"; 
	  $conn->query($sql3);
	   $sql4="DELETE FROM children WHERE email= '".$_POST["deleteUser"]."'"; 
	  $conn->query($sql4);
	    $_SESSION['check']=5;
		 
     header('Location: home-parent.php');		
	
}
if($_POST["deleteItem"]!=""){
	 $sql3="DELETE FROM store WHERE itemname= '".$_POST["deleteItem"]."' AND id= '".$_SESSION['iid']."' "; 
	  $conn->query($sql3);
	   
	    $_SESSION['check']=4;
		 
     header('Location: store-parent.php');		
	
}





?>