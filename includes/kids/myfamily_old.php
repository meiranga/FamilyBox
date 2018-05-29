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
					
					foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$_SESSION['email']."'") as $total) {
				   }
				   foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$_SESSION['email']."'AND status=1") as $finish) {
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
	<button class="button" ><a href="../../google/logout.php"> logout <a></button>
	
	</div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">TO DO</a>
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">My Family</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">Shop</a>
    <a href="#" class="w3-bar-item w3-button">SEARCH</a>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-3 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="headline w3-xxlarge w3-wide">
	<img class="heart" src="img/heart.png" width="100px"> my family<img class="heart" src="img/heart.png" width="100px"></span>
  </div>
</div>

<div class="wrapper">	
  
	<center>
	<div class="box">
	<h1> My Family </h1>
	<?php
			$sql = "SELECT email, firstname, sex, picture, point FROM children where iid= '".$_SESSION['id']."'";
            $result = $conn->query($sql);
			
			$sql1 = "SELECT email, firstname, password, sex, picture FROM parents where iid= '".$_SESSION['id']."'";
            $result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
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
	    
		  echo " <div class=\"f\">";
		  echo "<h2> Me</h2>";
		  echo "<img class=\"m circ fam\" src=\"".$_SESSION['picture']."\" >";
		  echo "<p> Name: ".$raw['firstname']."</p>";
		 echo "<p> Tasks: ".$finish['COUNT(email)']."/".$total['COUNT(email)']."</p>";
		 echo "<p> ".$_SESSION['point']."<img src=\"img/Coin.png\" width=\"30px\" height=\"30px\"></p>";	
         echo "<p> Rank: ".$rank."/".$totalPoint['COUNT(point)']."</p></div>";
		
     
	  while($row1 = $result1->fetch_assoc()) {
	     
		 if($row1['sex']=="male"){
			 if($row1['password']=="gilad123"){
		 echo " <div class=\"f\">";
		  echo "<h2> My Father</h2>";
		 echo "<img class=\"m circ fam\" src=\"".$row1['picture']."\" >";
		 echo "<p> Name: ".$row1['firstname']."</p>";
		 echo "</div>";	 
			 }
			 else{
		 echo " <div class=\"f\">";
		 echo "<h2> My Father</h2>";
		 echo "<img class=\"m circ fam\" src=\"../../file/images/".$row1['picture']."\" >";
		 echo "<p> Name: ".$row1['firstname']."</p>";
		 echo "</div>";
			 }
		 }
		 else{
			 if($row1['password']=="gilad123"){
		 echo " <div class=\"f\">";
		 echo "<h2> My Mother</h2>";
		 echo "<img class=\"m circ fam\" src=\"".$row1['picture']."\" >";
		 echo "<p> Name: ".$row1['firstname']."</p>";
		 echo "</div>";
				 
			 }
			 else{
	     echo " <div class=\"f\">";
		 echo "<h2> My Mother</h2>";
		 echo "<img class=\"m circ fam\" src=\"../../file/images/".$row1['picture']."\" >";
		 echo "<p> Name: ".$row1['firstname']."</p>";
		 echo "</div>";
			 }	 
		 }
		 
     } 
}
	 if($result->num_rows > 0 ){
     while($row = $result->fetch_assoc()) {
		           foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$row['email']."'") as $total) {
				   }
				   foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$row['email']."'AND status=1") as $finish) {
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
		 echo " <div class=\"f\">";
		 echo "<h2> My Brother</h2>";
		 echo "<img class=\"m circ fam\" src=\"../../file/images/".$row['picture']."\" >";
		 echo "<p> Name: ".$row['firstname']."</p>";
		 echo "<p>Tasks: ".$finish['COUNT(email)']."/".$total['COUNT(email)']."</p>";
		 echo "<p> ".$row['point']." <img src=\"img/Coin.png\" width=\"30px\" height=\"30px\"></p>";
		 echo "<p> Rank: ".$rank."/".$totalPoint['COUNT(point)']."</p></div>";
		 }
		 else{
	     echo " <div class=\"f\">";
		 echo "<h2> My Sister</h2>";
		 echo "<img class=\"m circ fam\" src=\"../../file/images/".$row['picture']."\" >";
		 echo "<p> Name: ".$row['firstname']."</p>";
		 echo "<p>Tasks: ".$finish['COUNT(email)']."/".$total['COUNT(email)']."</p>";
		 echo "<p> ".$row['point']." <img src=\"img/Coin.png\" width=\"30px\" height=\"30px\"></p>";
		 echo "<p> Rank: ".$rank."/".$totalPoint['COUNT(point)']."</p></div>";
			 
		 }
		
		 }
     } 
    
}

					
					

      ?>    
	  </div>
	  </center>
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