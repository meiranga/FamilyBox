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
                  <li><a href="home-parent.php"><i class="fa fa-home"></i> Home </a>
                 
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
                        <li class="breadcrumb-item active" aria-current="page">Q&amp;A</li>
                        </ol>
                        </nav>
                  
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">



                        <div class="col-md-12 col-sm-12 col-xs-12">
                
                  <div class="x_title">
                    <h2><i class="fa fa-info"></i> HELP <small>Questions and Answers </small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start info -->
                    <div class="accordion" id="info" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#info" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">First Steps</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <h3>I Signed in, what's next?</h3>
                              
                            <p>
                                1. Add your family to the game by click on "Add My Family" <br>
                                2. You will see your kids on the Home page. Click on them and go inside their profile. Here you can give them missions by click on "Add new Task" button at the bottom-left side.<br>
                                3. At the "Waiting for Approval" tag, you will find the child tasks
                                    that waiting for your approval. You can find there a picture for their hard work.<br>
                                4. You child forget his password? No Problem! You can find his Username and Password at the bottom of his picture.<br>
                                
                                </p>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Add gift</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <h3>How is it works?</h3>
                            <p>1. It is importnt to add gifts and motivate your kids for a good reward for thier effort. <br>
                            2. Add a few gift in a range of points. That will be your choich to set up the price for each. <br>
                            3. All your kids will see all the gift.<br>
                            4. Check out the "Gift Purchased" - and approve after you buy the gift.<br>
                            </p>
                            
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">How to...</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <h3>How to</h3>
                            <p>
                            <strong>Q:</strong> Add my husbend/wife? <br>
                              <strong>A:</strong> At the Home page click on the "Add My Family" at the side menu. Then choose "Parent" permission. Now you and your other half can give tasks and gifts.
                                <br><br>
                             
                            
                            </p>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->


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
    <!-- validator -->
    <script src="../../addons/validator.js"></script>
<script>

  function passvalid(){
  var pass1=document.getElementById("password").value;
  var pass2=document.getElementById("password2").value;
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
	window.location.href = ("rregister.php")
  }

  }

   
</script>
	
  </body>
</html>