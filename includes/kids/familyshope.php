<!DOCTYPE html>
<?php session_start();

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
					if($_POST["itemname"] !=""){
						$sql = "SELECT itemname, type, point, picture FROM store where id= '".$_SESSION['id']."' AND status=0 AND itemname='".$_POST["itemname"]."' ";
                        $result = $conn->query($sql);
						$row = $result->fetch_assoc();
						
						$sql4 = "SELECT  firstname, point, totalexpense FROM children where email='".$_SESSION['email']."' ";
                        $result4 = $conn->query($sql4);
						$row4 = $result4->fetch_assoc();
						
						
						if($row4['point']>=$row['point']){
						 
						 $newpoint=$row4['point']-$row['point'];
						 $_SESSION['point']=$newpoint;
						 $newexpense=$row4['totalexpense']+$row['point'];
						 $sql3="UPDATE children  SET point='".$newpoint."' ,totalexpense='".$newexpense."'  where email='".$_SESSION['email']."'";
                          $conn->query($sql3);
				
						 $sql2="UPDATE store  SET status=1 WHERE itemname='".$_POST["itemname"]."' AND id= '".$_SESSION['id']."' ";
                          $conn->query($sql2);
						  
						  $sql5="INSERT INTO giftamount (type, nameofgift, childemail, childname, price, id) VALUES ('".$row['type']."','".$_POST["itemname"]."','".$_SESSION['email']."','".$row4['firstname']."','".$row['point']."','".$_SESSION['id']."');";
						  $conn->query($sql5);
						  
						  $_SESSION['buy']=1;
						  
						header('Location: familyshop.php#shop');
						}
						else{
							 
						 $_SESSION['buy']=2;
						  header('Location: familyshop.php#shop');
							
						}
					}

?>

