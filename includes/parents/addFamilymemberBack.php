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
if (isset($_FILES['attachments'])) {
     
		$image = $_FILES['attachments']['name'][0];
		$target = "../../file/images/".basename($image);
			move_uploaded_file($_FILES['attachments']['name'][0], $target); 
			  $targetFile = "../../file/images/" . basename($_FILES['attachments']['name'][0]);
        $msg = "";
      if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
            $msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => $targetFile);
		}
		
		
$email=$_POST["email"];
$firstname=$_POST["first-name"];
$lastname=$_POST["last-name"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$birthdate=$_POST["birthDate"];
$sex=$_POST["gender"];
$point=0;
$_SESSION['check']=1;
$permession=$_POST["userPermession"];
if($permession=="child"){
$result2 = $conn->query("SELECT iid FROM parents where email  = '".$_SESSION['email']."'");
				   $idPHP =$result2->fetch_assoc();
$sql2="INSERT INTO children (email, firstname, lastname, password, phone, birthdate, sex, picture,iid, point) VALUES ('".$email."','".$firstname."','".$lastname."','".$password."','".$phone."','".$birthdate."','".$sex."','".$image."','".$idPHP['iid']."','".$point."');";
$conn->query($sql2);
}
else if($permession=="parent"){
	$result2 = $conn->query("SELECT iid FROM parents where email  = '".$_SESSION['email']."'");
				   $idPHP =$result2->fetch_assoc();
$sql2="INSERT INTO parents (email, firstname, lastname, password, phone, birthdate, sex, picture,iid) VALUES ('".$email."','".$firstname."','".$lastname."','".$password."','".$phone."','".$birthdate."','".$sex."','".$image."','".$idPHP['iid']."');";
$conn->query($sql2);
}
$conn->close();
header('Location: home-parent.php');
		exit();


?>