<?php 
session_start();
?>
<title>Study Notes</title>
<?php include('header1.php') ?>

<section id="about">
   <h1 style="border-bottom:1px solid blue;" class="section-heading mb75px ">
                <span>
                    <i class="far fa-sticky-note"></i>
                </span>
                <span > Uploaded Notes </span>
    </h1>
<?php

$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
	if($con){ echo"";}	else{echo "<br>no connection to server";}
        
// echo"$_SESSION['email']";
	
if(isset($_GET['nid']))
{
$x=mysqli_query($con,"select * from notes where id='{$_GET['nid']}' ");
if(!$x){echo "error-1";}
else
{
	$c=mysqli_num_rows($x);
	if($c==1)
	{
		$yx1=mysqli_fetch_assoc($x);	
		echo "<b style=\"font-size:22px;\"> > {$yx1['name']} > {$yx1['title']} </b> 
		<a href=\"document_view.php\" > (back) </a>
		 <hr>";
		
		$i=1; 
		echo "<table border=\"1\" style=\" width:800px;\"> 
		<tr><td>Detailed Description: {$yx1['others']}</td></tr>
              
		<tr><td> <br><a href=\"doc/{$yx1['name']}\" target=\"_blank\"> Download PDF </a>    <br>  <br> <embed src=\"doc/{$yx1['name']}\" type=\"application/pdf\" width=\"100%\" height=\"1000px\" /><br>";
					
	echo "</td></tr></table><br><a href=\"document_view.php\" > back</a><HR>";
	
	}else { echo "Oops! No Tutorial Documents Uploaded till Now. Be the First to Contribute!";}
}

}


	
else{
	// all  Notes uploaded. 
echo "<b> All Uploaded Document till Now </b><hr>";
$x=mysqli_query($con,"select * from notes");
if(!$x){echo "error-1";}
else
{
	$c=mysqli_num_rows($x);
	if($c>0)
	{	
		$i=1; 
		echo "<table id=\"contact-form\" border=\"1\" style=\"margin-left:-4rem;text-align:center; width:750px;\"> 
		<tr style=\"font-weight:600;\"><td>S.No.</td>
		<td>Title  </td>
		<td>Notes File Name</td>
		<td>#</td>
		
		 <tr>";
		while($yx1=mysqli_fetch_assoc($x))
			{ 
			echo"<tr><td>{$i}.</td><td>{$yx1['title']} </td> <td>{$yx1['name']} </td> <td><a href=\"document_view.php?nid={$yx1['id']}\"> open </a></td>";
			echo "<tr>";
			$i++;
			}
			
	echo "</table><br>";
	}
	else { echo "Oops! No Tutorial Documents Uploaded till Now. Be the First to Contribute!";}
}
	
	
}

if(isset($_SESSION['email']))
{
  echo"<button style=\"background-color:orange; font-size:20px;\" name=\"submit_doc\" class=\"sub-btn\" type=\"submit\"><a style=\"color:white;font-size:18px;text-decoration:none;\"href=\"document_form.php\">Add Notes</a></button>";
}

?>

 </section>


<?php include('footer1.php') ?>