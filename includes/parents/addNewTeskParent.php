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
 if($_POST["emailChild"] !=""){
 $emailChild=$_POST["emailChild"];
$result2 = $conn->query("SELECT firstname, lastname, picture, point, iid FROM children where email  = '".$emailChild."'");
				   $row =$result2->fetch_assoc();
				  
	$childPicture="../../file/images/".$row['picture']."";
	$_SESSION['childPicture']= $childPicture;
	$_SESSION['emailChild']= $emailChild;
	$_SESSION['iid']= $row['iid'];
	$_SESSION['childName']= $row["firstname"];
	$_SESSION['childPoint']= $row["point"];
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
    <!-- Dropzone.js -->
    <link href="../../css/dropzone.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
  </head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="home-parent.php" class="site_title"><i class="fa fa-cube"></i> <span class="main_titleFont">FamilyBox</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo $_SESSION['picture']?>" alt="Profile picture" class="img-circle profile_img">
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
                                <li><a href="home-parent.php"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a><i class="fa fa-shopping-basket"></i> Family Store <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="store-parent.php">View Items</a></li>
                                        <li><a href="addNewGift.php">Add New Item</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-users"></i> Family Members <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="addFamilyMember.php">Add Family Member</a></li>
                                        <li><a href="removeUser.php">Remove User</a></li>
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
                         <li class="breadcrumb-item"><a href="childProfile.php"><?php echo $_SESSION['childName'];?> Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new task</li>
                        </ol>
                        </nav>
                            
                        </div>


                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small>add new tesk</small></h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="addMember" data-parsley-validate class="form-horizontal form-label-left" action="addNewTaskParentBack.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-activity">Type of activity:</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="taskType" class="form-control" name="taskType" required>
                            <option value="" selected disabled hidden="">Choose here</option>
                            <option value="studies">Studies</option>
                            <option value="home">Home</option>
                            <option value="family">Family</option>
                            <option value="other">Other</option>
                          </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">What to do: <span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="taskName" id="_newTask" required="required" class="form-control col-md-7 col-xs-12" placeholder="Clean your room">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Points for task: <span class="required">*</span>
                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number"  name="point" required="required" class="form-control col-md-7 col-xs-12" placeholder="100">
                                            </div>
                                        </div>



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
                                        
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success" form="addMember" >Submit</button>
                        </div>
                    </div>

                                    </form>
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
                    All Rights Reserved to <a href="#">FamilyBox</a>

                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../addons/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../addons//bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../addons//fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../addons//nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../../addons/jquery.smartWizard.js"></script>
    <!-- Dropzone.js -->
    <script src="../../addons/dropzone.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../addons//custom.min.js"></script>
</body>

</html>
