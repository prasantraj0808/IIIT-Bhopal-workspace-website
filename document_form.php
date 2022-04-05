<?php 
session_start();
?>
<title>Notes</title>
<?php include('header1.php') ?>


<section id="about">
   <h1 style="border-bottom:1px solid blue;" class="section-heading mb75px ">
                <span>
                    <i class="far fa-sticky-note"></i>
                </span>
                <span > Upload Notes </span>
    </h1>

<?php

$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
	if($con){ echo"";}	else{echo "<br>no connection to server";}
        
	
if(isset($_POST['submit_doc']))
{
$title=$_POST['title'];
$others=$_POST['others'];

	
if(($_FILES["file"]["type"] == "application/pdf" )||($_FILES["file"]["type"] == "application/msword" ))   
  {
  
		if(($_FILES["file"]["size"] > 0) && ($_FILES["file"]["size"] < 120015700 ))
		{
  
  if($_FILES["file"]["error"]>0)
    {
	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	echo"<a href=\"document_form.php\"><input type=\"button\" value=\"Back\"></a>"; 
    }
  else
    {
$string=$_FILES["file"]["name"]; // iiit bhopL ASSIGNMENT.PDF   --> iiit-bhopal-ASSIGNMENT.PDF
$aa = str_replace(' ', '-', $string);

//echo $aa;

$query="select * from notes where name='$aa' ";
$xxy=mysqli_query($con,$query);
$rr=mysqli_num_rows($xxy);
//echo "total assn=".$rr;
if($rr>0){
	echo  "<h6 style=\"color:red;\">This Tutorial Notes [ {$_FILES["file"]["name"]} ] is already exists in the server.<br> if you want to re-upload please change file name. </h6><br><br>"; 
	}
else{
		move_uploaded_file($_FILES["file"]["tmp_name"],"doc/".$aa);
		echo "<h5>Document File Uploaded Successful.<h5><br><br> ";		
				
$date=date("d-m-Y");	 
$query="insert notes (name,title,others) values('$aa','$title','$others')"; //www.abc.com/doc/iiit-bhopal-ASSIGNMENT.PDF
$x=mysqli_query($con,$query);
if(!$x){echo "error-1";}
else{echo"<br><a href=\"document_form.php\"><input type=\"button\" value=\"Back\"></a>"; }
  	}
	}
	}
	else {echo "<h6>File size must less then 1000 KB.Try again.<h6><br>";
	echo"<br><a href=\"document_form.php\"><input type=\"button\" value=\"Back\"></a>"; 
	}
	} 
else 
	{	print_r($_FILES);
	echo "<br><h6>pdf file formate incorrect. Try again.<h6><br>";
	
	}
}



?>


<div id="contact-form-container"> 

<form action="document_form.php" id="contact-form" method="post" enctype="multipart/form-data" >

        <input style="color:black;" type="text" name="title" value="" placeholder="Document Title"  required>
	<input style="color:black;" type="file" name="file"  required />
		
	<textarea style="color:black;"  rows="5" cols="95" name="others"  placeholder="Detailed Description up to 10000 letters"></textarea>
        
        <button style="background-color:orange;" name="submit_doc" class="sub-btn" type="submit">Upload</button>

</form>
</div>

</section>


<?php include('footer1.php') ?>