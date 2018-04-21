<?php session_start(); ?>
<!DOCTYPE html>

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
					   $email=$_SESSION['email'];
				   $result2 = $conn->query("SELECT firstname FROM parents where email  = '".$email."'");
				   $firstNamePHP =$result2->fetch_assoc();
				  

	
	?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FamilyBox</title>
      
      
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Miltonian" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lemon" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lemon" />
    <link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../../css/parentsCSS.css" rel="stylesheet">

            

  </head>
    
  <body>
      
      <!-------------MAIN------------------->
    
      <aside>
    <h1 id="logo">FamilyBox</h1>
    <h2 id="greeting">Welcome back <?php echo $_SESSION['email'];?>!</h2>
     <div class="row">
    <div class="col-12">   
    <img src="https://pbs.twimg.com/profile_images/938554387609239552/5QHzQMog_400x400.jpg" class="img-circle center-block picParent"></div></div> <br>
     

        
       <div class="list-group center-block">
  <a href="#" class="list-group-item ">HOME </a> 
        <a href="#" class="list-group-item active">My familiy</a>
       <a href="addFamilyMember.html" class="list-group-item">Add Family Member</a>
     <a href="#" class="list-group-item">Family store</a>
        <a href="#" class="list-group-item">Report</a>
       <a href="#" class="list-group-item">Setting</a>
       <a href="#" class="list-group-item">Logout</a>
        
           
    </div>  
          
    </aside>
      
    <!-----Main----->
    <main>

        
    <div class="box">

        <hr>
    <h2>The <span id="fname">Galis</span> familia</h2>
            
        <div class="childs">
            <ul>
          
                
     <li><div class="thumbnail">
      <a href="parentTasks.html"><img src="../img/child.jpg" alt="..."></a>
      <div class="caption">
        <h3>Ilay </h3>
         </div>
    </div></li>

            
            </ul>
       </div>
        </div>  
      
    </main>
      
     


  </body>
</html>