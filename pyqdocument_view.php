<?php 
session_start();
?>


<?php
include('header1.php')
 ?>    
 <title>Notes</title>
<section id="about">
   <h1 style="border-bottom:1px solid blue;" class="section-heading mb75px ">
                <span>
                    <i class="far fa-sticky-note"></i>
                </span>
                <span > Question Papers Found </span>
    </h1>
<?php

$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
	if($con){ echo"";}	else{echo "<br>no connection to server";}
     
     
	
        
echo "<div id=\"contact-form-container\">";         
if(isset($_GET['nid']))
{
$x=mysqli_query($con,"select * from pyq where id='{$_GET['nid']}' ");
if(!$x){echo "error-1";}
else
{
	$c=mysqli_num_rows($x);
	if($c==1)
	{
		$yx1=mysqli_fetch_assoc($x);	
		echo "<b style=\"font-size:22px;\"> > {$yx1['name']} > {$yx1['title']} </b> 
		<a href=\"pyqdocument_view.php\" > (back) </a>
		 <hr>";
		
		$i=1; 
		echo "<table id=\"contact-form\"  border=\"1\" style=\" width:680px;\"> 
		<tr style=\"font-weight:600;\"><td>Detailed Description: {$yx1['others']}</td></tr>
		<tr><td> <br><a href=\"doc/{$yx1['name']}\" target=\"_blank\"> Download PDF </a>    <br>  <br> <embed src=\"doc/{$yx1['name']}\" type=\"application/pdf\" width=\"100%\" height=\"1000px\" /><br>";
					
	echo "</td></tr></table><br><a href=\"pyqdocument_view.php\" > back</a><HR>";
	
	}else { echo"No Previous Papers Uploaded till Now";}
}

}


	
else if(isset($_POST['std_sem']))
{
  $semester=$_POST['std_semester'];
	// all  Notes uploaded. 
echo "<h6>  Uploaded Tutorial of the $semester Semester  </h6>";
$x=mysqli_query($con,"select * from pyq where sem=$semester");
if(!$x){echo "error-1";}
else
{
	$c=mysqli_num_rows($x);
	if($c>0)
	{	
		$i=1; 
                
		echo "<table id=\"contact-form\" border=\"1\" style=\"margin-left:-2.5rem;text-align:center; width:680px;\"> 
		<tr style=\"font-weight:600;\"><td>S. No.</td>
		<td>Subject  </td>
		<td>File Name</td>
                
		<td>View Paper</td>
                <td>Hints Link</td>
		
		 <tr>";
		while($yx1=mysqli_fetch_assoc($x))
			{ 
			echo"<tr><td>{$i}.</td><td>{$yx1['title']} </td> <td>{$yx1['name']} </td> <td><a href=\"pyqdocument_view.php?nid={$yx1['id']}\"> open </a></td> <td><a href=\"{$yx1['tutoriallink']}\" \" target= \"_blank\">Click</a></td>";
			echo "<tr>";
			$i++;
			}
			
	echo "</table><br>";
	}
	else { echo "No Previous Papers Uploaded till Now";}
}
	
	
}

else
{
// all  Notes uploaded. 
echo "<h6> Uploaded Question Papers <h6>";
$x=mysqli_query($con,"select * from pyq");
if(!$x){echo "error-1";}
else
{
	$c=mysqli_num_rows($x);
	if($c>0)
	{	
		$i=1; 
                
		echo "<table id=\"contact-form\" border=\"1\" style=\"margin-left:-2.5rem; text-align:center; width:680px;\"> 
		<tr style=\"font-weight:600;\"><td>S. No.</td>
		<td>Subject  </td>
		<td>File Name</td>
                
		<td>View Paper</td>
                <td>Hints Link</td>
               
		
		 <tr>";
		while($yx1=mysqli_fetch_assoc($x))
			{ 
			echo"<tr><td>{$i}.</td><td>{$yx1['title']} </td> <td>{$yx1['name']} </td> <td><a href=\"pyqdocument_view.php?nid={$yx1['id']}\"> open </a></td> <td><a href=\"{$yx1['tutoriallink']} \" target= \"_blank\">Click</a></td>";
			echo "<tr>";
			$i++;
			}
			
	echo "</table><br>";
	}
	else { echo "No Previous Papers Uploaded till Now";}
}
}



	?>
         <button style="background-color:orange;" class="sub-btn" type="submit"><a style=\"font-color:white;text-decoration:none;font-size:20px;\" href="pyqhome.php">Back</a></button>
         <br>
 </div>
 </section>
        
        <?php
include('footer1.php')
 ?>       
    
