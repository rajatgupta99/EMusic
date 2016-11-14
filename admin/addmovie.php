<?php
error_reporting(0);
include("connect1.php");
extract($_POST);
session_start();
$username=$_POST['username'];
$fn=$_FILES['image']['name'];
$path="movies/$moviename/$fn";


if(isset($addmovie))
{
	if(mysqli_query($link,"insert into movies values('$moviename','$year','$director','$producer','$actors','$path')"))
	{
		mkdir("movies/$moviename");
		mkdir("music/audio/$moviename");
		mkdir("music/video/$moviename");
		
		move_uploaded_file($_FILES['image']['tmp_name'],"movies/$moviename/$fn");
		
		$sel=mysqli_query($link,"select image from movies where moviename='$moviename'");
        $array=mysqli_fetch_array($sel);
        $imagepath=$array['image'];

		include("movieuploaded.php?");
		
	}
	else
	{
		$msg="Please try again";
	}
}



?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Movie</title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{margin-left:0px; margin-right:10px;font-family: 'Raleway', sans-serif}
</style>
<style type="text/css">
</style>
</head>

</body>

<form action="" method="post" enctype="multipart/form-data" name="form1">
  <div align="center">
    <p>&nbsp;</p>
    <table width="418" border="0">
      <tr>
        <td colspan="2" style="font-size:15px"><div align="center"><strong>Please enter the details below to add the movie</strong></div></td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:15px"><div align="center">Fields marked with an asterisk (<strong>*</strong>) are compulsory</div></td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="font-size:15px"><strong>Note:</strong> Please do no add the following characters to the movie name:  <span style="color:red"><strong> \ / : * ? " < > | </strong></span></td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="font-size:15px; color:red" ><?php echo $msg ?></td>
      </tr>
      <tr>
        <td width="108" style="font-size:15px"><strong>Movie Name*</strong></td>
        <td width="300"><input name="moviename" type="text" required id="moviename"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Year*</strong></td>
        <td><input name="year" type="text" required id="year"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Director*</strong></td>
        <td><input name="director" type="text" required id="director"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Producer*</strong></td>
        <td><input name="producer" type="text" required id="producer"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Actors*</strong></td>
        <td><input name="actors" type="text" required id="actors"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Image*</strong></td>
        <td><input name="image" type="file" required id="image"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td> 
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="addmovie" id="addmovie" value="Add Movie">
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</form>

</body>