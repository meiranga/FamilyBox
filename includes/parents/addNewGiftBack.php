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
		
		
		
         $_SESSION['check']=3;
		$id=$_SESSION['iid'];
		$itemName=$_POST["itemName"];
		$price=$_POST["price"];
		$itemType=$_POST["itemType"];
		$status=0;
		
	    $sql2="INSERT INTO store (itemname, type, point, id, picture, status) VALUES ('".$itemName."','".$itemType."','".$price."','".$id."','".$image."','".$status."');";
    $conn->query($sql2);
}
else if($_POST["deleteTask"]!=""){
	 $sql3="DELETE FROM store WHERE itemName= '".$_POST["deleteTask"]."'"; 
	  $conn->query($sql3);
	    $_SESSION['check']=4;
	
	
}
	$conn->close();
	header('Location: store-parent.php');
		
		?>