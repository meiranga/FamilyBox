<?php session_start(); ?>
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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-cube"></i> <span>FamilyBox</span></a>
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
                      <li class="current-page"><a href="#">Add Family Member</a></li>
                      <li class="active"><a href="#">Remove User</a></li>
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
                        <li class="breadcrumb-item active" aria-current="page">Remove user</li>
                        </ol>
                        </nav>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
     
                
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Removal</h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>your child become a teenager and stop using the app? <small> put him on deactivate mode</small></p>

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
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Child</td>
                          <td>
                            <div class="btn-group">
                                    <button type="button" class="btn btn-danger btn-sm">Remove</button>
                                    </div>
                            </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
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
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>

