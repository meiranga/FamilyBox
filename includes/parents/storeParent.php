<?php session_start(); ?>
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
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FamilyBox</title>
      
      
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Miltonian" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lemon" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Merienda+One" />
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lemon" />
    <link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../../css/storeParentCSS.css" rel="stylesheet">
	<style type="text/css">
			#dropZone {
				border: 3px dashed #0088cc;
				padding: 50px;
				width: 500px;
				margin-top: 20px;
			}

			#files {
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 200px;
				display: none;
			}

            #error {
                color: red;
            }
		</style>
			<script  type="text/javascript">
	function addItem(){
		var check ;

check = parseInt("<?php echo $_SESSION['check']; ?>");

if(check==3)
{
	<?php $_SESSION['check']=0; ?>
alert("your Item added successfully");
}
else if(check==4){
		<?php $_SESSION['check']=0; ?>
alert("your Task deleted successfully");
}	
	}
	
	</script>

            

  </head>
    
  <body onload="addItem()">
      
      <!-------------MAIN------------------->
<nav class="navbar navbar-fixed-top" id="adiadi">
    <div class="container-fluid">
    <div class="navbar-header navbar-inverse">
      <button type="button" class="navbar-toggle navbar-inverse" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#" ><span class="decMenu">FamilyBox</span></a>
    </div>
    <div class="collapse navbar-collapse navbar-inverse" id="myNavbar">
      <ul class="nav ">
        <li ><a href="home-parent.php" class="decMenu" ><span class="glyphicon glyphicon-home"></span>  My Familiy</a></li>
        <li><a href="addFamilyMember.php" class="decMenu" ><span class="glyphicon glyphicon-plus"></span>  Add Family Member</a></li>
        <li><a href="storeParent.php" class="decMenu" ><span class="glyphicon glyphicon-shopping-cart"></span>  Family store</a></li> 
        <li><a href="#" class="decMenu" ><span class="glyphicon glyphicon-file"></span>  Report</a></li> 
        <li><a href="#" class="decMenu" ><span class="glyphicon glyphicon-cog"></span>  Setting</a></li>

        <li><a href="#" class="decMenu"><span class="glyphicon glyphicon-log-in"></span>  Logout</a></li>
      </ul>
    
    </div>
  </div>
</nav>
      <aside>
    <h1 id="logo">FamilyBox</h1>
    <h2 id="greeting">Welcome back <?php echo $_SESSION['firstname'];?>!</h2>
     <div class="row">
    <div class="col-12">   
    <img src="<?php echo $_SESSION['picture']?>" class="img-circle center-block picParent"></div></div> <br>
     

        
       <div class="list-group center-block" data-target="#respManu">
        <a href="home-parent.php" class="list-group-item">My Familiy</a>
       <a href="addFamilyMember.php" class="list-group-item">Add Family Member</a>
     <a href="storeParent.php" class="list-group-item active">Family store</a>
        <a href="#" class="list-group-item">Report</a>
       <a href="#" class="list-group-item">Setting</a>
       <a href="../../google/logout.php" class="list-group-item">Logout</a>
        
           
    </div>  
          
    </aside>
      
    <!-----Main----->
    <main>

        
        
    <div class="box">
        
        <h1 class="head_text">Family Store</h1>
         
    <section id="secPillTab">           
       
  <ul class="nav nav-tabs nav-pills nav-stacked">
    
    <li class="active"><a data-toggle="tab" href="#progress" class="tabMenu">Current items</a></li>
    <li><a data-toggle="tab" href="#approval" class="tabMenu">Sold items</a></li>
    <li class="pull-right"><a data-toggle="tab" href="#add" class="tabMenu">
<span class="glyphicon glyphicon-plus-sign" ></span><b> Add new item</b>
</a></li>
     
  </ul>
        </section>
        
        
        
        
        <section id="secCont">  
        
   
  <div class="tab-content">

    <div id="progress" class="tab-pane fade in active">
      <div class="row">
          <div class="col-md-12">
      <h3>Current items Available</h3></div>
       
          
                    <ul class="newItemLine">
                <div class="container-fluid">
          
         
       		<?php
			$sql = "SELECT itemname, type, point, picture FROM store where id= '".$_SESSION['iid']."' AND status=0 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     
     // output data of each row
     while($row = $result->fetch_assoc()) {
	     
		 echo " <li class=\"row newItemLine\">";
		 echo "<div class=\"col-md-3 col-sm-3 col-xs-3 pull-left\"><img src=\"../../file/images/".$row['picture']."\" class=\"itemPic\" ></div> ";
		 echo "<div class=\"col-md-6 col-sm-6 col-xs-6\"><p class=\"itemDescp\">";
		 echo "<span class=\"textDes\">Name: ".$row['itemname']."</span><br>";
		 echo "<span class=\"textDes\">Price: ".$row['point']."</span><br> </p></div>";
		 echo " <div class=\"col-md-3 col-sm-3 col-xs-3\"><p class=\"itemOpt\">";
		 echo "<button type=\"submit\"  value=\"Submit\" class=\"btn btn-md button center-block\">Update</button><br>";
		 echo"<form  method=\"post\" action=\"storeParentBack.php\" ><input style=\"visibility: hidden; display:inline;\"   name=\"deleteTask\" value=\"".$row['itemname']."\" type=\"text\"><button style=\" display:inline;\" type=\"submit\"  value=\"Submit\" class=\"btn btn-md button\">Delete</button></form></p></div></li>";
    
     } 
    
}
else{
	echo"<p>You didn't add any items yet..</p>";
}
      ?>    
                        
            </div>
          </ul>
        </div>
    </div>
    <div id="approval" class="tab-pane fade">
      <h3>Sold items </h3>
	         		<?php
			$sql = "SELECT itemname, type, point, picture FROM store where id= '".$_SESSION['iid']."' AND status=1 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     
     // output data of each row
     while($row = $result->fetch_assoc()) {
	     
		 echo " <li class=\"row newItemLine\">";
		 echo "<div class=\"col-md-3 col-sm-3 col-xs-3 pull-left\"><img src=\"../../file/images/".$row['picture']."\" class=\"itemPic\" ></div> ";
		 echo "<div class=\"col-md-6 col-sm-6 col-xs-6\"><p class=\"itemDescp\">";
		 echo "<span class=\"textDes\">Name: ".$row['itemname']."</span><br>";
		 echo "<span class=\"textDes\">Price: ".$row['point']."</span><br> </p></div>";
		
		 echo"</li>";
    
     } 
    
}
else{
	echo"<p>There are not any items that already sold...</p>";
}
      ?>    
      
    </div>

        <div id="add" class="tab-pane fade">
            
      <!-- FORM for add new task-->
      <h3>ADD NEW ITEM</h3><br>
	   <form action="storeParentBack.php" method="post" id="addMember" enctype="multipart/form-data">
        <fieldset>
          <legend>
            
            <p>Type:<select name="itemType">
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
                </select></p>
             
                <p>Name: <input type="text" name="itemName" id="_newItem" placeholder="Describe the item" requierd></p>
              
          
                <p>Points:<input type="number" name="price" placeholder="How much would it cost" requierd></p>
				
				  
             <p>Picture</p>
			 <div id="dropZone">
				<h1>Drag & Drop Files...</h1>
				<input type="file" id="fileupload" name="attachments[]" multiple>
				
			</div>
			<h1 id="error"></h1><br><br>
			<h1 id="progress"></h1><br><br>
			<div id="files"></div>
               
                    
            
          </legend>
    
          </fieldset>
          
        
		   <button type="submit" form="addMember" value="Submit" class="btn btn-lg button center-block"  >Add Item</button>
            
            
      </form>
    </div>
  </div>

       </section> 
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
            
            
       </div>
         
      
    </main>
      <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="js/jquery.fileupload.js" type="text/javascript"></script>
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