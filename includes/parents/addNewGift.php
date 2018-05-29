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
    <!-- iCheck -->
    <link href="../../css/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../css/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../css/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../css/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../css/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home-parent.php.php" class="site_title"><i class="fa fa-cube"></i> <span>FamilyBox</span></a>
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
                  <li><a href="home-parent.php"><i class="fa fa-home"></i> Home </a>
                 
                  </li>
                  <li><a><i class="fa fa-shopping-basket"></i> Family Store <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="store-parent.php">View Items</a></li>
                      <li class="current-page"><a href="addNewGift.php">Add New Item</a></li>
                      
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
                    <img src="<?php echo $_SESSION['picture']?>" alt=""><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['familyName'];?>
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
                
                   <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home-parent.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add new gift</li>
                    </ol>
                    </nav>
                  
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Gift Form<small> Motivate your kids!</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  

                    
                    <!-- Form -->
                                    
                    
                    <div class="x_content">
                    <br />
                    <form id="addMember" method="post" data-parsley-validate class="form-horizontal form-label-left" action="addNewGiftBack.php" enctype="multipart/form-data">

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gift-type">Type: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="itemType" class="form-control col-md-7 col-xs-12">
            <option value="" selected disabled hidden requierd>Choose here</option>
            <option value="trip">Trip</option>
            <option value="friends">Friends</option>
            <option value="gift">Gift</option>
            <option value="movie">Movie</option>
            <option value="game">Game</option>
            <option value="sprot">Sport</option>
            <option value="music">Music</option>
            <option value="food">Food</option>
            <option value="other">Other</option>    
                </select>
                            </div></div>  
                        
                        
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="itemName" id="_newItem" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Points <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="gift-price" name="price" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                                          
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Add picture<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fileupload" name="attachments[]" class="date-picker form-control dropzone col-md-7 col-xs-12" required="required" type="file" multiple>
                        </div>
                      </div>
                        
                       
                        
                        
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  
                      
                     
                    
                    <!-- End SmartWizard Content -->
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