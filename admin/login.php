<?php
error_reporting(0);
include("connect1.php");
extract($_POST);

if(isset($login))
{
	$sel=mysqli_query($link,"select username,password,name from admin where username='$username' and password='$password'");
	$arr=mysqli_fetch_array($sel);
	if($username==$arr['username'] and $password==$arr['password'])
	{
		session_start();
		$_SESSION['username']=$arr['username'];
		$_SESSION['name']=$arr['name'];
		$name=$_SESSION['name'];
		$username=$_SESSION['username'];
		header("location:home.php");
	}
	else
	{
		$msg="Entered details are not correct!";
	}
}
		

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>

<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{margin-left:0px; margin-right:10px;font-family: 'Raleway', sans-serif}
</style>

</head>

<body>
<form id="form1" name="form1" method="post" style="background:#C33">
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="341" border="0">
      <tr>
        <td colspan="2"><div align="center" style="color:white">Welcome! Please enter your details to Log In</div></td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="color:white"><?php echo $msg ?></td>
      </tr>
      <tr>
        <td width="69" style="color:white">Username*</td>
        <td width="227"><input name="username" type="text" required id="username"></td>
      </tr>
      <tr>
        <td style="color:white">Password*</td>
        <td><input name="password" type="password" required id="password"></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="login" id="login" value="Log In">
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>