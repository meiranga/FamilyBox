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
				   $_SESSION['firstname']=$firstNamePHP['firstname'];
				  
				
				  
				    $result2 = $conn->query("SELECT lastname FROM parents where email  = '".$email."'");
				   $lastNamePHP =$result2->fetch_assoc();
				   
				   	$result2 = $conn->query("SELECT iid FROM parents where email  = '".$_SESSION['email']."'");
				   $idPHP =$result2->fetch_assoc();
				    $_SESSION['iid']=$idPHP['iid'];
					
					 $result3 = $conn->query("SELECT gmail,picture FROM parents where email  = '".$email."'");
				   $roww =$result3->fetch_assoc();
				   
				   if($roww['gmail']==0){
					   
					   $_SESSION['picture']="../../file/images/".$roww['picture']."";
				   }
                   
				   
	
	?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FamilyBox</title>
      
    <!--Font-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />

    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../css/nprogress.css" rel="stylesheet">
       <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
    <script  type="text/javascript">
	function start(){
		addMember();
		updateChildProfile();
		removeUser();
	}
	function removeUser(){
		var check ;

check = parseInt("<?php echo $_SESSION['check']; ?>");

if(check==5)
{
	<?php $_SESSION['check']=0; ?>
    $('.modal-title').html("Alright!");
    $('.modal-body').html("The user removed successfully!");
    $('#myModal').modal("show");

}
	}
	function updateChildProfile(){
		var check ;

    check = parseInt("<?php echo $_SESSION['check']; ?>");
	if(check==3 || check ==4){
		window.location.href = ("childProfile.php");
	}
	
	}
	
	
	function addMember(){
		var check ;

    check = parseInt("<?php echo $_SESSION['check']; ?>");

    if(check==1)
    {
    <?php $_SESSION['check']=0; ?>
        $('.modal-title').html("Awesome!");
    $('.modal-body').html("Your family added successfully");
    $('#myModal').modal("show");
    }	
	}
	
	</script> 
   
  </head>

  <body class="nav-md" onload="start()">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home-parent.php" class="site_title"><i class="fa fa-cube"></i><img src="../../img/FamilyboxInvert.png" class="logo"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $_SESSION['picture']?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $firstNamePHP['firstname'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu ">
                  <li class="current-page"><a><i class="fa fa-home"></i> Home </a>
                 
                  </li>
                  <li><a><i class="fa fa-shopping-basket"></i> Family Store <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="store-parent.php">View Items</a></li>
                      <li><a href="addNewGift.php">Add New Item</a></li>
                      
                    </ul>
                  </li>
                  <li><a href="addFamilyMember.php"><i class="fa fa-users"></i>Add My Family</a>
                    
                  </li>
                  <li><a href="report.php"><i class="fa fa-bar-chart-o"></i> Report </a>
                    
                  </li>
                  
                </ul>
              </div>
   
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="home-parent.php" data-toggle="tooltip" data-placement="top" title="Home">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              </a>
              <a href="editProfile.php" data-toggle="tooltip" data-placement="top" title="Profile">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a href="help.php" data-toggle="tooltip" data-placement="top" title="Help">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../../google/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $_SESSION['picture']?>" alt=""><?php echo $firstNamePHP['firstname'];?> <?php echo $lastNamePHP['lastname'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="editProfile.php"> Profile</a></li>
                    
                    <li><a href="help.php">Help</a></li>
                    <li><a href="../../google/logout.php" ><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


                  
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>The <?php echo $lastNamePHP['lastname'];?> Family</h3>
              </div>

          
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                       
                      </div>

                      <div class="clearfix"></div>
                      
                
              
                    <?php
                    $sql = "SELECT email, firstname, picture, point FROM children where iid= '".$idPHP['iid']."' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                          
                           $changes=1;
                         // output data of each row
                         while($row = $result->fetch_assoc()) {
							  foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$row['email']."'AND status!=2") as $total) {
				   }
				   foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$row['email']."'AND status=1") as $finish) {
				   }

                             echo "<div class=\"col-lg-4 col-md-4 col-sm-4 col-xs-12 profile_details\">";
                             echo "<div class=\"well profile_view\">";
                             echo "<div class=\"col-sm-12\">";
                             echo "<h4 class=\"brief\"><i>".$row['firstname']."</i></h4>" ;   
                             echo "<div class=\"left col-xs-7\"><p>Points: ".$row['point']."</p><p>Tasks to approval: ".$finish['COUNT(email)']."/".$total['COUNT(email)']."</p>
                                    </div>";
                             
                             echo "<div class=\"right col-xs-5 text-center\">";
                             echo " <img src=\"../../file/images/".$row['picture']."\" class=\"img-thumbnail img-responsive\"></div></div> ";
                             echo "<div class=\"col-xs-12 bottom text-center\">
                            <div class=\"col-xs-12 col-sm-6 emphasis\"></div>";  
                             echo "<div class=\"col-xs-12 col-sm-12 emphasis\">";   echo  " <form  method=\"post\" action=\"childProfile.php\" >"; 
                              echo "<input style=\"visibility: hidden;\" id =\"".$changes."\" name=\"emailChild\" value=\"".$row['email']."\" type=\"text\">";  
                             echo "<button type=\"submit\" class=\"btn btn-primary btn-xs\" onclick=\"deletee(this)\" value=\"".$changes."\"><i class=\"fa fa-user\"> </i>   View Profile";   
                             echo "</button></form></div></div></div></div>";   
                              $changes++; 
                         }                             
    
}
      ?>    

        <div class="text-center">
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="glyphicon glyphicon-ok"></i>
                            </div>				
                            <h4 class="modal-title"></h4>	
                        </div>
                        <div class="modal-body text-center">
                            <p class="text-center "></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>                
                     

                        
                      <!--  
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Digital Strategist</i></h4>
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong> Web Designer / UI. </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: </li>
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                        -->
                        
                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
         <div class="text-center">
           <span class="fa fa-copyright" aria-hidden="true"></span> All Rights Reserved to <a href="#">FamilyBox, 2018.</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    
     </div>  
     <script>
	  function deletee(element){
	var x=element.value;
	 var count=<?php echo $changes?>;
	for(var i=1;i<count;i++){
	   if(x==i){	 
	 var emailChild = document.getElementById(i).value;  
	  document.getElementById(count-1).value= emailChild;	
		window.location.href = ("childProfile.php");	
	   }	
	}
	  }
         
         
         
	 </script>
      
      <script type="text/javascript">
    window.onclick= maxWindow;

    function maxWindow() {
        window.moveTo(0, 0);


        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }

</script>
      
      
      
    <!-- jQuery -->
    <script src="../../addons/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../addons/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../addons/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../addons/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../addons/custom.min.js"></script>
     
  </body>
</html>