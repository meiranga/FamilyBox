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
					
					$sql = "SELECT type, point, picture FROM tasks where email= '".$_SESSION['email']."' AND name='".$_POST["taskname"]."'";
                    $result = $conn->query($sql);
				    $row = $result->fetch_assoc();
					$pic['picture']="../../file/images/".$row['picture']."";
					$_SESSION['taskname']=$_POST["taskname"];
					$_SESSION['typetask']=$row['type'];
					
	?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/kidspage.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lemon" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />
<title>Task</title>
<style type="text/css">
			#dropZone {
				border: 3px dashed black;
				margin-bottom:-25%;
				padding:5%;
				width: 80%;
				float:none;
				height:5%;
			}

			#files {
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 200px;
				display: none;
			}

            #error {
                color: red;
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
	<button class="button"><a href="todo.php">BACK</a></button>
	<button class="button score"><img class="pig" src="img/pig.png"><?php echo "<p id=\"score\">".$_SESSION['point']."</p>";?></button>
	<button class="button" style="border:dotted #a33c39 2px"><a href="../../google/logout.php" > LOG OUT <a></button>
	
	<?php echo "<figure id=\"helloTK\" class=\"hello\"><img class=\"loginpic\" src=\"".$_SESSION['picture']."\" >";
		  echo "<figcaption class=\"hello_text\"> Hello ".$_SESSION['firstname']."</figcaption></figure>";?>
	</div>
  </div>

</div>

<div class="bgimg-4 w3-display-container">	
<main>
    <center>
	<form class="task_form" method="post" action="taskskidBack.php" enctype="multipart/form-data">
	<center><fieldset id="task_fieldset"><legend id="task_legend"> Upload your good job! </legend>
	<p>How much did you enjoy the task ?</p>
	<label>
    <input type="radio" name="range" value="1" />
  	<img src="img/baaad.png" width="10%" >
    </label>
    
    <label>
    <input type="radio" name="range" value="2" />
	<img src="img/bad.png" width="10%">
    </label>
    
    <label>
    <input type="radio" name="range" value="3" />
	<img src="img/evg.png" width="10%">
    </label>
    
    <label>
    <input type="radio" name="range" value="4" />
	<img src="img/good.png" width="10%">
    </label>
    
    <label>
    <input type="radio" name="range" value="5" />
	<img src="img/great.png" width="10%">
    </label>
    
	<p>Something else to say ? <textarea name="comment" col="20" rows="1" placeholder="your comment" 
	style="border-radius:10%;"></textarea></p>
	<h3> Add a snapshot of your complete task below</h3>
	 <div id="dropZone">
		<h1>Drag & Drop Files...</h1>
			<input type="file" id="fileupload" name="attachments[]" multiple>
	 </div>
		<h1 id="error"></h1><br><br>
		<h1 id="progress"></h1><br><br>
		<div id="files"></div>
	        <input id="send_B" type="submit" value="Send" name="upload">

	</fieldset>
	</center>
	</form>
</center>
</main>
</div>
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
<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="nis/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="nis/js/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="nis/js/jquery.fileupload.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
               var files = $("#files");

               $("#fileupload").fileupload({
                   url: 'taskskidback.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 6000000)
                       $("#error").html('Your file is too big! Max allowed size is: 6 MEGA');
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
        </script>


</body>
</html>