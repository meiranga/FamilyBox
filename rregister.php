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
    <div class="col-md-6" >
        <div id="logbox"  >
            <form id="signup" method="post" action="register.php" enctype="multipart/form-data" >
                <h1>Create an Account</h1>				 
				<input name="name" id="name" type="text" placeholder="Name" required="required" class="input pass"/>
				<input name="familyName" id="familyName" type="text" placeholder="Last Name" required="required" class="input pass"/>
				<input name="Bdate" id="Bdate" type="date" placeholder="dd/mm/yyyy"required="required" class="input pass"/>
				<input name="email" id="email" type="email" placeholder="Email address" class="input pass"/>
                <input name="password" id="pass1" type="password" placeholder="Choose a password" required="required" class="input pass"/>
                <input name="password2" id="pass2" type="password" placeholder="Confirm password" required="required" class="input pass"/>
				<input name="phone" id="phone" type="tel" placeholder="phone number" required="required" class="input pass"/>
				<fieldset> <legend>sex?</legend>
				<input name="gender" id="male" type="radio" value="male" title="male" />Male
				<input name="gender" id="female" type="radio" value="female" title="female"/>Female 
				</fieldset>
					<input type="hidden" name="size" value="1000000">
  	                <input type="file" name="image">
				<input type="submit" value="Sign me up!" class="inputButton"  onclick="passvalid()"name="upload" />
			
			
				
				

            </form>
        </div>
    </div>
	

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
	window.location.href = ("register.html")
  }

  }

   
</script>







</body>
</html>