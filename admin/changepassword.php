<?php
include("connect1.php");
extract($_POST);
session_start();
$username=$_SESSION['username'];

if(isset($submit))
{
	$fetching=mysqli_query($link,"select password from admin where username='$username'");
	$arr=mysqli_fetch_array($fetching);
	
	if($oldpassword==$arr['password'])
	{
		if($newpassword==$confirmpassword)
		{
			if(mysqli_query($link,"update admin set password='$newpassword' where username='$username'"))
			{
			$msg="Password has been sucessfully updated";
			}
		}
		else
		{
			$msg="New password and Confirm Password does not match";
		}
	}
	else
	{
		$msg="Old password does not match the current password";
	}
	
}




?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{margin-left:0px; margin-right:10px;font-family: 'Raleway', sans-serif}
</style>
</head>

<body>

<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <div align="center">
    <table width="459" border="0">
      <tr>
        <td colspan="2" style="font-size:15px"><div align="center"><strong>Please enter your details below to change your current password</strong></div></td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:15px"><div align="center"><strong>Note:</strong> Fields marked with asterisk (<strong>*</strong>) are compulsory </div></td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="color:red; font-size:15px"><?php echo $msg; ?></td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:15px">&nbsp;</td>
      </tr>
      <tr>
        <td width="141" style="font-size:15px"><strong>Old Password*</strong></td>
        <td width="315"><input type="password" name="oldpassword" id="oldpassword"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>New Password*</strong></td>
        <td><input type="password" name="newpassword" id="newpassword"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Confirm Password*</strong></td>
        <td><input type="password" name="confirmpassword" id="confirmpassword"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="submit" id="submit" value="Change Password">
        </div></td>
      </tr>
    </table>
  </div>
</form>

</body>