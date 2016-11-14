<?php
extract($_POST);


if(isset($login))
{
   
	header("location:login.php");
	
}


	

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logged Out</title>

<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{margin-left:0px; margin-right:10px;font-family: 'Raleway', sans-serif}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" style="background-color:#09C">
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="306" border="0">
      <tr>
        <td width="256"><div align="center" style="color:white">Thank you for visiting!</div></td>
      </tr>
      <tr>
        <td><div align="center" style="color:white">You have been sucessfully logged out</div></td>
      </tr>
      <tr>
        <td><div align="center">
          <input type="submit" name="login" id="login" value="Log In">
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div align="center"></div>
</form>
<p>&nbsp;</p>
</body>
</html>