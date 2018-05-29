<?php
session_start();
 require_once "google/config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: google/index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Family Box</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="/css/general.css">

<script type="text/javascript">
function validpass(){
var eemail;
eemail= "<?php echo $_POST['email']; ?>";
ppassword= "<?php echo $_POST['password']; ?>";
 <?php $email =$_POST['email'];?>
  <?php $passwordd =$_POST['password'];?>
  


	if(eemail!=""){
		 
    <?php
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
					
				   $result2 = $conn->query("SELECT password FROM parents where email  = '".$email."'");
				   $passwordPHP =$result2->fetch_assoc();
				   
				   $result2 = $conn->query("SELECT password FROM children where email  = '".$email."'");
				   $passwordChildrenPHP =$result2->fetch_assoc();
				  
			
	
	?>
		var passwordJS ;
passwordJS = "<?php echo $passwordPHP['password'];?>";
passwordChildrenJS = "<?php echo $passwordChildrenPHP['password'];?>";
if(ppassword==passwordJS){
	<?php $_SESSION['email']=$email;?>
	   <?php
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
					  $result3 = $conn->query("SELECT picture FROM parents where email  = '".$email."'");
				   $imagePHP3 =$result3->fetch_assoc();
				
				  $_SESSION['picture']="../../file/images/".$imagePHP3['picture']."";
					?>
	window.location.href = ("includes/parents/home-parent.php");
	
}

else if(ppassword==passwordChildrenJS){
	<?php $_SESSION['email']=$email;?>
	   <?php
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
					  $result2 = $conn->query("SELECT picture FROM children where email  = '".$email."'");
				   $imagePHP =$result2->fetch_assoc();
				
				  $_SESSION['picture']="../../file/images/".$imagePHP['picture']."";
					?>
	window.location.href = ("includes/kids/todo.php");
	
	
}
else{
	alert("The password you entered is invalid");
}
		
		
		
	}

	 
 }
</script>
</head>
  
<body onload="validpass()">
    
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <button class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" onclick="toggleFunction();">
      <i class="fa fa-bars"></i>
    </button>
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
    <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa"></i> ABOUT</a>
    <a href="#team" class="w3-bar-item w3-button w3-hide-small"><i class="fa"></i> THE TEAM</a>
    <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
    <a href="rrregister.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> SIGN UP</a>
    
    <!------------------The login open box of the top nav------------------------------------------------------->
    <button class="w3-bar-item w3-button w3-hide-small" onclick="document.getElementById('login').style.display='block'" style="float:right;">
    <i class="fa fa-sign-in"></i> LOG IN </button>
     <div id="login" class="modal">
       <form id="logform" class="modal-content animate form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
            <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="contain">
	    <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
        <input type="password" id="password" name="password"class="form-control" id="exampleInputPassword2" placeholder="Password" required>
        <button type="submit" class="signbutton"onclick="checkPassword()"> Login </button>
        <center>
        <input type="image" src="img/googlesign.png" class="goog"  onclick="window.location = '<?php echo $loginURL ?>';">
        </center>
        </div>
        <div class="bottom text-center">
		    <p>New Here ? <a class="joinT" href="rrregister.php"><b>Join Us</b></a></p>
	    </div>
        <div class="contain" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
       </form>
    </div>

 </div>

 <!----------- Navbar on small screens ------------>
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
        <div class="col-md-12">
				<form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
					<div class="form-group">
						<input type="email" id="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email Address" required>
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password"class="form-control" id="exampleInputPassword2" placeholder="Password" required>
					</div>
					<div class="form-group">
						<button type="submit" class="signbutton" onclick="checkPassword()">Login</button>
					</div>
				</form>
				<center>
					<input type="image" src="img/googlesign.png" class="goog" value="Google" onclick="window.location = '<?php echo $loginURL ?>';">
				</center>
		</div>
  </div>
  
</div>

<!------------------------- end of the top nav (small and big screens) ------------------------->


<!-- First Parallax Image with Family box Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">FamilyBox</span>
  </div>
</div>

<!-- Container (About family box ) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center rule1">ABOUT FamilyBox</h3>
  <p><b>FamilyBox</b> was created in order to provide a solution for parents in today's technological age.
Children spend most of their time online, usually we have to persuade them to take part in house chores or become "cops" so they can do their homework.
We thought of a creative solution to address this problem, to make home chores an enjoyable experience for children and parents, and to provide parents with virtual quality time with their children.
We are Hoping you will enjoy the experience of <b>FamilyBox</b></p>
  <div class="w3-row rule1">
    <div class="w3-col m6 w3-center w3-padding-large">
      <p><b><i class="w3-margin-right"></i>The kids interface</b></p><br>
      <img src="img/" class="w3-round w3-image w3-opacity w3-hover-opacity-off" alt="Photo of Me" width="500" height="333">
    </div>

    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-hide-small w3-padding-large">
      <p> Welcome to the all-time Digital Scoreboard!
			As a parent we are sure that you have a little trouble getting your kids to do
			their homework or clean their room, or even take the dog for a walk .. It is not easy,
			we understand that.
	  But do not worry, we are here to help you :)
			With a cool and fun interface for kids, a beautiful and simple design for you, 
			your life as a parent are going to be just one big FUN!
			So go ahead, open a family account and take your family one step further.</p>
    </div>
  </div>
    
    
      <div class="w3-row rule1">
    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-hide-small w3-padding-large">
      <p> Welcome to the all-time Digital Scoreboard!
			As a parent we are sure that you have a little trouble getting your kids to do
			their homework or clean their room, or even take the dog for a walk .. It is not easy,
			we understand that.
	  <br>But do not worry, we are here to help you :)<br>
			With a cool and fun interface for kids, a beautiful and simple design for you, 
			your life as a parent are going to be just one big FUN!
			So go ahead, open a family account and take your family one step further.</p>
    </div>
          
          
    <div class="w3-col m6 w3-center w3-padding-large">
      <p><b><i class="w3-margin-right"></i>The Parents interface</b></p><br>
      <img src="img/" class="w3-round w3-image w3-opacity w3-hover-opacity-off" alt="Photo of Me" width="500" height="333">
    </div>  
  </div>

</div>



<!-- how it is work (the 3 steps to start using family box) -->
<div class="w3-row w3-center w3-dark-grey w3-padding-16">
<h2> How To Start  </h2>
  <div class="w3-third w3-section">
    <span class="w3-xlarge">Step 1</span><br>
	Sign Up. Its Free. Then add your family members to your family group.
  </div>
  <div class="w3-third w3-section">
    <span class="w3-xlarge">Step 2</span><br>
	Give tasks to your kids - it can be doing
	their homework all the way to wash the dishes.
  </div>
  <div class="w3-third w3-section">
    <span class="w3-xlarge">Step 3</span><br>
	Your kids will upload a picture to show you their<br> hard work,
	then they will earn points and be able<br>
	to choose a gift from the family Gift-Store.
  </div>
</div >

<!-- Second Parallax Image with "The team" Text -->
<div class="bgimg-2 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
    <span class="w3-xxlarge w3-text-white w3-wide">The Team</span>
  </div>
</div>

  <!--The team and what their experties -->
<div class="w3-content w3-container w3-padding-64" id="team">
  
    <div class="w3-row-padding w3-center">
    <div class="w3-third m3">
	<h3>Adi</h3>
	<img class="howItWork" src="/img/team1.jpeg" style="width:100%"  class="w3-hover-opacity" alt="Adi Maimon">
    <p> A front-end developer of the kids interface 
		and responsible for the general UX/UI</p>
	</div>

    <div class="w3-third m3">
	<h3>Meiran</h3>
	<img class="howItWork" src="/img/team2.jpeg" style="width:100%"  class="w3-hover-opacity" alt="Meiran Galis">
    <p> A front-end developer of the parents interface
	and responsible for meeting project goals and objectives</p>
	</div>

    <div class="w3-third m3">
	<h3>Gilad</h3>
	<img class="howItWork" src="/img/team3.jpeg" style="width:100%"  class="w3-hover-opacity" alt="Gilad Bergman">
    <p> A back-end developer and responsible for 
	the PHP and SQL database</p>
	</div>
  </div>
</div>


<!-- Third Parallax Image with "contact us" Text -->
<div class="bgimg-3 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
     <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
  </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="contact">
  <h3 class="w3-center">We would love your feedback!</h3>
  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
      <!-- Add Google Maps
      <div id="googleMap" class="w3-round-large w3-greyscale" style="width:100%;height:400px;"></div>-->
    </div>
    <div class="w3-col m8 w3-panel">
      <div class="w3-large w3-margin-bottom">
        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i>Tel Aviv Yaffo, Israel<br>
        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: 0502611199<br>
        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: FamilyBox@gmail.com<br>
      </div>
	  
      <form action="/action_page.php" target="_blank">
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
          </div>
        </div>
        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
        <button class="w3-button w3-black w3-right w3-section" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
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


// Get the modal
var modal = document.getElementById('login');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

  </body>
</html>