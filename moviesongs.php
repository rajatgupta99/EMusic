<?php

include("admin\connect1.php");
extract($_POST);
session_start();
$movienam=$_GET['movienam'];
//$newname= "$movienam";

//$_SESSION['moviename']=$movinam;
$movienew=$_SESSION['moviename'];
 
$sel=mysqli_query($link,"select songname,song,singers,lyrics,composer from songs where moviename='$movienew'");


?>



  <table width="1050" border="0" align="center" style="background-color: #F6E4CC; margin-top:15px; border-radius:10px; ">
    <tr>
      <td colspan="8"><div align="center"><strong>Movie:<span style="color:red"><?php echo $movienew; ?></span></strong></div></td>
    </tr>
    <tr>
      <td colspan="7">&nbsp;</td>
    </tr>
    <tr>
      <td width="160"><div align="center"><strong>S.No</strong></div></td>
      <td width="160"><div align="center"><strong>Song </strong></div></td>
      <td width="160"><div align="center"><strong>Singers</strong></div></td>
      <td width="160"><div align="center"><strong>Lyrics</strong></div></td>
      <td width="160"><div align="center"><strong>Composer</strong></div></td>
      <td width="160"><div align="center"><strong>Play</strong></div></td>
      <td width="160"><div align="center"><strong>Download</strong></div></td>
      
    </tr>
    <?php
	
	
	if(mysqli_num_rows($sel)>0)
	{
		$i=1;
      while($arrsongs=mysqli_fetch_array($sel))
      {
	   extract($arrsongs);
	?>
    <tr>
      <td align="center"><?php echo $i; ?></td>
      <td align="center"><?php echo $songname; ?></td>
      <td align="center"><?php echo $singers; ?></td>
      <td align="center"><?php echo $lyrics; ?></td>
      <td align="center"><?php echo $composer; ?> </td>
      <td> <audio controls> <source src="admin/<?php echo $song ?>" type="audio/mp3"></audio></td>
      <td></td>
    </tr>
    <?php 
	$i++;
}
	
	}
   

else 
  {
	?>
    <tr>
    <td colspan="7" align="center" style="color:black"> Sorry! There are no songs of <span style="color:red"><?php echo $movienew ?></span> currently, please try again later. </td>
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