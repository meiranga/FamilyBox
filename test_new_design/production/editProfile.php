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
    $_SESSION['lastnameChild']= $row["lastname"];
 }
  foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$emailChild."'") as $total) {
				   }
				   foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$emailChild."'AND status=1") as $finish) {
				   }
				    foreach($conn->query("SELECT COUNT(point) FROM children where iid  = '".$_SESSION['iid']."'") as $totalPoint) {
				   }
				   
				  
			 $sql5 = "SELECT DISTINCT point FROM children where iid= '".$_SESSION['iid']."' ORDER BY point DESC";
            $result5 = $conn->query($sql5);
			$rank;
			$count=1;
			while($row5 = $result5->fetch_assoc()) {
				 if($row['point']==$row5['point']){
					 $rank=$count;
				 }
				 $count++;
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
    <link href="../../nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../../dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
      
    <script  type="text/javascript">
		
        function start(){
			leftMission();
			addTask();			
		}
		
	    function addTask(){		
		var check ;
check = parseInt("<?php echo $_SESSION['check']; ?>");
if(check==2)
{
	<?php $_SESSION['check']=0; ?>
	alert("your Task added successfully");
}	
	}
	
	    function leftMission(){
		<?php
		foreach($conn->query("SELECT COUNT(email) FROM tasks where email  = '".$_SESSION['emailChild']."'") as $row) {
				   }
				   ?>
		var mission=<?php echo $row['COUNT(email)'];?>;	
		document.getElementById("task accomplish").innerHTML=" "+mission+" tasks to do!";	
	}
	</script>

      
  </head>

  <body class="nav-md" onload="start()" onload="getAccordion('#myTabs'.800)">
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
                
                <li class="current-page"><a href="home-parent.php"><i class="fa fa-home"></i> Home </a></li>

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

              <ul class="nav navbar-nav navbar-right" >
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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['firstname'];?> Profile</li>
                        </ol>
                        </nav>
              </div>

           
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $_SESSION['firstname'];?>  <small>Personal Profile</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?php echo $_SESSION['picture']?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['lastname'];?></h3> 

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-bell-o user-profile-icon"></i> Age: 
                        </li>

                        <li>
                          <i class="fa fa-check-square-o user-profile-icon"></i> Tasks:
                        </li>

                        <li>
                          <i class="fa fa-child user-profile-icon"></i> kids: 
                        </li>

                        
                      </ul>

                      <br />

                     
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        
                       <!-- bar_tabs--> 
                        
                      <div class="responsive-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs responsive" role="tablist" >
                        
                          <li role="presentation" class="active"><a class ="btn btn-app" href="#tab_content1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-edit"></i>Edit profile</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Waiting</a>
                          </li>
                        
                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <div role="tabpanel" class="tab-pane fade in active" id="tab_content1" aria-labelledby="profile-tab">

                            <!-- Edit -->
                            
                           

                          </div>
                            
                            
                        <!-- Waiting -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         
                              
                          </div>

                            
                        </div>
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
    <!-- morris.js -->
    <script src="../../addons/raphael.min.js"></script>
    <script src="../../addons/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../addons/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../addons/moment.min.js"></script>
    <script src="../../addons/daterangepicker.js"></script>
     <script src="../../addons/accordion.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../../addons/custom.min.js"></script>
        <script type="text/javascript">
            $(function () {
               var files = $("#files");

               $("#fileupload").fileupload({
                   url: 'parentTasksBack.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 1000000)
                       $("#error").html('Your file is too big! Max allowed size is: 500KB');
                   else {
                       $("#error").html("");
                       data.submit();
                   }
               }).on('fileuploaddone', function(e, data) {
                    var status = data.jqXHR.responseJSON.status;
                    var msg = data.jqXHR.responseJSON.msg;

                    if (status == 1) {
                        var path = data.jqXHR.responseJSON.path;
                        $("#files").fadeIn().append('<p><img style="width: 100px; height: 100px;" src="'+path+'" /></p>');
                    } else
                        $("#error").html(msg);
               }).on('fileuploadprogressall', function(e,data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#progress").html("Completed: " + progress + "%");
               });
            });
        </script>
		<script>
		 function passValueToPicture(element){
			 var x=element.value;
			
			 
			
			 
			 document.getElementById("pic").innerHTML ="../../file/images/"+x;
			 
		 }
		
            
		</script>
        
<script type="text/javascript">
      $( 'ul.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );
      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );
    </script>
        
        

  </body>
</html>