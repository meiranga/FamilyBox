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
		
	
		$sql2="INSERT INTO report (email, id, taskname, type, comment, rangee, image) VALUES ('".$_SESSION['email']."','".$_SESSION['id']."','".$_SESSION['taskname']."','".$_SESSION['typetask']."','".$_POST["comment"]."','".$_POST["range"]."','".$image."');";
        $conn->query($sql2);
		
		$sql3="UPDATE tasks  SET status=1, childpic='".$image."' WHERE email='".$_SESSION['email']."' AND name= '".$_SESSION['taskname']."'  AND type= '".$_SESSION['typetask']."' AND iid= '".$_SESSION['id']."' ";
        $conn->query($sql3);
		
		$_SESSION['task']=1;
		
		header('Location: todo.php');
						  

?>