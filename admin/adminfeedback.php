<?php
extract($_POST);
include("connect1.php");

$sel=mysqli_query($link,"select * from feedback");



?>

  <div align="center">
    <p>&nbsp;</p>
    <div align="left">
      <table width="724" border="0">
        <tr>
          <td colspan="5"><div align="center" style="color:red;">
            <div align="center"><strong>User's Feedback</strong></div>
          </div></td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td width="97"><div align="center"><strong>S.No</strong></div></td>
          <td width="108"><div align="center"><strong>Name</strong></div></td>
          <td width="141"><div align="center"><strong>Email Id</strong></div></td>
          <td width="224" align="center"><strong>Feedback</strong></td>
          <td width="132"><div align="center"></div></td>
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
          <td align="center" style="font-size:15px"><?php echo $i; ?></td>
          <td align="center" style="font-size:15px"><?php echo $name; ?></td>
          <td align="center" style="font-size:15px"><?php echo $email; ?></td>
          <td align="center" style="font-size:15px"><?php echo $feedback; ?></td>
          <td align="center" style="font-size:15px"><form id="form1" name="form1" method="post">
            <input type="submit" name="delete" id="delete" value="Delete">
          </form></td>
        </tr>
        
        <?php
   $i++;
}
}
else
{
?>
  <tr>
  <td colspan="5" align="center"><strong>There are no feedback's</strong></td>
  </tr>
  <?php 
}
?>
        
        </table>
    </div>
</div>

<?php
if(isset($delete))
{
	if(mysqli_query($link,"delete from feedback where name='$name' && email='$email' && feedback='$feedback'"))
	{
		echo "<script>alert('Feedback has been sucessfully deleted');
		location.href='home.php'</script>";	
	}
}
?>