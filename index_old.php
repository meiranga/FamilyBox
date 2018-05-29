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
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FamilyBox - פמליבוקס</title>
  
    <link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
					  $result2 = $conn->query("SELECT picture FROM parents where email  = '".$email."'");
				   $imagePHP =$result2->fetch_assoc();
				
				  $_SESSION['picture']="../../file/images/".$imagePHP['picture']."";
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
	alert("your password or email are invalid");
}
		
		
		
	}

	 
 }

	
	
	</script>
      
            

  </head>
    
  <body onload="validpass()">
    
      
      <!--------NAV---------->
      
      <nav class=" navbar-default navbar-fixed-top navmain" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header navbar-left "> 
      <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#respManu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"> FamilyBox </a>
    </div>

   
    <div class="collapse navbar-collapse" id="respManu">
      <ul class="nav navbar-nav navbar-left">
          <li><a href="rregister.php">Sign Up</a></li>
          <li><a href="#">How it's works</a></li>
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
									<a href="index.php" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<input type="button" onclick="window.location = '<?php echo $loginURL ?>';"class="btn btn-gl" class="fa fa-google" value="Google" >
									
								</div>
                                or
								 <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only"  for="exampleInputPassword2">Password</label>
											 <input type="password" id="password" name="password"class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block" onclick="checkPassword()">Sign in</button>
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
      
      
      
      <!--------HEADER-------      
      <header class="bottomSpacing">
         <div class="jumbotron">
          <div class="container text-center fontTitle">
                      <h1>FamilyBox</h1>
                      <p>הורים נותנים מטלות והילדים מקבלים מתנות</p>
                  </div>
                </div>
            <div class="container text-center">
                <p><a class="btn btn-primary btn-lg btn-success  buttonHeader" href="form.html" role="button-success">!הירשם עכשיו</a></p></div>
      </header>
      -->
      
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <h1 id="titleFB">FamilyBox</h1>
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        
    </ol>
    
          
         
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/family1.jpg" alt="Image">
        <div class="carousel-caption d-none d-md-block">
          <h3>Family</h3>
          <p>Mom and Dad</p>
        </div>      
      </div>

      <div class="item">
        <img src="img/family3.jpg" alt="Image">
        <div class="carousel-caption d-none d-md-block">
          <h3>Kids</h3>
          <p>Joy</p>
        </div>      
      </div>
    
          
          <div class="item">
        <img src="img/familybox2.jpg" alt="Image">
        <div class="carousel-caption d-none d-md-block">
          <h3>Kids</h3>
          <p>Love</p>
        </div>      
      </div>
      
      <div class="item">
        <img src="img/kids1.jpg" alt="Image">
        <div class="carousel-caption d-none d-md-block">
          <h3>Technolegy</h3>
          <p>Nowadays Reality</p>
        </div>      
      </div>
         
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
      
      <!-------------MAIN---------------------------------------->
      
     
    <main>
       <div class="container">

         <div class="clear row">
             <div class="bottomSpacing"></div>
           
        <div class="col-sm-12 col-md-4" id="explenation">
        <h2>Step 1</h2>
        <p>Sign Up. It's Free. Then add your family members to your family group.</p>
         </div>
           
             
             
        <div class="col-sm-12 col-md-4" id="explenation">
        <h2>Step 2</h2>
        <p>Give tasks to your kids - it can be doing their homework all the way to wash the dishes.</p>
         </div>
             
                 
                 
          <div class="col-sm-12 col-md-4" id="explenation">
        <h2>Step 3</h2>
        <p>Your kids will upload a picture to show you their hard work, then they will earn points and be able to choose a gift from the family Gift-Store.</p>
         </div>
     
           
        <div class="clear bottomSpacing"></div>    
           
    <div class="row ex">
  <div class="col-sm-6 col-md-3">
  <div class="box bottomSpacing">
    <h3>Homework</h3>
     <img src="img/books-cartoon.png" class="cartoon" alt=""> 
    </div>
  </div>    
             
  <div class="col-sm-6 col-md-3">
  <div class="box bottomSpacing">
      <h3>Tech-World</h3>
     <img src="img/mobile-cartoon.png" class="cartoon" alt="">
      </div>
  </div> 
             
  <div class="col-sm-6 col-md-3">
  <div class="box bottomSpacing">
      <h3>Orginized</h3>
     <img src="img/to-do-list-cartoon.png" class="cartoon" alt="">
      </div>
  </div> 
        
        
  <div class="col-sm-6 col-md-3">
  <div class="box bottomSpacing">
      <h3>Connecting Family</h3>
     <img src="img/hipster-family-cartoon.jpg" class="cartoon" alt="">
      </div>
  </div> 
 
</div><br>

   
</div> 
        </div>
    </main>     
      
      
      
    <aside >
      
        
   
      
      
    </aside>


  </body>
</html>