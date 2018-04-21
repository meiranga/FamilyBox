<?php session_start(); ?>
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
    <link href="../../css/addFamilyMemberCSS.css" rel="stylesheet">
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

            

  </head>
    
  <body>
      
      <!-------------MAIN------------------->
    
      <aside>
    <h1 id="logo">FamilyBox</h1>
    <h2 id="greeting">Welcome back <?php echo $_SESSION['firstname'];?>!</h2>
     <div class="row">
    <div class="col-12">   
    <img src="<?php echo $_SESSION['picture']?>" class="img-circle center-block picParent"></div></div> <br>
     

        
       <div class="list-group center-block">
  <a href="#" class="list-group-item ">HOME </a> 
        <a href="home-parent.php" class="list-group-item">My familiy</a>
       <a href="addFamilyMember.php" class="list-group-item active">Add Family Member</a>
     <a href="#" class="list-group-item">Family store</a>
        <a href="#" class="list-group-item">Report</a>
       <a href="#" class="list-group-item">Setting</a>
       <a href="../../google/logout.php" class="list-group-item">Logout</a>
        
           
    </div>  
          
    </aside>
      
    <!-----Main----->
    <main>

        
    <div class="box">

     <h3 class="title">ADD FAMILY MEMBER</h3><hr><br>
      <form action="#" method="post" id="addMember">
        <fieldset>
          <legend>
            
            <p>User permession:<select name="permession" required>
            <option value="" selected disabled hidden>Choose here</option>
            <option value="parent">Parent</option>
            <option value="Child">Child</option>
                </select></p>


                            
                <p>First name: <input type="text" name="name" id="name" placeholder="Johnny" required></p>
              
          
                <p>Email<input type="email" name="email" placeholder="john@gmail.com" required></p>
              
                <p>Password<input type="password" name="password" placeholder="********" required></p>
              
                 <p>Confirm password<input type="password" name="password2" placeholder="********" required></p> 
              
              <p>Date Of Birth:<input type="date" name="bday" required></p>
              
                <p>Mobile<input type="tel" name="phone" placeholder="050-0000000"></p> 
              
              
              
              
                <p class="genderMain">Gender:
                
                <label id="gender">
                  <input type="radio" name="gender" value="male" required>
                  <img src="../../img/genderBoy.svg" class="genderImg">
                </label>
              
               <label >
                  <input type="radio" name="gender" value="female" required>
                  <img src="../../img/genderGirl.png" class="genderImg">
                </label></p>
               
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
          
          <button type="submit" form="addMember" value="Submit" class="btn btn-lg button center-block" onclick="passvalid()" >Add Family Member</button>
    
        </form>
            
        
        
        
        
        
       </div>
         
      
    </main>
      
     

      
      
      
      
      
      
      
      
      
      
      
      
<script>

  function passvalid(){
  var pass1=document.getElementById("pass1").value;
  var pass2=document.getElementById("pass2").value;
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
	window.location.href = ("addFamilyMember.php")
  }

  }

   
      </script>
	  	<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="../../nis/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
		<script src="../../nis/js/jquery.iframe-transport.js" type="text/javascript"></script>
		<script src="../../nis/js/jquery.fileupload.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
               var files = $("#files");

               $("#fileupload").fileupload({
                   url: 'register.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 6000000)
                       $("#error").html('Your file is too big! Max allowed size is: 6 MEGA');
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