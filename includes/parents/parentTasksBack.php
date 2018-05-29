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
		
         $_SESSION['check']=2;
		$email=$_SESSION['emailChild'];
		$id=$_SESSION['iid'];
		$taskName=$_POST["taskName"];
		$point=$_POST["point"];
		$type=$_POST["taskType"];
		
	    $sql2="INSERT INTO tasks (email, name, type, point, iid, picture) VALUES ('".$email."','".$taskName."','".$type."','".$point."','".$id."','".$image."');";
    $conn->query($sql2);
	$conn->close();
	header('Location: parentTasks.php');
		
		?>
		
		