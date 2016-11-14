<?php
extract($_POST);
include("connect1.php");
session_start();
$username=$_SESSION['username'];
$fn=$_FILES['song']['name'];
if($type=="audio")
{
$path="music/audio/$moviename/$fn";
}
if($type=="video")
{
$path="music/video/$moviename/$fn";	
}


if(isset($addmoviesong))
{
	/*$check=mysqli_query($link,"select songname from songs where moviename='$moviename'");
	$array=mysqli_fetch_array($check);
	$array['songname']=$songnamecheck;
	
	if($songname==$songnamecheck)
	{
		$msg="";
	}
	else
	{*/
		
		if(mysqli_query($link,"insert into songs values('$moviename','$songname','$path','$type','$singers','$lyrics','$composer')"))
		{
			$msg="$songname has been sucessfully added to $moviename";
			if($type=="audio")
			{
			move_uploaded_file($_FILES['song']['tmp_name'],"music/audio/$moviename/$fn");
			}
			if($type=="video")
			{
			move_uploaded_file($_FILES['song']['tmp_name'],"music/video/$moviename/$fn");
			}
		}
		else
		{
		$msg="The song is already available";
		}
	}
	
//}

		
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Song</title>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
body{margin-left:0px; margin-right:10px;font-family: 'Raleway', sans-serif}
</style>
<style type="text/css">
</style>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div align="center">
    <p>&nbsp;</p>
<table width="473" border="0">
      <tr>
        <td colspan="2" style="font-size:15px"><div align="center"><strong>Enter the details below to add the song</strong></div></td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:15px"><div align="center"><strong>Note:</strong> Fields marked with an asterisk (<strong>*</strong>) are compulsory</div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" style="color:red"><?php echo $msg; ?></div>          </td>
      </tr>
      <tr>
        <td width="113" style="font-size:15px"><strong>Movie Name*</strong></td>
        <td width="379"><select name="moviename" required id="moviename">
        <?php
		$grab=mysqli_query($link,"select moviename from movies");
        while($moviearray=mysqli_fetch_array($grab))
		{
			extract($moviearray);
         ?>
        <option value="<?php echo $moviename ?>"> 
		
		<?php echo $moviename ?>
        
        </option> 
		<?php 
		} 
		?>
        </select></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Song Name *</strong></td>
        <td><input name="songname" type="text" required id="songname"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Song*</strong></td>
        <td><input name="song" type="file" required id="song"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Type*</strong></td>
        <td><select name="type" required id="type">
          <option value="audio">Audio</option>
          <option value="video">Video</option>
        </select></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Singers*</strong></td>
        <td><input name="singers" type="text" required id="singers"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Lyrics*</strong></td>
        <td><input name="lyrics" type="text" required id="lyrics"></td>
      </tr>
      <tr>
        <td style="font-size:15px"><strong>Composer*</strong></td>
        <td><input name="composer" type="text" required id="composer"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="addmoviesong" id="addmoviesong" value="Add Song">
        </div></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>