<?php
extract($_POST);
include("admin\connect1.php");
 
$sel=mysqli_query($link,"select * from songs");


?>



  <table width="1050" border="0" align="center" style="background-color: #FCEBB6; margin-top:15px; border-radius:10px; margin-left:20px">
    <tr>
      
    </tr>
    <tr>
      <td colspan="7">&nbsp;</td>
    </tr>
    <tr>
      <td width="160"><div align="center"><strong>S.No</strong></div></td>
      <td width="160"><div align="center"><strong>Song </strong></div></td>
      <td width="160"><div align="center"><strong>Movie</strong></div></td>
      <td width="160"><div align="center"><strong>Singers</strong></div></td>
      <td width="160"><div align="center"><strong>Lyrics</strong></div></td>
      <td width="160"><div align="center"><strong>Composer</strong></div></td>
      <td width="160"><div align="center"><strong>Play</strong></div></td>
      
      
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
      <td align="center"><?php echo $moviename; ?></td>
      <td align="center"><?php echo $singers; ?></td>
      <td align="center"><?php echo $lyrics; ?></td>
      <td align="center"><?php echo $composer; ?> </td>
      <td> <audio controls> <source src="admin/<?php echo $song ?>" type="audio/mp3"></audio></td>
      
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