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
if($_POST["approveTask"]!=""){
	 $sql = "SELECT name, type, point,childpic FROM tasks where email= '".$_SESSION['emailChild']."' AND name='".$_POST["approveTask"]."'  AND status=1  ";
                  $result = $conn->query($sql);
	              $row = $result->fetch_assoc();
	$sql3="UPDATE tasks  SET status=2  WHERE email='".$_SESSION['emailChild']."' AND name= '".$_POST["approveTask"]."'  AND iid= '".$_SESSION['iid']."' ";
        $conn->query($sql3);
		
		 $newpoint=$_SESSION['childPoint']+$row['point'];
		$sql2="UPDATE children  SET point='".$newpoint."'  WHERE email='".$_SESSION['emailChild']."'";
        $conn->query($sql2);
      
	    $_SESSION['check']=4;
		 
     header('Location: childProfile.php');		
	
}
if($_POST["deleteTask"]!=""){
	
	 $sql3="DELETE FROM tasks WHERE name= '".$_POST["deleteTask"]."' AND email='".$_SESSION['emailChild']."' "; 
	  $conn->query($sql3);
	   $_SESSION['check']=3;
	    header('Location: childProfile.php');	


}

?>