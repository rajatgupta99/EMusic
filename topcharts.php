<?php
extract($_POST);
include("admin\connect1.php");
 
$sel=mysqli_query($link,"select * from songs order by playcount desc limit 10");


?>



  <table width="1050" border="0" align="center" style="background:white; margin-top:15px; border-radius:10px; margin-left:30px">
    <tr>
      
    </tr>
    <tr>
      <td colspan="8" align="center" style="color:red; font-size:20px"><div align="center"><strong>TOP 10 CHARTS!</strong></div></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="160"><div align="center"><strong>S.No</strong></div></td>
      <td width="160"><div align="center"><strong>Song </strong></div></td>
      <td width="160"><div align="center"><strong>Movie</strong></div></td>
      <td width="160"><div align="center"><strong> Movie Cover </strong></div></td>
      <td width="160"><div align="center"><strong>Singers</strong></div></td>
      <td width="160"><div align="center"><strong>Lyrics</strong></div></td>
      <td width="160"><div align="center"><strong>Composer</strong></div></td>
      <td width="160"><div align="center"><strong>Play</strong></div></td>
       <tr>
     <td>&nbsp;</td>
     </tr>
      
    </tr>
    <?php
	if(mysqli_num_rows($sel)>0)
  {
		$i=1;
		
      while($arr=mysqli_fetch_array($sel))
      {
	   extract($arr);
	?>
   
    <tr>
      <td align="center"><?php echo $i; ?></td>
      <td align="center"><strong><?php echo $songname; ?></strong></td>
      <td align="center"><strong><?php echo $moviename; ?></strong></td>
      <?php
        $sell=mysqli_query($link,"select image from movies where moviename='$moviename'");
		
		while($arry=mysqli_fetch_array($sell))
		{
			extract($arry);
      ?>
      <td align="center"><img src="admin/<?php echo $image; ?>" style="width:80px; height:110px"></td>
      <?php
		}
		?>
      <td align="center"><?php echo $singers; ?></td>
      <td align="center"><?php echo $lyrics; ?></td>
      <td align="center"><?php echo $composer; ?> </td>
      <td> <audio controls> <source src="admin/<?php echo $song ?>" type="audio/mp3"></audio></td>
    </tr>
    
    <tr>
     <td>&nbsp;</td>
     </tr>
    <?php 
	$i++;
}
  }
  
else
{
	?>
	<tr>
	<td colspan="7" align="center" style="color:red"><strong> Sorry! There are no songs currently, please try again later </strong></td>
	</tr>
    
    <?php	
}
	
?>

  </table>
  
</div>
<p align="center" >&nbsp; </p>
<p align="center" >&nbsp;</p>
<p align="center" >&nbsp;</p>

</body>
</html>