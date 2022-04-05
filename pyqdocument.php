<?php 
session_start();
?>
<?php
include('header1.php')
 ?> 

<div>

<?php

$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
	if($con){ echo"";}	else{echo "<br>no connection to server";}
	
	

if(isset($_POST['submit_doc']))
{
$title=$_POST['title'];
$others=$_POST['others'];
$link=$_POST['tutoriallink'];
$semester=$_POST['std_semester'];

	
if(($_FILES["file"]["type"] == "application/pdf" )||($_FILES["file"]["type"] == "application/msword" ))   
  {
  
		if(($_FILES["file"]["size"] > 0) && ($_FILES["file"]["size"] < 120015700 ))
		{
  
  if($_FILES["file"]["error"]>0)
    {
	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	echo"<a href=\"pyqdocument_form.php\"><input type=\"button\" value=\"Back\"></a>"; 
    }
  else
    {
$string=$_FILES["file"]["name"]; // iiit bhopL ASSIGNMENT.PDF   --> iiit-bhopal-ASSIGNMENT.PDF
$aa = str_replace(' ', '-', $string);

//echo $aa;

$query="select * from pyq where name='$aa' ";
$xxy=mysqli_query($con,$query);
$rr=mysqli_num_rows($xxy);
//echo "total assn=".$rr;
if($rr>0){
	echo  "<h3>This Tutorial Notes [ {$_FILES["file"]["name"]} ] is already exists in the server.<br> if you want to re-upload please change file name. </h3> <a href=\"document_form.php\">Back</a><br><br>"; 
	}
else{
		move_uploaded_file($_FILES["file"]["tmp_name"],"pyq/" .$aa);
		echo "Document File Uploaded Successful. ";		
				
$date=date("d-m-Y");	 
$query="insert pyq (name,title,others,tutoriallink,sem,date) values('$aa','$title','$others','$link','$semester','$date')"; //www.abc.com/doc/iiit-bhopal-ASSIGNMENT.PDF
$x=mysqli_query($con,$query);
if(!$x){echo "error-1";}
else{echo"<br><a href=\"pyqdocument_form.php\"><input type=\"button\" value=\"Back\"></a>"; }
  	}
	}
	}
	else {echo "File size must less then 1000 KB.  go back and try again.";
	echo"<br><a href=\"pyqdocument_form.php\"><input type=\"button\" value=\"Back\"></a>"; 
	}
	} 
else 
	{	print_r($_FILES);
	echo "<br>pdf file formate incorrect. go back and try again.";
	echo"<br><a href=\"pyqdocument_form.php\"><input type=\"button\" value=\"Back\"></a>"; 
	}
}



	?>
	
	</div>

<?php
include('footer1.php')
 ?> 