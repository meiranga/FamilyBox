<!DOCTYPE html>
<html>
<head>
<title>To Do</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/kidspage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<h1 id="score"><img class="pig"src="../img/pig.png" width="60"><br>600</h1>
	<button class="button active"><a href="todo.php"> TO DO </a></button>
	<button class="button" ><a href="familyshope.php"> SHOP </a></button>
	<button class="button" ><a href="myfamily.php">MY FAMILY</a></button>
	<button class="button" ><a href="totalpoints.php"> MY POINTS <a></button>
	
	<!--
	<img class="button active" src="../img/td.png">
	<img class="button" src="../img/fam.png">
	<img class="button" src="../img/shop.png">
	<img class="button" src="../img/shop2.png">-->
	
	</div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-2 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="headline w3-xxlarge w3-wide">TO DO</span>
  </div>
</div>

<!-- the tasks part -->
<main>
	<div class="task">
	<h2> task 1</h2>
	<p class="taskName"> do your english homework</p>
	<p class="points" style="font-size:30px"> 150 <img src="../img/coin.png" style="width:30px; height:30px" ></p>
	<button class="b confirm"> DONE </button>
	<button class="b decline"> LATER </button>
	</div>
	
	<div class="task">
	<h2> task 2</h2>
	<p class="taskName"> clean your room</p>
	<p class="points" style="font-size:30px"> 120 <img src="../img/coin.png" style="width:30px; height:30px" ></p>
	<button class="b confirm"> DONE </button>
	<button class="b decline"> LATER </button>
	</div>
	
	<div class="task">
	<h2> task 3</h2>
	<p class="taskName"> fold the londry</p>
	<p class="points" style="font-size:30px"> 100 <img src="../img/coin.png" style="width:30px; height:30px" ></p>
	<button class="b confirm"> DONE </button>
	<button class="b decline"> LATER </button>
	</div>
	
	<div class="task">
	<h2> task 4</h2>
	<p class="taskName"> help your sister with her homework</p>
	<p class="points" style="font-size:30px"> 200 <img src="../img/coin.png" style="width:30px; height:30px" ></p>
	<button class="b confirm"> DONE </button>
	<button class="b decline"> LATER </button>
	</div>
</main>

<footer>
<br><br><br>
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


</script>
</body>
</html>