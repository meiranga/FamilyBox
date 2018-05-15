<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/kidspage.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lemon" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />
<title>Points</title>
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
	<button class="button" ><a href="myfamily.php"> MY FAMILY</a></button>
	<button class="button active" ><a href="totalpoints.php"> MY POINTS </a></button>
	
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

<div class="bgimg-4 w3-display-container">	
<main>
	<form>
		<fieldset >
			<legend> hello kid </legend>
			<img class="bigpig" src="../img/pig.png">
			<p> Tasks : <input type="hidden">10</p>
			<p> Completed tasks : <input type="hidden">4</p>
			<p> Total score : <input type="hidden">600</p>
			<p> Rank : <input type="hidden">1/4</p>
		</fieldset> 
	</form>
</main>
</div>

</body>
</html>