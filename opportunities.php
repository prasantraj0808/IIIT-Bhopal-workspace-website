<?php 
session_start();
?>
<title>IIIT Bhopal | Jobs</title>
<?php include('header1.php') ?>

<section id="skills">
            <h1 class="section-heading mb75px ">
                <span>
                     <i class="fas fa-briefcase"></i>
                </span>
                <span> Jobs </span>
            </h1>

<?php

$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
if($con){ echo"";}	else{echo "<br>no connection to server";}
        

if(isset($_GET['mid']))
{
$x=$_GET['mid'];
echo "$x";
$query=mysqli_query($con,"select * from opportunities where id=$x");
$row=mysqli_fetch_assoc($query);
	echo "<form class=\"w3-panel w3-card-4\" action=\"opportunities.php\" method=\"POST\">";
        
        echo "<input type=\"hidden\" name=\"id\" value=\"{$row['id']}\"/>";
	echo "<input type=\"text\" name=\"company\" style=\"width:220px;\" value=\"{$row['CompanyName']}\"/><br>";
        echo "<input type=\"text\" name=\"position\" style=\"width:220px;\" value=\"{$row['Position']}\"/><br>";
        echo "<input type=\"url\" name=\"link\" style=\"width:220px;\" value=\"{$row['link']}\"/><br>";
        echo "<input type=\"text\" name=\"batches\" style=\"width:220px;\" value=\"{$row['batches']}\"/><br>";
	echo "<input type=\"datetime\" name=\"deadline\" value=\"{$row['deadline']}\"/>";
	
        
        
	echo "<br><input type=\"submit\" name=\"okedit\" value=\"Save\"/>";
        
	echo "<input type=\"submit\" style=\"float:right;\" name=\"okdelete\" value=\"delete\"/>";
	echo "<a href=\"opportunities.php\" style=\"margin-left:10px;\"><input type=\"button\" value=\"Back\"></a>";
	echo"</form>";
} 
else if(isset($_POST['okedit']))
{
	$xx=$_POST['id'];
        
        $company=$_POST['company'];
        $position=$_POST['position'];
        $link=$_POST['link'];
        $batches=$_POST['batches'];
        $deadline=$_POST['deadline'];
        
$query=mysqli_query($con,"UPDATE opportunities SET CompanyName='{$company}', Position='{$position}', link='{$link}',batches='{$batches}',deadline='{$deadline}' WHERE id={$xx}");
//header('Location: event.php');
echo "<h3>Action Completed .</h3><a href=\"opportunities.php\" style=\"\" ><input type=\"button\" value=\"Back\"> </a>";

} 
else if(isset($_GET['yate']))
{
  if(isset($_SESSION['name'])){
		
  echo"<div style=\"    \"><h2>Add Opportunity</h2>";	
  echo"<form class=\"w3-panel w3-card-4\" action=\"opportunities.php\" method=\"POST\" >";

  echo"<input type=\"text\" name=\"company\" style=\"width:220px;\"/ required>";
  echo"<label> Company Name : </label><br/><br/>";
  
  echo"<input type=\"text\" name=\"position\" style=\"width:220px;\"/ required>";
  echo"<label> Position : </label><br/><br/>";
  
  echo"<input type=\"url\" name=\"link\" style=\"width:220px;\"/ required>";
  echo"<label> Apply link : </label><br/><br/>";
  
  echo"<input type=\"text\" name=\"batches\" style=\"width:220px;\"/required>";
  echo"<label> Eligible Batches : </label><br/><br/>";
  
  echo"<input type=\"datetime-local\" name=\"deadline\" style=\"width:220px;\"/ required>";
  echo"<label> Deadline : </label><br/><br/>";
  
  echo"<input type=\"submit\"  name=\"upload\" value=\"Add\"/>";

  echo"</form>";
  echo"";
  echo "<a style=\"float:right; margin-top:-30px;\" href=\"opportunities.php\"><input type=\"button\" value=\"Back\"></a>";
  echo"</div>";	               
  }
}
else if(isset($_POST['upload']))
	{
	echo"<div style=\"padding-left:40px; width:400px; \">";	
	
        $company=$_POST['company'];
        $position=$_POST['position'];
        $link=$_POST['link'];
        $batches=$_POST['batches'];
        $deadline=$_POST['deadline'];
        $admin = $_SESSION['email'];
        
	$query11=mysqli_query($con,"INSERT INTO `opportunities` (`CompanyName`, `Position`, `link`, `batches`, `deadline`,`admin`) VALUES ('{$company}', '{$position}', '{$link}', '{$batches}', '{$deadline}','{$admin}')");
        
        
      echo "<h3>Thanks ! You have successfully added an opportunity for our Students.</h3><a href=\"opportunities.php\" style=\"\" ><input type=\"button\" value=\"Back\"> </a>";	
      echo"</div>";
}




else if(isset($_POST['okdelete']))

{
	$x=$_POST['id'];
$query=mysqli_query($con,"DELETE FROM opportunities WHERE id={$x}");


echo "<h3>Action Completed .</h3><a href=\"opportunities.php\" style=\"\" ><input type=\"button\" value=\"Back\"> </a>";	
}
        
        
else {

$output=mysqli_query($con,"select * from opportunities order by id DESC");
$z=1;
echo"<table border=\"1\" width=\"100%\"><tr> <td width=\"5%\" align=\"center\"  ><b>S.No.</b></td>  <td  align=\"center\" width=\"20%\" ><b>Company Name</b></td>  <td width=\"20%\" align=\"center\" ><b>Position</b> </td>   <td width=\"10%\" align=\"center\" ><b>Links</b></td>  <td width=\"10%\" align=\"center\"><b>Batches</b></td> <td width=\"10%\" align=\"center\"><b> Deadline</b> </td>  </tr>"; 
while(($row=mysqli_fetch_assoc($output)))
{
	echo "<tr><td align=\"left\"  ><b>{$z} )</b></td>";
        echo "<td> {$row['CompanyName']}</td> <td> {$row['Position']} </td> <td><a href=\"{$row['link']}\"> Apply Now </a></td>";
        echo "<td> {$row['batches']} </td> <td> {$row['deadline']} </td>";
        
        
	
	if(isset($_SESSION['active'])&&($_SESSION['active']=='fac_login')){
	echo "<td><a style=\" float:middle;\" href=\"opportunities.php?mid={$row['id']}\" style=\"\"><input type=\"button\" value=\"Edit\"></a></td>";
	}
        
        echo "</tr>";
        $z++;
}
	
echo"</table>";

	if(isset($_SESSION['active'])&&($_SESSION['active']=='fac_login')){
	echo "<br><a href=\"opportunities.php?yate\"><input type=\"button\" value=\"Add jobs\"></a><br>";
	}
	

 }
 
?> 
 </section>

 
 <?php include('footer1.php') ?>
   