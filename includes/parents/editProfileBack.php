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

$result2 = $conn->query("SELECT gmail FROM parents where email  = '".$_SESSION['email']."'");
				   $row =$result2->fetch_assoc();

if($image==""){

	$sql3="UPDATE parents  SET firstname='".$_POST["first-name"]."',lastname='".$_POST["last-name"]."',password='".$_POST["password"]."',phone='".$_POST["phone"]."' WHERE email='".$_SESSION['email']."'  ";
        $conn->query($sql3);
	
	
	
}
else{
	if($row['gmail']==1){
		$gmail=0;
		$sql3="UPDATE parents  SET firstname='".$_POST["first-name"]."',lastname='".$_POST["last-name"]."',password='".$_POST["password"]."',phone='".$_POST["phone"]."' ,picture='".$image."' ,gmail='".$gmail."' WHERE email='".$_SESSION['email']."'  ";
        $conn->query($sql3);
		
	}
	else{
	$sql3="UPDATE parents  SET firstname='".$_POST["first-name"]."',lastname='".$_POST["last-name"]."',password='".$_POST["password"]."',phone='".$_POST["phone"]."' ,picture='".$image."' WHERE email='".$_SESSION['email']."'  ";
        $conn->query($sql3);
	}
	 $_SESSION['picture']="../../file/images/".$image."";
}
$_SESSION['firstname']=$_POST["first-name"];
$_SESSION['familyName']=$_POST["last-name"];
$_SESSION['check']=1;
	header('Location: editProfile.php');		
	?>