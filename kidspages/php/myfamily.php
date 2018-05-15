<!DOCTYPE html>
<html>
<head>
<title>My Family</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/kidspage.css">
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
	<button class="button"><a href="todo.php">TO DO</a></button>
	<button class="button"><a href="familyshope.php">SHOP </a></button>
	<button class="button active" ><a href="myfamily.php"> MY FAMILY</a></button>
	<button class="button" ><a href="totalpoints.php"> MY POINTS </a></button>
	
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
	<img class="heart" src="../img/heart.png" width="100px"> my family<img class="heart" src="../img/heart.png" width="100px"></span>
  </div>
</div>

<div class="wrapper">	
  <div class="Mbox">
  <center>
  <h1> Me</h1>
  	<div class="f">
	<img class="m circ me" src="../img/me.png">
	<p> Tasks:4/5</p>
	<p> 600 <img src="../img/coin.png" width="30px" height="30px"></div>
	
	<!-- the trophy goes for the member with the highest sum of points-->
	<p><img id="trophy" src="../img/trophy.png" width="120px" height="120px"></p>
	</div >
	</center>

	<center>
	<div class="box">
	<h1> My Family </h1>
		<!--each one of the divs are one family member -->
		<div class="f">
	<img class="m circ fam" src="../img/nir.png" >
	<p> My Brother</p>
	<p> Tasks: 5/8</p>
	<p> 580 <img src="../img/coin.png" width="30px" height="30px"></p></div>
		
		<div class="f">
	<img class="m circ fam" src="../img/lian.png">
	<p>my sister</p>
	<p> Tasks: 2/3</p>
	<p> 400 <img src="../img/coin.png" width="30px" height="30px"></p></div>

		<div class="f">
	<img class="m circ fam" src="../img/maor.png">
	<p>my brother</p>
	<p> Tasks: 2/3</p>
	<p> 400 <img src="../img/coin.png" width="30px" height="30px"></p></div>
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