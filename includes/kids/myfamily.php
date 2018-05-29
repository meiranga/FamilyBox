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
					
						 $result2 = $conn->query("SELECT point, firstname FROM children where email  = '".$_SESSION['email']."'");
				   $raw =$result2->fetch_assoc();
					$_SESSION['point']=$raw['point'];
					
					foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$_SESSION['email']."'AND status!=2") as $total) {
				   }
				   foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$_SESSION['email']."'AND status=0") as $finish) {
				   }
				   foreach($conn->query("SELECT COUNT(point) FROM children where iid  = '".$_SESSION['id']."'") as $totalPoint) {
				   }
					
					
?>
<html>
<head>
<title>My Family</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/kidspage.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lemon" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<style>
    table {
    border-collapse: collapse;
    width: 100%;
    margin-top:2%;
}

th, td {
    text-align: center;
    padding: 5px;
}
th{
    font-size:26px;
}

td{
    font-size:18px;
}
tr:nth-child(even) {background-color: #f2f2f2;}

@media only screen and (max-device-width: 1024px) {
    table {
    border-collapse: collapse;
    width: 100%;
    margin-top:2%;
}

th, td {
    text-align: center;
    padding: 2px;
}
th{
    font-size:16px;
}

td{
    font-size:12px;
}
} 
</style>
</head>

<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
    </a>

	<div class="menu">
	<button class="button"><a href="todo.php">TO DO<?php echo $row4['point'];?></a></button>
	<button class="button"><a href="familyshop.php">SHOP <?php echo $check[1];?></a></button>
	<button class="button active" ><a href="myfamily.php"> MY FAMILY</a></button>
	<button class="button score"><img class="pig" src="img/pig.png"><?php echo "<p id=\"score\">".$_SESSION['point']."</p>";?></button>
	<button class="button" style="border:dotted #a33c39 2px"><a href="../../google/logout.php"> LOG OUT <a></button>
	<?php echo "<figure class=\"hello\"><img class=\"loginpic\" src=\"".$_SESSION['picture']."\" >";
		  echo "<figcaption class=\"hello_text\"> Hello ".$_SESSION['firstname']."</figcaption></figure>";?>
	
	</div>
  </div>
  
    <!-- Navbar on small screens
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">TO DO</a>
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">My Family</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">Shop</a>
    <a href="#" class="w3-bar-item w3-button">SEARCH</a>
  </div> -->
  
</div>


<!-- First Parallax Image with Logo Text -->
<div class="bgimg-3 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="headline w3-xxlarge w3-wide">
	 My Family</span>
  </div>
</div>


<div class="container">
<?php
	    
			$sql = "SELECT email, firstname, sex, picture, point FROM children where iid= '".$_SESSION['id']."'";
            $result = $conn->query($sql);
			
			$sql1 = "SELECT email, firstname, password, sex, picture, gmail FROM parents where iid= '".$_SESSION['id']."'";
            $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0){
	    $sql5 = "SELECT DISTINCT point FROM children where iid= '".$_SESSION['id']."' ORDER BY point DESC";
            $result5 = $conn->query($sql5);
			$rank;
			$count=1;
			while($row5 = $result5->fetch_assoc()) {
				 if($_SESSION['point']==$row5['point']){
					 $rank=$count;
				 }
				 $count++;
				 
				
			}
  
    /*echo "<div class=\"Mbox\"><center>";
    echo "<h1> you </h1>";
  	echo "<div class=\"f\">";
	echo "<p><img class=\"me circ\" src=\"".$_SESSION['picture']."\" > ";
	echo  $raw['firstname']." ";
	echo " Tasks to do: ".$finish['COUNT(email)']."/".$total['COUNT(email)']." ";
	echo  $_SESSION['point']." <img src=\"img/Coin.png\" width=\"30px\" height=\"30px\"> " ;	
	echo " Rank: ".$rank."/".$totalPoint['COUNT(point)']."</p></div>";
	echo "</center></div> ";*/
	
    echo "<table>";
    echo "<thead><tr>";
    echo "<th> Title </th>";
    echo "<th>Family member</th>";
    echo "<th>Tasks</th>";
    echo "<th>Points <img src=\"img/giphy-2.gif\" width=\"30px\" height=\"30px\"></th>";
    echo "<th>Rank</th></tr></thead>";
    
    echo "<tbody><tr>";
    echo "<td>Me</td>";
    echo "<td><img class=\"me circ\" src=\"".$_SESSION['picture']."\" ></td>";
    echo "<td>".$finish['COUNT(email)']."/".$total['COUNT(email)']."</td>";
    echo "<td>".$_SESSION['point']."<img src=\"img/giphy-2.gif\" width=\"30px\" height=\"30px\"></td>";
    echo "<td>".$rank."/".$totalPoint['COUNT(point)']."</td></tr>";

	
                	/* -------------------------------family section ---------------------*/
	//echo "<div class=\"box\">";
	
	                        /* ---------parents section ------*/
	                        
      /*echo "<div class=\"Pbox\">";
	  while($row1 = $result1->fetch_assoc()) {
		 if($row1['sex']=="male"){
			 if($row1['gmail']==1){
		 echo "<div class=\"p\">";
		 echo "<h2> My Father</h2>";
		 echo "<img class=\"circ parents\" src=\"".$row1['picture']."\" >";
		 echo "<p> ".$row1['firstname']."</p>";
		 echo "</div>";	 
			 }
			 else{
		 echo "<div class=\"p\">";
		 echo "<h2> My Father</h2>";
		 echo "<img class=\"circ parents\" src=\"../../file/images/".$row1['picture']."\" >";
		 echo "<p> ".$row1['firstname']."</p>";
		 echo "</div>";
			 }
		 }
		 else{
			 if($row1['gmail']==1){
		 echo "<div class=\"p\">";
		 echo "<h2> My Mother</h2>";
		 echo "<img class=\"circ parents\" src=\"".$row1['picture']."\" >";
		 echo "<p>".$row1['firstname']."</p>";
		 echo "</div>";
				 
			 }
			 else{
	     echo "<div class=\"p\">";
		 echo "<h2> My Mother</h2>";
		 echo "<img class=\"circ parents\" src=\"../../file/images/".$row1['picture']."\" >";
		 echo "<p>".$row1['firstname']."</p>";
		 echo "</div>";
			 }	 
		 }
		 
     }*/
     //echo "</div>";

  }
  
  echo "<div class=\"clear\"></div>";

    //echo "<div class=\"Bbox\">";
	 if($result->num_rows > 0 ){
     while($row = $result->fetch_assoc()) {
		           foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$row['email']."'AND status!=2") as $total) {
				            }
				   foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$row['email']."'AND status=0") as $finish){
				            }
				            
	     if($_SESSION['email']!=$row['email']){
			$sql5 = "SELECT DISTINCT point FROM children where iid= '".$_SESSION['id']."' ORDER BY point DESC";
		    $result5 = $conn->query($sql5);
			$rank;
			$count=1;
			while($row5 = $result5->fetch_assoc()) {
				 if($row['point']==$row5['point']){
					 $rank=$count;
				 }
				 $count++;
				 
				
			}
			if($row['sex']=="male"){
		 /*echo "<div class=\"f\">";
		 echo "<h2> My Brother</h2>";
		 echo "<img class=\"circ male\" src=\"../../file/images/".$row['picture']."\" >";
		 echo "<p> ".$row['firstname']."</p>";
		 echo "<p>Tasks to do: ".$finish['COUNT(email)']."/".$total['COUNT(email)']."</p>";
		 echo "<p> ".$row['point']." <img src=\"img/Coin.png\" width=\"30px\" height=\"30px\"></p>";
		 echo "<p> Rank: ".$rank."/".$totalPoint['COUNT(point)']."</p></div>";*/
		 
		 echo "<tr>";
         echo "<td>My brother</td>";
         echo "<td><img class=\"circ male\" src=\"../../file/images/".$row['picture']."\" ></td>";
         echo "<td>".$finish['COUNT(email)']."/".$total['COUNT(email)']."</td>";
         echo "<td>".$row['point']." <img src=\"img/giphy-2.gif\" width=\"30px\" height=\"30px\"></td>";
         echo "<td>".$rank."/".$totalPoint['COUNT(point)']."</td></tr>";


		    }
		    else{
	     /*echo "<div class=\"f\">";
		 echo "<h2> My Sister</h2>";
		 echo "<img class=\"circ female\" src=\"../../file/images/".$row['picture']."\" >";
		 echo "<p> ".$row['firstname']."</p>";
		 echo "<p>Tasks to do: ".$finish['COUNT(email)']."/".$total['COUNT(email)']."</p>";
		 echo "<p> ".$row['point']." <img src=\"img/Coin.png\" width=\"30px\" height=\"30px\"></p>";
		 echo "<p> Rank: ".$rank."/".$totalPoint['COUNT(point)']."</p></div>";*/
		 
		 echo "<tr>";
         echo "<td>My Sister</td>";
         echo "<td><img class=\"circ female\" src=\"../../file/images/".$row['picture']."\" ></td>";
         echo "<td>".$finish['COUNT(email)']."/".$total['COUNT(email)']."</td>";
         echo "<td>".$row['point']." <img src=\"img/giphy-2.gif\" width=\"30px\" height=\"30px\"></td>";
         echo "<td>".$rank."/".$totalPoint['COUNT(point)']."</td></tr>";
		         }
		 }
		 
     } 
     

 }
    //echo "</div></div>";
    echo "</tbody></table></div>";
?>

</div>

<script>
window.onscroll = function() {myFunction()};

function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}
</script> 
</body>
</html>