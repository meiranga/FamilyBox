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
                  <li class="current-page"><a href="addFamilyMember.php"><i class="fa fa-users"></i>Add My Family</a>
                    
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
                        <li class="breadcrumb-item active" aria-current="page">Add Family Member</li>
                        </ol>
                        </nav>
                  
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">




                    <h2>Add your Family and start play</h2>
                      
                      
                      
                      
                    <form method="post" action="addFamilymemberBack.php" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" >

                     
                      <span class="section">Personal Info</span>
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Permission <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                           <div id="gender2" class="btn-group" data-toggle="buttons">
                                  
                                <label class="btn permissionRadio" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="userPermession" value="parent">  <img src="../../img/parentsBlack.png" class="img-thumbnail img-responsive img-container">
                                <figcaption>Parent</figcaption>
                                </label>
                                  
                                <label class="btn permissionRadio" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="userPermession" value="child" checked=""> 
                                <img src="../../img/kidsBlack.gif" class="img-thumbnail img-responsive">
                                <figcaption>Child</figcaption>
                                </label>         
                                  
                              </div>
                        </div>
                      </div>    
                        
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="first-name2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="first-name" placeholder="first name e.g Jon" required="required" type="text">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Family Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="last-name2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="last-name" placeholder="last name e.g Deep" required="required" type="text">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <div id="gender2" class="btn-group" data-toggle="buttons" >
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="female" checked=""> Female
                                </label>
                            </div>
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number" placeholder="01.01.2010">Date of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="birthday2" name="birthDate" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12 text-left">
                        <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                    <span class="section">User Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email" placeholder="Joe@gmail.com">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="user_email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        <span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                     
                     

                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" placeholder="**********" required="required">
                        <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" placeholder="**********" required="required">
                        <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Mobile Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="050-1234567">
                        <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Add Your Profile Photo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="fileupload" name="attachments[]" class="form-control dropzone col-md-7 col-xs-12" required="required" type="file" >
                        </div>
                        </div> 
                                        
                        
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send"  onclick="passvalid()" type="submit" class="btn btn-success">Submit</button>
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