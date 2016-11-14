<?php
extract($_POST);
include("admin\connect1.php");
session_start();

function alphabets()
{
$alpha='A';
for($q=1;$q<=26;$q++)
{
	echo "<a href='?con=mov&conname=$alpha'>". $alpha." </a>| ";
	 $alpha++;
	
}
}



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Music Club</title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{ margin-left:0px; margin-right:10px; font-family: 'Raleway', sans-serif}
</style>
</head>

<body>
<form id="form1" name="form1" method="post">
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="926" border="0">
      <tr>
        <td width="920" style="color:red; font-size:23px"><div align="center"><?php alphabets(); ?></div></td>
        
        
      </tr>
    </table>
    
    <?php
		if(isset($_REQUEST['conname']))
{
	$con2=$_GET['conname'];
	
    if($con2!=NULL)
	{
		
			include("movieslist.php");
		
	}
}
?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>