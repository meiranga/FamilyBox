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
	$_SESSION['picture'] =$image;
	$_SESSION['familyName'] =$lastname;
	$_SESSION['givenName'] =$firstname;
	$_SESSION['phone'] =$phone;
	$_SESSION['birthdate'] =$birthdate;
	$_SESSION['iid']=$row['COUNT(iid)'];


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
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="268684866233-7ek1kntlgpcr6kr5frao02v6ui7joo93.apps.googleusercontent.com">
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<html lang="en">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	 <link href="css/custom.css" rel="stylesheet">
    <title>FamilyBox</title>
  </head>
<body>

<br><br><br>
<nav class="navbar navbar-default navbar-fixed-top" id="navmain">
  <div class="container-fluid">
    <div class="navbar-header navbar-left">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"> FamilyBox </a>
    </div>
   
    <div class="collapse navbar-collapse" id="bs-example">
      <ul class="nav navbar-nav navbar-left">
          <li><a href="rregister.php">Sign Up</a></li>
          <li><a href="#">How its works</a></li>
          <li><a href="#">The team</a></li>         
          <li><a href="#">Contact Us</a></li>
           
          
        <li class="dropdown">
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
         
        <li><p class="navbar-text">Already have an account?</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Login via
								<div class="social-buttons">
									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
								<input type="button" onclick="window.location = '<?php echo $loginURL ?>';"class="btn btn-gl" class="fa fa-google" value="Google" >
								</div>
                                or
								 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> keep me logged-in
											 </label>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="rregister.php"><b>Join Us</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      </ul>
       
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div>
<div class="container" >
		<?php echo $_POST["name"]; ?>
		<?php echo $_POST["familyName"]; ?>
		<?php echo $_POST["email"]; ?>
		<?php echo $_POST["Bdate"]; ?>
		<?php echo $_POST["password"]; ?>
		<?php echo $_POST["password2"]; ?>
		<?php echo $_POST["phone"]; ?>
		<?php echo $_POST["gender"]; ?>	
		<?php  echo "<img src='file/images/".$imagePHP['picture']."' height=100 width=100>";?>
		 <?php echo $row['COUNT(iid)']; ?>	
		 
	
		
	<a href="index.php" onclick="signOut();">Sign out</a>



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
        </script>






</body>
</html>