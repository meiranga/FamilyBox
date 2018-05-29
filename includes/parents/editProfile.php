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
 $result2 = $conn->query("SELECT firstname, lastname, password, phone, birthdate, sex, picture,  iid FROM parents where email  = '".$_SESSION['email']."'");
				   $row =$result2->fetch_assoc();		  
	$childPicture="../../file/images/".$row['picture']."";
	
	$dateOfBirth = $row['birthdate'];
$today = date("21-5-2018");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
//echo 'Age is '.$diff->format('%y');
 foreach($conn->query("SELECT COUNT(email) FROM children where iid  = '".$row['iid']."'") as $kids) {
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
      <script>
    function changeUser(){
		var check ;

check = parseInt("<?php echo $_SESSION['check']; ?>");

if(check==1)
{
	<?php $_SESSION['check']=0; ?>
    $('.modal-title').html("Awesome!");
    $('.modal-body').html("Your details changed successfully");
    $('#myModal').modal("show");

}
	}
</script>
      
  </head>

  <body class="nav-md" onload="changeUser()">
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
                  <li class="current-page"><a href="home-parent.php"><i class="fa fa-home"></i> Home </a>
                 
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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['firstname'];?> Profile</li>
                        </ol>
                        </nav>
              </div>

           
            </div>
            
            <div class="clearfix"></div>
              
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
                      <h3><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['familyName'];?></h3> 

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-user user-profile-icon"></i> Age:<?php echo $diff->format('%y');?> 
                        </li>

           

                        <li>
                          <i class="fa fa-child user-profile-icon"></i> Kids: <?php echo $kids['COUNT(email)'];?>
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
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" class ="btn btn-app" data-toggle="tab" aria-expanded="false"><i class="fa fa-users"></i>Remove User</a>
                          </li>
                        
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <!-- Edit -->
                          <div role="tabpanel" class="tab-pane fade in active" id="tab_content1" aria-labelledby="profile-tab">

                    <!-- Form Edit Personal Details -->                            
                    <form method="post" action="editProfileBack.php" class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" >

                     
                      <span class="section">Personal &amp; User Info</span>
                     
                        
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="first-name2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="first-name" value="<?php echo $row['firstname'];?>"   type="text" >
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Family Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="last-name2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="last-name" value="<?php echo $row['lastname'];?>" type="text" >
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                       
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number" value="">Date of Birth
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="birthday2" name="birthDate" value="<?php echo $row['birthdate'];?>"  data-validate-minmax="10,100" readonly class="form-control col-md-7 col-xs-12 text-left">
                        <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                           </div></div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email" value="">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="user_email" name="email" value="<?php echo $_SESSION['email'];?>" readonly class="form-control col-md-7 col-xs-12" >
                        <span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                     

                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">New Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" value="<?php echo $row['password'];?>" class="form-control col-md-7 col-xs-12" placeholder="**********">
                        <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat new Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" value="<?php echo $row['password'];?>" class="form-control col-md-7 col-xs-12" placeholder="**********" >
                        <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Mobile Phone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" value="<?php echo $row['phone'];?>" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="">
                        <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                        
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Change Profile Photo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="fileupload" value="<?php echo $row['picture'];?>" name="attachments[]" class="form-control dropzone col-md-7 col-xs-12"  type="file" >
                        </div>
                        </div> 
                                        
                        
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button id="send" type="submit" class="btn btn-success" >Submit</button>
                        </div>
                      </div>
                        
                    </form>    
                              
                              
                              
                        
                            
                           

                          </div>
                            
                            
                        <!-- Remove user -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         
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
					  
					  $sql = "SELECT email, firstname, email, password  FROM parents where email!= '".$_SESSION['email']."' AND iid='".$_SESSION['iid']."' ";
                      $result = $conn->query($sql);
	     				$sql1 = "SELECT email, firstname, email, password  FROM children where  iid='".$_SESSION['iid']."' ";
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
                                        $counter = 1;
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
										echo"There are no user to remove";
									}
                                  ?>
                        

                      </tbody>
                    </table>

                              
                          </div>
<!-- End of Remove user -->
                            
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
    <!-- morris.js -->
    <script src="../../addons/raphael.min.js"></script>
    <script src="../../addons/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../addons/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../addons/moment.min.js"></script>
    <script src="../../addons/daterangepicker.js"></script>
     <script src="../../addons/accordion.js"></script>
      <script src="../../addons/validator.js"></script>
    
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
	 document.getElementById("password").value="";
     document.getElementById("password2").value="";
	  document.getElementById("phone").value="";
	 document.getElementById("male").value="";
     document.getElementById("female").value="";

    alert("your password is not the same please try again!");
	window.location.href = ("editProfile.php")
  }

  }

   
</script>
        

  </body>
</html>