<?php
	require_once "config.php";
		session_start();


	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
	
		$email=$_SESSION["email"];
	$sex=$_SESSION["gender"];
	$picture=$_SESSION["picture"];
	$lastname=$_SESSION["familyName"];
	$firstname=$_SESSION["givenName"];
	
				  

	
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

	   $x=$_SESSION['email'];
				   $result2 = $conn->query("SELECT phone FROM parents where email  = '".$x."'");
				   $phonePHP =$result2->fetch_assoc();
				   
				   	if($phonePHP['phone']==""){

$sql = "SELECT email, firstname, lastname, password, phone, birthdate, sex, picture FROM parents";
$result = $conn->query($sql);


   

	
	$sql2="INSERT INTO parents (email, firstname, lastname, password, phone, birthdate, sex, picture) VALUES ('".$email."','".$firstname."','".$lastname."','".$password."','".$phone."','".$birthdate."','".$sex."','".$picture."');";
$sql3="INSERT INTO parents(email, firstname, lastname, password, phone, birthdate, sex, picture) VALUES ('gilad@gmail.com', 'gilad', 'bergmann','123456', '0506667777', '2018-03-07', 'male');";
$conn->query($sql2);
$conn->query($sql3);
$result = $conn->query($sql);

$conn->close();
	}	
	

	header('Location: index.php');
	exit();
?>