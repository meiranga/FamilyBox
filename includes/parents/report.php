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

			  
			  $sql9 = "SELECT  iid  FROM parents where email='".$_SESSION['email']."'";
              $result9 = $conn->query($sql9);
			  $row55 = $result9->fetch_assoc();	
			  
			   $sql = "SELECT  firstname, totalexpense FROM children where iid='".$row55['iid']."' GROUP BY firstname ";
              $result = $conn->query($sql);
			  
			 
			   $sql00 = "SELECT   SUM(point) as sumpoint FROM children where  iid= '".$row55['iid']."' ";
			   $result00 = $conn->query($sql00);	
			     $sql00 = $result00 ->fetch_assoc();	
			  
			   $sql10 = "SELECT   COUNT(childemail) as sumgift FROM giftamount where  id= '".$row55['iid']."' AND status=1 ";
			   $result10 = $conn->query($sql10);	
			     $sql10 = $result10 ->fetch_assoc();	
			  
			    $sql20 = "SELECT   COUNT(email) as sumtasks FROM tasks where iid= '".$row55['iid']."' AND status=0 ";
			   $result20 = $conn->query($sql20);	
			     $sql20 = $result20 ->fetch_assoc();

             $sql30 = "SELECT   COUNT(email) as sumsuc FROM tasks where iid= '".$row55['iid']."' AND status=2 ";
			   $result30 = $conn->query($sql30);	
			     $sql30 = $result30 ->fetch_assoc();				 
			  
			  
			  
				  
                   
				   
	
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
       <!-- Custom Theme Style -->
    <link href="../../css/custom.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['name', 'total expense'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["firstname"]."', ".$row["totalexpense"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Male and Female Employee',  
                      //is3D:true,  
                     // pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
		   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    //דירוג משימות כלליות
	google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Rank", { role: "style" } ],
         
		 <?php 
            $sql1 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"home\" GROUP BY type ";
              $result1 = $conn->query($sql1);	
           $row1 = $result1->fetch_assoc();	
          $sql2 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"studies\" GROUP BY type ";
              $result2 = $conn->query($sql2);	
           $row2 = $result2->fetch_assoc();		
            $sql3 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"other\" GROUP BY type ";
              $result3 = $conn->query($sql3);	
           $row3 = $result3->fetch_assoc();	
          $sql4 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"family\" GROUP BY type ";
              $result4 = $conn->query($sql4);	
           $row4 = $result4->fetch_assoc();		   
           
         ?>  
		
		["<?php echo $row1["type"];?> ", <?php echo $row1["avgRange"];?>, "#2A3F54"],
       ["<?php echo $row2["type"];?>", <?php echo $row2["avgRange"];?>, "#2A3F54"],
        ["<?php echo $row3["type"];?>", <?php echo $row3["avgRange"];?>, "#2A3F54"],
		["<?php echo $row4["type"];?>", <?php echo $row4["avgRange"];?>, "#2A3F54"],
      
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Rank of the tasks by the kids (general)",
        width: 400,
        height: 200,
        bar: {groupWidth: "80%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("rankTheTasksGeneral"));
      chart.draw(view, options);
  }
  </script>
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // דירוג משימות לפי id
	google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Rank", { role: "style" } ],
         
		 <?php 
            $sql1 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"ome\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result1 = $conn->query($sql1);	
           $row1 = $result1->fetch_assoc();	
          $sql2 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"studies\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result2 = $conn->query($sql2);	
           $row2 = $result2->fetch_assoc();		
            $sql3 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"other\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result3 = $conn->query($sql3);	
           $row3 = $result3->fetch_assoc();	
          $sql4 = "SELECT  type, AVG(rangee) as avgRange FROM report where type=\"family\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result4 = $conn->query($sql4);	
           $row4 = $result4->fetch_assoc();		   
           
         ?>  
		
		["<?php echo $row1["type"];?> ", <?php echo $row1["avgRange"];?>, "#2A3F54"],
       ["<?php echo $row2["type"];?>", <?php echo $row2["avgRange"];?>, "#2A3F54"],
        ["<?php echo $row3["type"];?>", <?php echo $row3["avgRange"];?>, "#2A3F54"],
		["<?php echo $row4["type"];?>", <?php echo $row4["avgRange"];?>, "#2A3F54"],
      
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Rank of the tasks by the kids(with id)",
        width: 450,
        height: 200,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("rankTheTasksWithId"));
      chart.draw(view, options);
  }
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    //   ID סוגי מתנות שהילדים קונים הכי הרבה לפי  
	google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Rank", { role: "style" } ],
         
		 <?php 
            $sql1 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"trip\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result1 = $conn->query($sql1);	
           $row1 = $result1->fetch_assoc();	
          $sql2 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"friends\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result2 = $conn->query($sql2);	
           $row2 = $result2->fetch_assoc();		
            $sql3 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"gift\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result3 = $conn->query($sql3);	
           $row3 = $result3->fetch_assoc();	
          $sql4 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"movie\" AND id= '".$row55['iid']."' GROUP BY type ";
              $result4 = $conn->query($sql4);	
				   $row4 = $result4->fetch_assoc();		
		 $sql5 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"game\" AND id= '".$row55['iid']."' GROUP BY type ";
					  $result5 = $conn->query($sql5);	
				   $row5 = $result5->fetch_assoc();	
		 $sql6 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"sport\" AND id= '".$row55['iid']."' GROUP BY type ";
					  $result6 = $conn->query($sql6);	
				   $row6 = $result6->fetch_assoc();	
		 $sql7 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"music\" AND id= '".$row55['iid']."' GROUP BY type ";
					  $result7 = $conn->query($sql7);	
				   $row7 = $result7->fetch_assoc();	
		 $sql8 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"food\" AND id= '".$row55['iid']."' GROUP BY type ";
					  $result8 = $conn->query($sql8);	
				   $row8 = $result8->fetch_assoc();	
		 $sql9 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"other\" AND id= '".$row55['iid']."' GROUP BY type ";
					  $result9 = $conn->query($sql9);	
				   $row9 = $result9->fetch_assoc();			   
				   
         ?>  
		
		["<?php echo $row1["type"];?> ", <?php echo $row1["number"];?>, "#2A3F54"],
       ["<?php echo $row2["type"];?>", <?php echo $row2["number"];?>, "#2A3F54"],
        ["<?php echo $row3["type"];?>", <?php echo $row3["number"];?>, "#2A3F54"],
		["<?php echo $row4["type"];?>", <?php echo $row4["number"];?>, "#2A3F54"],
		["<?php echo $row5["type"];?> ", <?php echo $row5["number"];?>, "#2A3F54"],
       ["<?php echo $row6["type"];?>", <?php echo $row6["number"];?>, "#2A3F54"],
        ["<?php echo $row7["type"];?>", <?php echo $row7["number"];?>, "#2A3F54"],
		["<?php echo $row8["type"];?>", <?php echo $row8["number"];?>, "#2A3F54"],
       ["<?php echo $row9["type"];?>", <?php echo $row9["number"];?>, "#2A3F54"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "type of gift that most children buying(with id)",
        width: 450,
        height: 200,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("mostPurchaseById"));
      chart.draw(view, options);
  }
  </script>
  <script type="text/javascript">
    //   סוגי מתנות שהילדים קונים הכי הרבה(כללי)
	google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Rank", { role: "style" } ],
         
		 <?php 
            $sql1 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"trip\"  GROUP BY type ";
              $result1 = $conn->query($sql1);	
           $row1 = $result1->fetch_assoc();	
          $sql2 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"friends\"  GROUP BY type ";
              $result2 = $conn->query($sql2);	
           $row2 = $result2->fetch_assoc();		
            $sql3 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"gift\"  GROUP BY type ";
              $result3 = $conn->query($sql3);	
           $row3 = $result3->fetch_assoc();	
          $sql4 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"movie\"  GROUP BY type ";
              $result4 = $conn->query($sql4);	
				   $row4 = $result4->fetch_assoc();		
		 $sql5 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"game\"  GROUP BY type ";
					  $result5 = $conn->query($sql5);	
				   $row5 = $result5->fetch_assoc();	
		 $sql6 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"sport\"  GROUP BY type ";
					  $result6 = $conn->query($sql6);	
				   $row6 = $result6->fetch_assoc();	
		 $sql7 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"music\"  GROUP BY type ";
					  $result7 = $conn->query($sql7);	
				   $row7 = $result7->fetch_assoc();	
		 $sql8 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"food\"  GROUP BY type ";
					  $result8 = $conn->query($sql8);	
				   $row8 = $result8->fetch_assoc();	
		 $sql9 = "SELECT  type, COUNT(type) as number FROM giftamount where type=\"other\"  GROUP BY type ";
					  $result9 = $conn->query($sql9);	
				   $row9 = $result9->fetch_assoc();			   
				   
         ?>  
		
		["<?php echo $row1["type"];?> ", <?php echo $row1["number"];?>, "#2A3F54"],
       ["<?php echo $row2["type"];?>", <?php echo $row2["number"];?>, "#2A3F54"],
        ["<?php echo $row3["type"];?>", <?php echo $row3["number"];?>, "#2A3F54"],
		["<?php echo $row4["type"];?>", <?php echo $row4["number"];?>, "#2A3F54"],
		["<?php echo $row5["type"];?> ", <?php echo $row5["number"];?>, "#2A3F54"],
       ["<?php echo $row6["type"];?>", <?php echo $row6["number"];?>, "#2A3F54"],
        ["<?php echo $row7["type"];?>", <?php echo $row7["number"];?>, "#2A3F54"],
		["<?php echo $row8["type"];?>", <?php echo $row8["number"];?>, "#2A3F54"],
       ["<?php echo $row9["type"];?>", <?php echo $row9["number"];?>, "#2A3F54"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "type of gift that most children buying(General)",
        width: 450,
        height: 200,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("mostPurchaseGeneral"));
      chart.draw(view, options);
  }
  </script>
   
   
   
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
                        <li class="breadcrumb-item active" aria-current="page">Reports</li>
                        </ol>
                        </nav>
                  
              </div>


            </div>
            <div class="clearfix"></div>
           
              
                        <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count"><?php echo $sql00 ['sumpoint']?></div>
                  <h3>Points</h3>
                  <p>Total Kids Points</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php echo $sql10 ['sumgift']?></div>
                  <h3>Gifts</h3>
                  <p>Total gifts amount</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php echo $sql20 ['sumtasks']?></div>
                  <h3>Tasks</h3>
                  <p>Total In-Progress Tasks</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $sql30 ['sumsuc']?></div>
                  <h3>Success</h3>
                  <p>Total Complited Tasks</p>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">



                        <div class="col-md-12 col-sm-12 col-xs-12">
                
                  <div class="x_title">
                    <h2><i class="fa fa-bar-chart"></i> Reports <small>Statistics and Insights</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <p class="commentReport">* For best view on mobile - turn the phone into a horizontal position </p>        
                      
               <!--- <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph 1<small>Sessions</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div id="rankTheTasksGeneral" style="width:100%; height:100%; margin-right=15%;" class="embed-responsive embed-responsive-1by1"></div>
                  </div>
                </div>
              </div>---->
			    <?php
				$count=1;
			    $sql77 = "SELECT  type, AVG(rangee) as avgRange FROM report GROUP BY type ";
              $result77 = $conn->query($sql77);
			   if($result77->num_rows > 0 ){
				   echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
				  
				   echo " <div class=\"x_panel\">";
				   echo "<div class=\"x_title\">";
				   echo "<h2>Bar graph ".$count."<small>Sessions</small></h2>";
				    echo "<div class=\"clearfix\"></div>";
					 echo "</div>";
					  echo "<div class=\"x_content\">";
					   echo "<div id=\"rankTheTasksGeneral\" style=\"width:90%; height:100%;\" class=\"embed-responsive embed-responsive-1by1\"></div>";
					    echo "</div>";
						 echo "</div>";
						  echo "</div>";
						  $count++;
						  
				   
			   }
                      
                   ?>   
                      
                      
                <!---<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph 2<small>Sessions</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div id="rankTheTasksWithId" style="width:90%; height:100%;" class="embed-responsive embed-responsive-1by1"></div>
                  </div>
                </div>
              </div>---->
			   <?php
			    $sql888 = "SELECT  type, AVG(rangee) as avgRange FROM report where id= '".$row55['iid']."' GROUP BY type ";
              $result888 = $conn->query($sql888);
			   if($result888->num_rows > 0 ){
				   echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
				  
				   echo " <div class=\"x_panel\">";
				   echo "<div class=\"x_title\">";
				   echo "<h2>Bar graph ".$count."<small>Sessions</small></h2>";
				    echo "<div class=\"clearfix\"></div>";
					 echo "</div>";
					  echo "<div class=\"x_content\">";
					   echo "<div id=\"rankTheTasksWithId\" style=\"width:90%; height:100%;\" class=\"embed-responsive embed-responsive-1by1\"></div>";
					    echo "</div>";
						 echo "</div>";
						  echo "</div>";
						   $count++;
						  
				   
			   }
                      
                   ?>   
                      
                                                    
                <!---<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph 4<small>Sessions</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div id="mostPurchaseById" style="width:90%; height:100%;" class="embed-responsive embed-responsive-1by1"></div>
                  </div>
                </div>
              </div> ---->  

         <?php
			    $sql99 = "SELECT  type, COUNT(type) as number FROM giftamount where id= '".$row55['iid']."'  GROUP BY type ";
              $result99 = $conn->query($sql99);
			   if($result99->num_rows > 0 ){
				   echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
				  
				   echo " <div class=\"x_panel\">";
				   echo "<div class=\"x_title\">";
				   echo "<h2>Bar graph ".$count."<small>Sessions</small></h2>";
				    echo "<div class=\"clearfix\"></div>";
					 echo "</div>";
					  echo "<div class=\"x_content\">";
					   echo "<div id=\"mostPurchaseById\" style=\"width:90%; height:100%;\" class=\"embed-responsive embed-responsive-1by1\"></div>";
					    echo "</div>";
						 echo "</div>";
						  echo "</div>";
						    $count++;
				   
			   }
                      
                   ?>   			  
                      
                      
                                                                
                <!---<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph 5<small>Sessions</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div id="mostPurchaseGeneral" style="width:90%; height:100%;" class="embed-responsive embed-responsive-1by1"></div>
                  </div>
                </div>
              </div> ----> 
			   <?php
			    $sql444 = "SELECT  type, COUNT(type) as number FROM giftamount  GROUP BY type ";
              $result444 = $conn->query($sql444);
			   if($result444->num_rows > 0 ){
				   echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
				  
				   echo " <div class=\"x_panel\">";
				   echo "<div class=\"x_title\">";
				   echo "<h2>Bar graph ".$count."<small>Sessions</small></h2>";
				    echo "<div class=\"clearfix\"></div>";
					 echo "</div>";
					  echo "<div class=\"x_content\">";
					   echo "<div id=\"mostPurchaseGeneral\" style=\"width:90%; height:100%;\" class=\"embed-responsive embed-responsive-1by1\"></div>";
					    echo "</div>";
						 echo "</div>";
						  echo "</div>";
						   $count++;
				   
			   }
                      
                   ?>  
                      
                      
                      
                       
                                    
                  <!---<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph 3<small>Sessions</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div id="piechart" style="width:90%; height:100%;" class="embed-responsive embed-responsive-1by1"></div>
                  </div>
                </div>
              </div> ---->
			     <?php
			        $sql78 = "SELECT  firstname, totalexpense FROM children where iid='".$row55['iid']."' GROUP BY firstname ";
              $result78 = $conn->query($sql78);
			   if($result78->num_rows > 0 ){
				   echo "<div class=\"col-md-6 col-sm-6 col-xs-12\">";
				  
				   echo " <div class=\"x_panel\">";
				   echo "<div class=\"x_title\">";
				   echo "<h2>Bar graph ".$count."<small>Sessions</small></h2>";
				    echo "<div class=\"clearfix\"></div>";
					 echo "</div>";
					  echo "<div class=\"x_content\">";
					   echo "<div id=\"piechart\" style=\"width:90%; height:100%;\" class=\"embed-responsive embed-responsive-1by1\"></div>";
					    echo "</div>";
						 echo "</div>";
						  echo "</div>";
						   $count++;
				   
			   }
                      
                   ?>  
			  
			  <div>
          
                  
                  
                  
                
                  
              <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
			  <table class="data table table-striped no-margin data table-responsive-sm">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Type</th>
                                  
                                  <th class="hidden-phone">Task Name</th>
                                  <th>Comment</th>
                               
                                </tr>
                              </thead>
                              <tbody>   
                                   <?php
                                    $sql66 = "SELECT  type, taskname, comment  FROM report where id='".$row55['iid']."'  ";
                                    $result66 =   $conn->query($sql66);
									
									

                                    if ($result66->num_rows > 0) {
                                        $counter = 1;
                                         // output data of each row
                                         while($row66 = $result66->fetch_assoc()) {
											 


                                             echo "<tr><td>".$counter."</td>";
                                             echo "<td>".$row66['type']."</td>";
                                             echo "<td>".$row66['taskname']."</td>";
                                            
											  echo "<td>".$row66['comment']."</td>";
										
										   $counter++;   
                                         } 
                                    } 
                                    else{
                                        echo "<tr><td><p>No comment yet..</p></td></tr>";
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
              </div>
            </div>
          </div>
        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="text-center">
           <div class="text-center">
           <span class="fa fa-copyright" aria-hidden="true"></span> All Rights Reserved to <a href="#">FamilyBox, 2018.</a>
          </div>
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
    <!-- Chart.js -->
    <script src="../../addons/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../addons/custom.min.js"></script>
          
  </body>
</html>