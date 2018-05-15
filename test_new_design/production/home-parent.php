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
    <script  type="text/javascript">
	function addMember(){
		var check ;

    check = parseInt("<?php echo $_SESSION['check']; ?>");

    if(check==1)
    {
    <?php $_SESSION['check']=0; ?>
    alert("your member added successfully");
    }	
	}
	
	</script> 
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-cube"></i> <span class="main_titleFont">FamilyBox</span></a>
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
                      <li><a href="#">View Items</a></li>
                      <li><a href="#">Add New Item</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Family Members <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Add Family Member</a></li>
                      <li><a href="t#">Delete Family Member</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Report 1</a></li>
                      <li><a href="#">Report 2</a></li>
                      
                    </ul>
                  </li>
                  
                </ul>
              </div>
   
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
-->
                  
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
                <h3>The Galis Family</h3>
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
                      
                        
                        
                    <!--new node - CHILD -->
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Child</i></h4>
                            <div class="left col-xs-7">
                              <h2>Jhonny</h2>
                              <p> 10th grade, love football and games </p>
                          
                            </div>
                            <div class="right col-xs-5 text-center">
                                <!--Child Photo-->
                              <img src="images/child.jpg" alt="" class="img-thumbnail img-responsive">
                                <!--End child photo-->
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">

                            </div>
                            <div class="col-xs-12 col-sm-12 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                        <!--END of CHILD node -->
                        
                           <!--new node - CHILD -->
                      
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Child</i></h4>
                            <div class="left col-xs-7">
                              <h2>Jhonny</h2>
                              
                          
                            </div>
                            <div class="right col-xs-5 text-center">
                                <!--Child Photo-->
                              <img src="images/child.jpg" alt="" class="img-thumbnail img-responsive">
                                <!--End child photo-->
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">

                            </div>
                            <div class="col-xs-12 col-sm-12 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                        <!--END of CHILD node -->
                        
                    <?php
                    $sql = "SELECT email, firstname, picture, point FROM children where iid= '".$idPHP['iid']."' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                          
                           $changes=1;
                         // output data of each row
                         while($row = $result->fetch_assoc()) {

                             echo " <form  method=\"post\" action=\"childProfile.php\" ><div class=\"well profile_view\">";
                             echo "<div class=\"col-sm-12\">";
                             echo "<h4 class=\"brief\"><i>Child</i></h4>" ;   
                             echo "<div class=\"left col-xs-7\"><h2>".$row['firstname']."</h2></div>";
                             echo "<div class=\"right col-xs-5 text-center\">";
                             echo "<img src=\"../../file/images/".$row['picture']."\" alt="" class=\"img-thumbnail img-responsive\"></div></div>";
                             echo "<div class=\"col-xs-12 bottom text-center\">
                            <div class=\"col-xs-12 col-sm-6 emphasis\"></div>";  echo "<div class=\"col-xs-12 col-sm-12 emphasis\">";   
                             echo "<button type=\"submit\" class=\"btn btn-primary btn-xs\" onclick=\"deletee(this)\" value=\"".$changes."\">
                            <i class=\"fa fa-user\"> </i> View Profile";
                             echo "<input style=\"visibility: hidden;\" id =\"".$changes."\" name=\"emailChild\" value=\"".$row['email']."\" type=\"text\">";       
                             echo "</button></div></div></div></div></form>";   
                              $changes++; 
                         }                             
    
}
      ?>    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                           <!--new node - CHILD -->
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Child</i></h4>
                            <div class="left col-xs-7">
                              <h2>Jhonny</h2>
                              <p> 10th grade, love football and games </p>
                          
                            </div>
                            <div class="right col-xs-5 text-center">
                                <!--Child Photo-->
                              <img src="images/child.jpg" alt="" class="img-thumbnail img-responsive">
                                <!--End child photo-->
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">

                            </div>
                            <div class="col-xs-12 col-sm-12 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                        <!--END of CHILD node -->
                      

                        
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
          <div class="pull-right">
            All Rights Reserved to <a href="https://colorlib.com">FamilyBox</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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