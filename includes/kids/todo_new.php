<!DOCTYPE html>
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
					 $result2 = $conn->query("SELECT point FROM children where email  = '".$_SESSION['email']."'");
				   $pointPHP =$result2->fetch_assoc();
					$_SESSION['point']=$pointPHP['point'];
					
					 $result2 = $conn->query("SELECT iid FROM children where email  = '".$_SESSION['email']."'");
				   $idPHP =$result2->fetch_assoc();
					$_SESSION['id']=$idPHP['iid'];
					
					 $result2 = $conn->query("SELECT firstname FROM children where email  = '".$_SESSION['email']."'");
				   $namePHP =$result2->fetch_assoc();
					$_SESSION['firstname']=$namePHP['firstname'];
				
					
					?>
<html>
<head>
<title>To Do</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/kidspage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lemon" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />
<script>
function checkTask(){

 var check = parseInt("<?php echo $_SESSION['task'];?>");


if(check==1){
alert("Thank you, you sent your task to check successful!");
<?php $_SESSION['task']=0; ?>

}

}
</script>

</head>

<body onload="checkTask()">
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <!--<a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
    </a>-->
	<div class="menu">
	<button class="button active"><a href="todo.php"> TO DO </a></button>
	<button class="button" ><a href="familyshop.php"> SHOP </a></button>
	<button class="button" ><a href="myfamily.php">MY FAMILY</a></button>
	<button class="button score"><img class="pig" src="img/pig.png"><?php echo "<p id=\"score\">".$_SESSION['point']."</p>";?></button>
	<button class="button" style="border:dotted #ff0040 3px"><a href="../../google/logout.php" > LOG OUT <a></button>
	
	<?php echo "<figure class=\"hello\"><img class=\"loginpic\" src=\"".$_SESSION['picture']."\" >";
		    echo "<figcaption class=\"hello_text\"> Hello ".$_SESSION['firstname']."</figcaption></figure>";?>
	</div>
  </div>

  <!-- Navbar on small screens
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
  </div>-->

</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-2 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="headline w3-xxlarge w3-wide">TO DO</span>
  </div>
</div>

<!-- the tasks part -->
<main>
	
       		<?php
			$sql = "SELECT name, type, point, picture FROM tasks where email= '".$_SESSION['email']."' AND status=0 ";
            $result = $conn->query($sql);


if ($result->num_rows > 0) {
     $count=1;
     // output data of each row
     while($row = $result->fetch_assoc()) {
	     
		 echo " <div class=\"task\">";
		 echo "<h2> Task ".$count."</h2>";
		 echo "<p class=\"taskName\"><span>".$row['type']."</span></p>";
		 //echo "<p class=\"taskName\">task name: <span>".$row['name']."</span> </p>";
		 echo "<p class=\"points\" style=\"font-size:30px\"> ".$row['point']." <img src=\"img/Coin.png\" style=\"width:30px; height:30px\"></p>";
		 echo "<button class=\"go start\" onclick=\"document.getElementById('".$count."').style.display='block'\"> Start </button>";
		 echo "<form  method=\"post\" action=\"taskskid.php\" >";
		 echo "<button class=\"go finish\"> Finish? </button>";
		 echo "<input style=\"visibility: hidden;\"  name=\"taskname\" value=\"".$row['name']."\" type=\"text\">";
		 echo"</form></div>";
		 
		 //-------------------- the modal box ---------------------------------------------------------------------------
		echo "<div id=\"".$count."\" class=\"w3-modal\">";
        echo "<div class=\"w3-modal-content w3-card-4 w3-animate-zoom\" style=\"width:40%\">";
        echo "<header class=\"w3-container w3-green\">"; 
        echo "<span onclick=\"document.getElementById('".$count."').style.display='none'\" class=\"w3-button w3-green w3-xlarge w3-display-topright\">&times;</span>";
        echo "<h2> What To Do? </h2>";
        echo "<div class=\"w3-bar w3-border-bottom\">";
       // echo "<button class=\"tablink w3-bar-item w3-button\" onclick=openChore(event,gg)> W</button></div>";
        echo "<div id=\"What To Do\" class=\"w3-container chore\">";
        echo "<p class=\"taskName\">Your Chore Is To: <span>".$row['name']."</span> </p>";
        echo "</div>"; 
        echo "<div id=\"points\" class=\"w3-container chore\">";
        echo "<h1 class=\"points\" style=\"font-size:30px\"> ".$row['point']." <img src=\"img/Coin.png\" style=\"width:30px; height:30px\"></h1>";
        echo "</div>"; 
        echo "<img id=\"task_pic\" src=\"../../file/images/" .$row['picture']."\">";

        echo "<button id=\"close\" class=\"button w3-right w3-border\" onclick=\"document.getElementById('".$count."').style.display='none'\"> Close </button>";
        echo "</div></div></div></div>";
		 //-------------------------------- the modal box ---------------------------------------------------------
		 $count++;
     } 
    
}
else{
	echo"<p> You Don't Have Any Tasks Yey </p>";
}
      ?>
      

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


document.getElementsByClassName("tablink")[0].click();

function openChore(evt, choreName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("Chore");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(choreName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}


</script>
</body>
</html>