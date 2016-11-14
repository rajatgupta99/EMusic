<?php
error_reporting(0);
include("admin\connect1.php");
session_start();
extract($_POST);

$sel=mysqli_query($link,"select image from movies");

?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Music Club</title>
<link rel="icon" type="image/png" href="images/faviconimg.png">
<link href="css/style1.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{ margin-left:0px; margin-right:10px; font-family: 'Raleway', sans-serif}
</style>
</head>

<body>
<div class="main">
  <div class="header">
  <div class="logo">
  <a href="home.php"><img src="images/logodesign3.png" style="width:185px; height:68px">  </a>
  </div>
  <div class="lookbox">
    <form id="form1" name="form1" method="post">
      <table width="300" border="0">
        <tr>
          <td width="335"><input class="sercopt" name="search"  type="search" id="search" placeholder="Search For Your Song" > <input class="sercopt2" type="submit" name="search" id="search" value="Search"></td>
        </tr>
      </table>
    </form>
  </div>
  </div>
  <div class="imageslider">
  
  
  <p><marquee width="1263px" height="230px" direction="left" scrollamount="8" onmouseover="this.stop();" onmouseout="this.start();"  style="margin-left:0px"> 
  <?php
  if(mysqli_num_rows($sel)>0)
  {
	  while($arr=mysqli_fetch_array($sel))
	  {
		  extract($arr);
  ?>
  <img src="admin/<?php echo $image ?>", width="160px" height="227px">  
<?php
	  }
  }
 ?>
 </marquee> </p>
   </div>
  <div class="container">
  <div class="dashboard"> 
  <ul class="dashoptions">
  <li style="border-bottom:1px solid black"><a href="?con=topcharts"><span class="hello">Top Charts</span></a></li>
  
  <li style="border-bottom:1px solid black"><a class="hello" href="?con=mov">Movies</a></li>
  
  <li style="border-bottom:1px solid black"><a class="hello" href="?con=allcoll">Audio Collection</a></li>
  <li style="border-bottom:1px solid black"><a href="?con=videocoll"><span class="hello">Video Collection </span></a></li>
  <li ><a class="hello" href="?con=feedback">Feedback</a></li>
  <li style="margin-top:20px" ><img src="images/imagesocial.png"></li>
  </ul>
  <div class="clearing"></div>
  </div>
  <div class="rightcontainer"> 
  <?php
  switch($_REQUEST['con'])
  {
	  case 'mov' : include("alphabets.php");
                    break;
	  case 'home' : include("welcome.php");
                    break;	
	  case 'feedback' : include("userfeedback.php");
                    break;		
	  case 'allcoll' : include("allcollection.php");
                    break;		
	  case 'videocoll' : include("videocollection.php");
                    break;		
	  case 'topcharts' : include("topcharts.php");
                    break;	
	  default: include("welcomeuser.php");
					
  }
  ?> 
  </div>
  </div>
  <div class="footer">
  <ul>
   <li>About</li>
   <li>Press</li> 
   <li>Copyright </li>
   <li>Creators</li>
   <li>Advertise </li>
   <li> Developers </li>
   </ul>
  </div>
</div>
</body>
</html>