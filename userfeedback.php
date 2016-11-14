<?php
error_reporting(0);
include("admin\connect1.php");
extract($_POST);

if(isset($submit))
{
	if($sel=mysqli_query($link,"insert into feedback values('','$name','$email','$feedback')"))
	{
		$msg="Thank you for your feedback, we will contact you if we need further details";
		
	}
	else
	{
		$msg="Sorry! There was some problem, please try again";
	}
}
	



?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Music Club</title>
<link href="css/style1.css" rel="stylesheet" type="text/css">
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
    <p style="color:red"><strong>We at Music Club love to hear about user experience and how we could improve to make our service better!
      
    </strong></p>
    <table width="621" border="0">
      <tr>
        <td height="30" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" colspan="2"><div align="center">
          <p><strong> Please feel free to drop us your honest feedback below</strong>        </p>
        </div></td>
      </tr>
      <tr>
        <td height="24" colspan="2"><div align="center"><strong>Note:</strong> Fields marked with an asterisk (<strong>*</strong>) are compulsory</div></td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="color:red;"><strong><?php echo $msg; ?></strong></td>
      </tr>
      <tr>
        <td width="112" height="27"><strong>Name*</strong></td>
        <td width="463"><input name="name" type="text" required id="name"></td>
      </tr>
      <tr>
        <td height="31"><strong>Email Id*</strong></td>
        <td><input name="email" type="email" required id="email"></td>
      </tr>
      <tr>
        <td><strong>Feedback*</strong></td>
        <td><textarea name="feedback" cols="40" rows="6" required id="feedback"></textarea></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="submit" id="submit" value="Submit">
        </div></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>