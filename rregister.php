<!DOCTYPE html>
<?php
 require_once "google/config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: google/index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>

<head>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="268684866233-7ek1kntlgpcr6kr5frao02v6ui7joo93.apps.googleusercontent.com">
	
	<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
	
	<html lang="en">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/general.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="css/dropzone.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">


	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <title>FamilyBox - sign up</title>

	<style type="text/css">
			#dropZone{
				border: 3px dashed #0088cc;
				padding: 50px;
				width:100%;
				margin-top: 20px;
			}

			#files{
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 200px;
				display: none;
			}

            #error{
                color: red;
            }
        </style>
    
</head>
<body>
<div class="registerBack">
<!-- Navbar (sit on top) -->
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
<!-------------------------------------------end of top navbar (small and larg screens)---------------------->

        <div id="logbox" >
            <form id="signup" method="post" action="register.php" enctype="multipart/form-data" >
                <center><h1>Join Family Box</h1>				 
				<p><input name="name" id="name" type="text" placeholder=" Name" required="required" class="input pass"></P>
				<p><input name="familyName" id="familyName" type="text" placeholder=" Last Name" required="required"></P>
				<p><input name="Bdate" id="Bdate" type="date" placeholder=" dd/mm/yyyy "required="required" ></P>
				<p><input name="email" id="email" type="email" placeholder="Email Address"></P>
                <p><input name="password" id="pass1" type="password" placeholder="Choose A Password" required="required"></P>
                <p><input name="password2" id="pass2" type="password" placeholder="Confirm Your Password" required="required" ></P>
				<p><input name="phone" id="phone" type="tel" placeholder="Phone Number" required="required" ></P>
				
				<fieldset class="fileR"><legend class="legendR"> Gender </legend>
				<p><input name="gender" id="male" type="radio" value="male" title="male" /> Male
				<input name="gender" id="female" type="radio" value="female" title="female"/> Female </p>
				</fieldset>
				
				
              
				
				<!-----------  <fieldset class="fileR"> <legend class="legendR">Add your picture</legend>
				 <div id="dropZone" class="col-md-6 col-sm-6 col-xs-12">
		
			<input type="file" id="fileupload" name="attachments[]" multiple class="dropzone" required="required" >
	               </div>
					</fieldset>
					<h1 id="error"></h1><br><br>
					<h1 id="progress"></h1><br><br>
					<div id="files"></div>------------>
	           
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        Add picture:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">   
                          <input id="fileupload" class="date-picker form-control dropzone col-col-md-7 col-xs-12"  type="file" name="attachments[]">        
                    <br />
                    <br />
                        </div>
                    </div>
			       
			        
				<input id="signMeUpB" type="submit" value="Sign me up!" class="inputButton"  onclick="passvalid()" name="upload" ></center>
            </form>
        </div>
</div>
<script>
  function passvalid(){
  var pass1=document.getElementById("pass1").value;
  var pass2=document.getElementById("pass2").value;
  var flag=true;

 if(pass1!=pass2){
 flag=false;
 
 }

  if(flag==false){
    document.getElementById("name").value="";
	document.getElementById("familyName").value="";
    document.getElementById("Bdate").value="";
	document.getElementById("email").value="";
	document.getElementById("pass1").value="";
    document.getElementById("pass2").value="";
	document.getElementById("phone").value="";
	document.getElementById("male").value="";
    document.getElementById("female").value="";

    alert("your password is not the same please try again!");
	window.location.href = ("rregister.php")
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
                   url: 'register.php',
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