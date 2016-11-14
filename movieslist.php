<?php
extract($_POST);

include("admin\connect1.php");
$sel=mysqli_query($link,"select * from movies where moviename like '$con2%'");
session_start();


if(isset($viewsongs))
{
	include("moviesongs.php");
	$_SESSION['moviename']=$moviname;
}


?>
<table style="margin-top:10px">
<tr>
<?php
$i=1;

if(mysqli_num_rows($sel)>0) //if loop start
	   { 
		while($arr=mysqli_fetch_array($sel))  //while loop start
		{
			extract($arr);
            $moviename=$arr['moviename'];
			
?>
<td>
<table width="477" border="0" style="margin-left:20px; margin-top:12px">
  <tr>
  
      <td width="147" rowspan="6"><img src="admin/<?php echo $image; ?>" style="width:130px; height:180px"></td>
      <td width="120"><strong>Movie Name:</strong></td>
      <td width="196"><strong><?php echo $moviename ?></strong></td>
  </tr>
    <tr>
      <td><strong>Year:</strong></td>
      <td><?php echo $year ?></td>
    </tr>
    <tr>
      <td><strong>Director:</strong></td>
      <td><?php echo $director ?></td>
    </tr>
    <tr>
      <td><strong>Producer:</strong></td>
      <td><?php echo $producer ?></td>
    </tr>
    <tr>
      <td><strong>Actors:</strong></td>
      <td><?php echo $actors ?></td>
    </tr>
    <tr>
     <!--<td colspan="2" align="center" style="color:#303"><strong><p><a href="?con=mov&conname= <?php echo $con2 ?>&movienam= <?php echo $moviename ?>&consongs=moviesongs">View Songs </a>| View Videos </p></strong></td>-->
    <td colspan="2"><form id="form1" name="form1" method="post">
      <div align="center">
        <input type="submit" name="viewsongs" id="viewsongs" value="View Songs" style="padding:3px; background-color:#633; color:white;">
        <input type="submit" name="viewvideos" id="viewvideos" value="View Videos" style="padding:3px">
      </div>
    </form></td> 
    </tr>
  
</table>
 
</td>

 <?php
 
      if($i%2==0)
      {
	     echo "</tr><tr>"; 
      }
        $i++;
		
	   } //while lop closing
	 } //if loop closing
	   /*elseif(isset($_REQUEST['movienam']))
	   {
		   $consongsnew=$_REQUEST['movienam'];
		  
		  if($consongsnew!=NULL)
		  {
		  include("moviesongs.php");
		  //$moviename=$_GET['moviename'];
		  //$_SESSION['moviename']=$moviename;
		  }
	   }*/
	   
	   else
	   {
		   ?>
           <tr>
           <td colspan="2">
           <p style="color:red;  margin-top:60px"><strong> Sorry! There are no movies based on your request. </strong></p></td></tr>
           <?php
	   }
?>
</tr>	
	   
</table>

	