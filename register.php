<!DOCTYPE html>
<?php
session_start();
 require_once "google/config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: google/index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>
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
if (isset($_FILES['attachments'])) {
     
		$image = $_FILES['attachments']['name'][0];
		$target = "file/images/".basename($image);
			move_uploaded_file($_FILES['attachments']['name'][0], $target); 
			  $targetFile = "file/images/" . basename($_FILES['attachments']['name'][0]);
        $msg = "";
      if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
            $msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => $targetFile);
		}



$sql = "SELECT email, firstname, lastname, password, phone, birthdate, sex, picture FROM parents";
$result = $conn->query($sql);
foreach($conn->query('SELECT COUNT(iid) FROM parents') as $row) {
				   }



$email=$_POST["email"];
$firstname=$_POST["name"];
$lastname=$_POST["familyName"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$birthdate=$_POST["Bdate"];
$sex=$_POST["gender"];
$id=$row['COUNT(iid)'];

	$_SESSION['email'] =$email;
	$_SESSION['gender'] =$sex;
	
	$_SESSION['familyName'] =$lastname;
	$_SESSION['givenName'] =$firstname;
	$_SESSION['phone'] =$phone;
	$_SESSION['birthdate'] =$birthdate;
	$_SESSION['iid']=$row['COUNT(iid)'];
	$_SESSION['picture']="../../file/images/".$image."";


$sql2="INSERT INTO parents (email, firstname, lastname, password, phone, birthdate, sex, picture,iid) VALUES ('".$email."','".$firstname."','".$lastname."','".$password."','".$phone."','".$birthdate."','".$sex."','".$image."','".$id."');";
$sql3="INSERT INTO parents(email, firstname, lastname, password, phone, birthdate, sex, picture) VALUES ('gilad@gmail.com', 'gilad', 'bergmann','123456', '0506667777', '2018-03-07', 'male');";
$conn->query($sql2);
$conn->query($sql3);
$result = $conn->query($sql);

 $result2 = $conn->query("SELECT picture FROM parents where email  = '".$email."'");
				   $imagePHP =$result2->fetch_assoc();
$conn->close();
?>  


<head>	
    <html lang="en">
    <meta charset="utf-8">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="268684866233-7ek1kntlgpcr6kr5frao02v6ui7joo93.apps.googleusercontent.com">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="css/style.css">-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link rel="stylesheet" href="css/general.css">
	<link href="css/custom.css" rel="stylesheet">
    <title>FamilyBox</title>
    <style>
        .showDT{
            margin:30px;
            padding:5%;
            float:right;

        }
        .welcomepic{
            background-image:url('/img/fam.png');
            background-repeat:no-repeat;
            min-height: 100%;
            margin-top:2%;
        }
        p{
            color:#FFC55A;
            font-size:24px;
            margin-top:5%;
        }

    </style>
  </head>
  
<body>
<!-- Navbar (sit on top) -->
<div class="welcomepic">
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <button class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" onclick="toggleFunction();">
      <i class="fa fa-bars"></i>
    </button>
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
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
		    <p>New Here ? <a class="joinT" href="rregister.php"><b>Join Us</b></a></p>
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
    

<!--- the ditails of the new member after signed in --->

<div class="showDT" >
		<?php 
		echo "<center><h1><img src='file/images/".$imagePHP['picture']."' height=100 width=100 style=\"border-radius:50%\"></h1>";
		echo "<h1> Hello ".$_POST["name"]." ";
		echo $_POST["familyName"]."!</h1>";
		echo "<p>Welcome to <b>Family Box</b><img src=\"/img/giphy.gif\" width=\"100px\" height=\"100px\"> <br> 
		        congratulations on joining our family<br>
		        we are hoping you will enjoy !</p></center>";
		?>
		 <br><br>
	    <center><a href="index.php" onclick="signOut();" style="border:solid grey 2px"><h3> Back Home </h3></a></center>
		 <center><a href="includes/parents/home-parent.php"  style="border:solid grey 2px"><h3> Continue </h3></a></center>

		
		
		<!--<?php echo $_POST["familyName"]; ?>
		<?php echo $_POST["email"]; ?>
		<?php echo $_POST["Bdate"]; ?>
		<?php echo $_POST["password"]; ?>
		<?php echo $_POST["password2"]; ?>
		<?php echo $_POST["phone"]; ?>
		<?php echo $_POST["gender"]; ?>	
		<?php  echo "<img src='file/images/".$imagePHP['picture']."' height=100 width=100 >";?>
		 <?php echo $row['COUNT(iid)']; ?>-->
		 
</div>

</div>


<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="js/jquery.fileupload.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
               var files = $("#files");

               $("#fileupload").fileupload({
                   url: 'index.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 1000000)
                       $("#error").html('Your file is too big! Max allowed size is: 500KB');
                   else {
                       $("#error").html("");
                       data.submit();
                   }
               }).on('fileuploaddone', function(e, data) {
                    var status = data.jqXHR.responseJSON.status;
                    var msg = data.jqXHR.responseJSON.msg;

                    if (status == 1) {
                        var path = data.jqXHR.responseJSON.path;
                        $("#files").fadeIn().append('<p><img style="width: 100px; height: 100px;" src="'+path+'" /></p>');
                    } else
                        $("#error").html(msg);
               }).on('fileuploadprogressall', function(e,data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#progress").html("Completed: " + progress + "%");
               });
            });
            
            
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