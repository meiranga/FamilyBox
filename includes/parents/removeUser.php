<?php session_start();

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
 

 ?>
<!DOCTYPE html>
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
    <!-- Dropzone.js -->
    <link href="../../css/dropzone.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
	
	<script  type="text/javascript">
	function removeUser(){
		var check ;

check = parseInt("<?php echo $_SESSION['check']; ?>");

if(check==4)
{
	<?php $_SESSION['check']=0; ?>
alert("your user removed successfully");

}
	}
	</script>
  </head>

  <body class="nav-md" onload="removeUser()">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home-parent.php" class="site_title"><i class="fa fa-cube"></i> <span>FamilyBox</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $_SESSION['picture']?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['firstname'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu ">
                
                <li><a href="home-parent.php"><i class="fa fa-home"></i> Home </a></li>

                  <li><a><i class="fa fa-shopping-basket"></i> Family Store <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="store-parent.php">View Items</a></li>
                      <li><a href="addNewGift.php">Add New Item</a></li>
                      
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-users"></i> Family Members <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="current-page"><a href="addFamilyMember.php">Add Family Member</a></li>
                      <li class="active"><a href="removeUser.php">Remove User</a></li>
                    </ul>
                  </li>
                  <li><a href="report.php"><i class="fa fa-bar-chart-o"></i> Report </a>  
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
                    <img src="<?php echo $_SESSION['picture']?>" alt=""><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['familyName'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="../../google/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                
                  
                   <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home-parent.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Remove User</li>
                        </ol>
                        </nav>
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                                 <div class="x_content">

                    <p>Your childs are growing fast<small> remove their User </small></p>

                    <div class="table-responsive">
                                       <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Permission</th>
                          <th>Remove</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  
					  $sql = "SELECT email, firstname  FROM parents where email!= '".$_SESSION['email']."' AND iid='".$_SESSION['iid']."' ";
                      $result = $conn->query($sql);
	     				$sql1 = "SELECT email, firstname  FROM children where  iid='".$_SESSION['iid']."' ";
                                    $result1 = $conn->query($sql1);
									
                                  

                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                         // output data of each row
                                         while($row = $result->fetch_assoc()) {
											 


                                             echo "<tr> <th scope=\"row\">".$counter."</th>";
                                             echo "<td>".$row['firstname']."</td>";
                                             echo "<td>parent</td>";
                                             echo "<td><div class=\"btn-group\">";
											 echo"<form  method=\"post\" action=\"deleteBack.php\" ><button type=\"submit\" class=\"btn btn-danger btn-sm\">Remove</button>";
											 echo " <input style=\"visibility: hidden; display:inline;\"   name=\"deleteUser\" value=\"".$row['email']."\" type=\"text\"></form>";
											 echo "</div></td></tr>";
											 

                                            $counter++;   
                                         } 
                                    }
                                    else{
                                        $noParent=true;
                                    }
									if ($result1->num_rows > 0) {
                                        
                                         // output data of each row
                                         while($row1 = $result1->fetch_assoc()) {
											 


                                             echo "<tr> <th scope=\"row\">".$counter."</th>";
                                             echo "<td>".$row1['firstname']."</td>";
                                             echo "<td>child</td>";
                                             echo "<td><div class=\"btn-group\">";
											 echo"<form  method=\"post\" action=\"deleteBack.php\" ><button type=\"submit\" class=\"btn btn-danger btn-sm\">Remove</button>";
											 echo " <input style=\"visibility: hidden; display:inline;\"   name=\"deleteUser\" value=\"".$row1['email']."\" type=\"text\"></form>";
											 echo "</div></td></tr>";
											 

                                            $counter++;   
                                         } 
                                    }
                                    else{
                                        $noChildren=true;
                                    }
									if($noParent==true && $noChildren==true)
									{
										echo"there are no body to remove";
									}
                                  ?>
                        

                      </tbody>
                    </table>

                  </div>
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
           <span class="fa fa-copyright" aria-hidden="true"></span> All Rights Reserved to <a href="#">FamilyBox</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../addons/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../addons/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../addons/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../addons/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../../addons/jquery.smartWizard.js"></script>
    <!-- Dropzone.js -->
    <script src="../../addons/dropzone.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../addons/custom.min.js"></script>

	
  </body>
</html>