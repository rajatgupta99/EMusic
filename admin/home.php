<?php

session_start();
$username=$_SESSION['username'];
$name=$_SESSION['name'];
include("connect1.php");

if($username=="")
{
  header("location:logoutnew.php");
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User: <?php echo $name; ?></title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{margin-left:0px; margin-right:10px;font-family: 'Raleway', sans-serif}
</style>
<style type="text/css">



.main {
	height: 800px;
	width: 950px;
	margin-left: 150px;
}
.header {
	float: left;
	height: 100px;
	width: 950px;
	
}
.menu {
	height: 50px;
	width: 950px;
	float: left;
	margin-top: 1px;
	font-weight: normal;
}
.container {
	float: left;
	height: 600px;
	width: 950px;
	margin-top: 1px;
}
.containerleft {
	float: left;
	height: 600px;
	width: 199px;
	margin-right: 1px;
	
}
.containerright {
	float: right;
	height: 600px;
	width: 750px;
	
}
.footer {
	float: left;
	height: 50px;
	width: 950px;
	margin-top: 1px;
	
}
.logo {
	height: 60px;
	width: 500px;
	margin-top: 20px;
	margin-left: 250px;
}
li   {
	list-style-type: none;
	
}
a {
	text-decoration: none;
	color: #666666;
}
.menu li{
	float: left;
	width: 150px;
	margin-left: 30px;
	font-weight: bold;
}
.footer li {
	float: left;
	width: 150px;
	color: #666666;
}
.userwelcome {
	float: right;
	height: 30px;
	width: 40px;
	margin-top: 20px;
	margin-right: 40px;
}
.userwelcome {
	float: right;
	height: 20px;
	width: 20px;
	margin-top: 20px;
	margin-right: 40px;
}
</style>
</head>


<body style="background:linear-gradient(to bottom, black,black);">
<div class="main" style="background-color:black">
  <div class="header" style="background-color:#FFF">
    <div class="logo" style="font-size: 24px; color: #C33; text-align: center">
      <p><strong><img src="images/logo_onlinemusic.png" style="width:500px; height:60px"></strong>   </p>
    </div>
  </div>
  <div class="menu" style="background-color:#FFF">
    <ul>
      <li style="font-size:15px"> <a href="?con=home">Home</a></li>
      <li style="font-size:15px"><a href="?con=cp">Change Password</a> </li>
      <li style="font-size:15px"> <a href="logoutnew1.php"> Log Out</a></li>
   </ul>
  </div>
  <div class="container" style="background-color:black">
    <div class="containerleft" style="background-color:#FFF">
      <ul>
      <li style="font-size:15px"><strong> Welcome: <h style="color:red; font-size:15px"><?php echo $name ?></h> </strong></li>
      &nbsp;
      <li style="font-size:15px"><a href="?con=am"><strong> Add Movie </a></strong></li>
      &nbsp;
      <li style="font-size:15px"><a href="?con=ams"><strong> Add Movie Song </a> </strong> </li>
      &nbsp;
      <li style="font-size:15px"><strong> Update Movie Song </strong></li>
      &nbsp;
      <li style="font-size:15px"><a href="?con=adminfeedback"><strong> Feedback </strong> </a></li>
      </ul>
    </div>
    <div class="containerright" style="background-color:#FFF">
    <?php
	switch($_REQUEST['con'])
	{
		case 'cp' : include("changepassword.php");
		             break;
						
		case 'am' : include("addmovie.php");
		            break;
		
		case 'ams' : include("addmoviesong.php");
		             break;			
		
		case 'adminfeedback' : include("adminfeedback.php");
		             break;	
					 
	    default : include("homeimage.php");
		              break;		 
	}
	
	
	?>
   </div>
  </div>
  
  <div class="footer" style="background-color:#FFF">
  <ol>
   <li style="font-size:15px">About</li>
   <li style="font-size:15px">Press</li> 
   <li style="font-size:15px">Copyright </li>
   <li style="font-size:15px">Creators</li>
   <li style="font-size:15px">Advertise </li>
   <li style="font-size:15px"> Developers </li>
   </ol>
  </div>
</div>
</body>
</html>