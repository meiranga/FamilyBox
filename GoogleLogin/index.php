<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login With Google</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	
	
    <?php
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
				  

	
	?>

<script type="text/javascript">
var phoneJS ;
phoneJS = "<?php echo $phonePHP['phone']; ?>";
function validDetails(){
if(phoneJS==""){
	
    window.location.href = ("continueRegister.html");	
}
else{
	  <?php
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
				   $result3 = $conn->query("SELECT birthdate FROM parents where email  = '".$x."'");
				   $birthDatePHP =$result3->fetch_assoc();
				   	$_SESSION['phone'] =  $phonePHP['phone'];
	                $_SESSION['birthdate'] =  $birthDatePHP['birthdate'];
				    				   

	
	?>
	var phoness;
phoness = "<?php echo $_SESSION['phone']; ?>";
	var bdatess;
badatess = "<?php echo $_SESSION['birthdate']; ?>";


		window.location.href = ("users.php");	
	
}

}

</script>
	

	
	
	
	
	
</head>
<body onload="validDetails()">
 
<div class="container" style="margin-top: 100px">
	<div class="row">
		<div class="col-md-3">
			<img style="width: 80%;" src="<?php echo $_SESSION['picture'] ?>">
		</div>

		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<td>ID</td>
						<td><?php echo $_SESSION['id'] ?></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $_SESSION['givenName'] ?></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><?php echo $_SESSION['familyName'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $_SESSION['email'] ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $_SESSION['gender'] ?></td>
					</tr>
				
				</tbody>
			</table>
		</div>
	</div>
</div>

<a href="logout.php">Sign out</a>


</body>
</html>