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
					

?>
<html>
<head>
<title>Family Shop</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/kidspage.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lemon" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />

<script>
function checkbuy(){

 var check = parseInt("<?php echo $_SESSION['buy'];?>");


if(check==1){
alert("Thank you, your purchase was successful!");
<?php $_SESSION['buy']=0; ?>

}
else if(check==2){
	
	alert("sorry you donot have enough money to purchase that");
	<?php $_SESSION['buy']=0; ?>
}
}
</script>

</head>

<body onload="checkbuy()">
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
    </a>
    
	<div class="menu">
	<button class="button"><a href="todo.php"> TO DO </a></button>
	<button class="button active" ><a href="familyshop.php"> SHOP </a></button>
	<button class="button" ><a href="myfamily.php">MY FAMILY</a></button>
	<button class="button score"><img class="pig" src="img/pig.png"><?php echo "<p id=\"score\">".$_SESSION['point']."</p>";?></button>
	<button class="button" style="border:dotted #a33c39 2px"><a href="../../google/logout.php" > LOG OUT <a></button>
	
	<?php echo "<figure class=\"hello\"><img class=\"loginpic\" src=\"".$_SESSION['picture']."\">";
			echo "<figcaption class=\"hello_text\"> Hello ".$_SESSION['firstname']."</figcaption></figure>";?>

	</div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="todo.php" class="w3-bar-item w3-button" onclick="toggleFunction()">TO DO</a>
    <a href="familyshop.php" class="w3-bar-item w3-button" onclick="toggleFunction()"> SHOP</a>
    <a href="myfamily.php" class="w3-bar-item w3-button" onclick="toggleFunction()">MY FAMILY</a>
    <a href="../../google/logout.php" class="w3-bar-item w3-button" onclick="toggleFunction()"> LOG OUT </a>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="headline w3-xxlarge w3-wide">Family Shop</span>
  </div>
</div>
	

<main>
<h1 id="shop" style="color:black; font-family:Merienda One; text-align:center;"> Go a head and spend some points </h1>
	
	<?php
			$sql = "SELECT itemname, type, point, picture FROM store where id= '".$_SESSION['id']."' AND status=0 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     $count=1;
     // output data of each row
     while($row = $result->fetch_assoc()) {
	     
		 echo " <div class=\"gift\">";
		 echo "<img class=\"giftLogo\" src=\"../../file/images/".$row['picture']."\">";
		 echo "<p id =\"".$count."\">".$row['itemname']."</p>";
		 echo "<p class=\"points\" style=\"font-size:30px\"> ".$row['point']." <img src=\"img/Coin.png\" style=\"width:30px; height:30px\" ></p>";
		 echo "<form  method=\"post\" action=\"familyshope.php\" >";
		 echo "<button class=\"buy\" onclick=\"buy(this)\" value=\"".$count."\" > Buy </button>";
		 echo "<input style=\"visibility: hidden;\" id =\"".$count."\" name=\"itemname\" value=\"".$row['itemname']."\" type=\"text\">";
		 echo "</form></div>";
		 ;
		 $count++;
    
     } 
    
}
else{
	echo"<p>You didn't have any gift  yet..</p>";
}
      ?>    
	

	
	
</main>


<div class="clear"></div>
<!-- Footer -->
<footer>
  <center><button class="lastButton"><a href="#home"> To the top </a></button></center>
</footer>
 
<script>

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

//function buy(element){
	
	//var count=element.value;
	//var giftName = document.getElementById(count).innerHTML;
	//alert(giftName);
	//<?php 
	//$giftName=giftname;
	
	
	
	//?>
	//alert(<?php echo $giftName;?>);
	
//}
</script>
</body>
</html>

