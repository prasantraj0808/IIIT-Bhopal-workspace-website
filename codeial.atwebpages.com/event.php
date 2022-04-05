<?php 
session_start();
?>

<head><title> New Registration |  </title></head>
<?php include('header.php') ?>

<div>

<?php

$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
if($con){ echo"";}	else{echo "<br>no connection to server";}
        

if(isset($_GET['mid']))
{
$x=$_GET['mid'];
$query=mysqli_query($con,"select * from new_event where id=$x");
$row=mysqli_fetch_assoc($query);
	echo "<form action=\"event.php\" method=\"POST\">";
	echo "<input type=\"\" name=\"type\" style=\"width:220px;\" value=\"{$row['type']}\"/><br>";
	echo "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\"/>";
	echo "<textarea rows=\"3\" cols=\"55\" name=\"data0\" >{$row['data0']}</textarea><br>";
	echo "<textarea rows=\"23\" cols=\"75\" name=\"data\" >{$row['data']}</textarea>";
	echo "<br><input type=\"submit\" name=\"okedit\" value=\"save\"/>";
	echo "<input type=\"submit\" style=\"float:right;\" name=\"okdelete\" value=\"delete\"/>";
	echo "<a href=\"event.php\" style=\"margin-left:80px;\"><input type=\"button\" value=\"Back\"></a>";
	echo"</form>";
} 
else if(isset($_POST['okedit']))
{
	$xx=$_POST['id'];
	$xy=$_POST['type'];
	$xz=$_POST['data0'];
	$zz=$_POST['data'];
$query=mysqli_query($con,"UPDATE new_event SET type='{$xy}',data0='{$xz}', data='{$zz}' WHERE id={$xx}");
//header('Location: event.php');
echo "<h3>Action Completed .</h3><a href=\"event.php\" style=\"\" ><input type=\"button\" value=\"Back\"> </a>";

} 
else if(isset($_GET['yate']))
{
  if(isset($_SESSION['name'])){
		
  echo"<div style=\"    \"><h2>Upload news</h2>";	
  echo"<form action=\"event.php\" method=\"POST\" >";

  echo"<input type=\"text\" name=\"title\" style=\"width:220px;\" value=\"\" />";
  echo"<label> title</label><br/><br/>";

  echo"<textarea rows=\"2\" cols=\"55\" name=\"data0\" ></textarea>";
  echo"<label>write Heading of Post </label><br/><br/>";


  echo"<textarea rows=\"15\" cols=\"75\" name=\"data\" ></textarea>";
  echo"<label>Write your full Post</label><br/><br/>";

  echo"<input type=\"submit\"  name=\"upload\" value=\"upload\"/>";

  echo"</form>";
  echo"";
  echo "<a style=\"float:right; margin-top:-30px;\" href=\"event.php\"><input type=\"button\" value=\"Back\"></a>";
  echo"</div>";	               
  }
}
else if(isset($_POST['upload']))
	{
	echo"<div style=\"padding-left:40px; width:400px; \">";	
	$title=$_POST['title'];
	$cost0=$_POST['data0'];
	$cost=$_POST['data'];
	$query11=mysqli_query($con,"insert into  new_event(type,data0,data)value('{$title}','{$cost0}','{$cost}')");
echo "<h3>your Post is uploaded .</h3><a href=\"event.php\" style=\"\" ><input type=\"button\" value=\"Back\"> </a>";	
echo"</div>";
}




else if(isset($_POST['okdelete']))

{
	$x=$_POST['id'];
$query=mysqli_query($con,"DELETE FROM new_event WHERE id={$x}");
//header('Location: event.php');
echo "<h3>Action Completed .</h3><a href=\"event.php\" style=\"\" ><input type=\"button\" value=\"Back\"> </a>";	
}
        
        
else {

$output=mysqli_query($con,"select * from new_event order by id DESC");
$z=1;
echo"<table border=\"1\" width=\"1000\"><tr> <td width=\"15\" align=\"left\"  ><b>S.No.</b></td>  <td  align=\"left\" width=\"100\" ><b></b></td><td width=\"400\" align=\"center\" ><b></b> </td><td width=\"100\" align=\"center\" ><b></b></td></tr>"; 
while(($row=mysqli_fetch_assoc($output)))
{
	echo "<tr><td align=\"left\"  ><b>{$z} )</b></td><td align=\"left\">";
	echo"{$row['type']} </td> <td align=\"left\" >{$row['data0']}</td><td align=\"left\" >{$row['data']}</td><td align=\"left\" >";
	
	if(isset($_SESSION['active'])&&($_SESSION['active']=='fac_login')){
	echo "<a style=\" float:middle;\" href=\"event.php?mid={$row["id"]}\" style=\"\"><input type=\"button\" value=\"Edit\"></a>";
	}
        $z++;
}
	
echo"</table>";

	if(isset($_SESSION['active'])&&($_SESSION['active']=='fac_login')){
	echo "<br><a href=\"event.php?yate\"><input type=\"button\" value=\"Submit New Event\"></a><br>";
	}
	

 }

?>	

 </div>
 <p></p>

</div>
	
</div>

<?php include('footer.php') ?>