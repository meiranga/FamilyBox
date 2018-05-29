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
    <!-- Dropzone.js -->
    <link href="../../css/dropzone.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">

<script  type="text/javascript">
function addItem(){
		var check ;

check = parseInt("<?php echo $_SESSION['check']; ?>");

if(check==3)
{
	<?php $_SESSION['check']=0; ?>

    $('.modal-title').html("Awesome!");
    $('.modal-body').html("Your gift added successfully");
    $('#myModal').modal("show");

}
else if(check==4){
		<?php $_SESSION['check']=0; ?>
$('.modal-title').html("Excellent!");
    $('.modal-body').html("The gift deleted successfully");
    $('#myModal').modal("show");
}	
else if(check==1){
		<?php $_SESSION['check']=0; ?>
    $('.modal-title').html("Awesome!");
    $('.modal-body').html("You successfully purchase the gift");
    $('#myModal').modal("show");
}	
	}
	
	</script>
  </head>

  <body class="nav-md" onload="addItem()">
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
                  <li><a href="home-parent.php"><i class="fa fa-home"></i> Home </a>
                 
                  </li>
                  <li><a><i class="fa fa-shopping-basket"></i> Family Store <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="current-page"><a href="store-parent.php">View Items</a></li>
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
                        <li class="breadcrumb-item active" aria-current="page">Family Store</li>
                        </ol>
                        </nav>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                      
                      <h2>All the items <small>come on, bring something new :)</small></h2>
                     
                     
                      
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                      <p>The more gifts, the better</p>
<!--
                      <div class="col-md-55">\\
                        <div class="thumbnail">\\
                          <div class="image view view-first">\\
                            <img style="width: 100%; display: block;" src="images/trip.jpg" alt="image" />\\
                            <div class="mask">\\
                              <p>Trip</p>\\
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                             <p>Price: <small> 100 Points</small></p>
                            <p>Date: <small> 30.5.18</small></p>
                          </div>
                        </div>
                      </div>
                        
  -->                  
                        <!-- Modal HTML -->
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
                        
                        
    
                                         <div class="responsive-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs responsive" role="tablist" >
                        
                          <li role="presentation" class="active"><a class ="btn btn-app" href="#tab_content1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-shopping-cart"></i>Family Store</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" class ="btn btn-app" data-toggle="tab" aria-expanded="false"><i class="fa fa-archive"></i>Gifts purchased</a>
                          </li>
                        
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <!-- Family Store -->
                          <div role="tabpanel" class="tab-pane fade in active" id="tab_content1" aria-labelledby="profile-tab">
                              
                                                   
            <?php
                        $sql = "SELECT itemname, type, point, picture FROM store where id= '".$_SESSION['iid']."' AND status=0 ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                 // output data of each row
                 while($row = $result->fetch_assoc()) {

                     echo "<div class=\"col-md-55\">";
                     echo "<div class=\"thumbnail\">";
                     echo "<div class=\"image view view-first \">";
                     echo "<img class=\"img-responsive\" style=\"width: 100%; display: block;\" src=\"../../file/images/".$row['picture']."\" alt=\"Gift\" />";
                     echo "<div class=\"mask\">";
                     echo "<p>".$row['type']."</p>";
                     echo "<div class=\"tools tools-bottom\"><form  method=\"post\" action=\"deleteBack.php\">
                          <button type=\"submit\" class=\"btn btn-xs btn-dark fa fa-times\"></button>
                          <input style=\"visibility: hidden; display:inline;\"   name=\"deleteItem\" value=\"".$row['itemname']."\" type=\"text\"></form>
                           </div>";
                     echo "</div></div>";
                     echo "<div class=\"caption\">
                           <p>Price: <small> ".$row['point']." Points</small></p>
                           <p>Name: <small>".$row['itemname']."</small></p>
                           </div></div></div>";

                 }    
            }
            else{
                echo"<p>You didn't add any items yet..</p>";
            }
                  ?>                                    
                          </div>
                            
                            
                        <!-- Gift purchase  -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         
                          	<table class="data table table-striped no-margin data table-responsive-sm">
                              <thead>
                                <tr>
                                  
                                  <th>Type</th>
                                  
                                  <th class="hidden-phone">Gift's name</th>
                                  <th>Points</th>
                                  <th> Name of purchaser </th>
								  <th> Approve gift purchased</th>
                                </tr>
                              </thead>
                              <tbody>   
                                   <?php
                                    $sql = "SELECT  type, nameofgift, childname, price FROM giftamount where id= '".$_SESSION['iid']."'  AND status=0 ";
                                    $result = $conn->query($sql);
									
									

                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                         // output data of each row
                                         while($row = $result->fetch_assoc()) {
											 


                                            
                                             echo "<td>".$row['type']."</td>";
                                             echo "<td>".$row['nameofgift']."</td>";
                                             echo "<td class=\"hidden-phone\">".$row['price']."</td>";
											  echo "<td>".$row['childname']."</td>";
											  echo"<form  method=\"post\" action=\"store-parentBack.php\" >";
											  echo "<td><button type=\"submit\" class=\"btn btn-success btn-xs\">Click</button>";
                                              echo"<input style=\"visibility: hidden; display:inline;\"   name=\"gift\" value=\"".$row['nameofgift']."\" type=\"text\"></td></form></tr>";
										   $counter++;   
                                         } 
                                    } 
                                    else{
                                        echo "<tr><td><p>No one  have purchased yet..</p></td></tr>";
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
              <div class="clearfix"></div></div>
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
  </body>
</html>