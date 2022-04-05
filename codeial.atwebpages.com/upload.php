<?php
  session_start();
?>
<?php include('header.php') ?>

<div>
<?php
$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
	if($con){ echo"";}	else{echo "<br>no connection to server";}
        
$output_dir = "pic/";
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               
	move_uploaded_file($_FILES["image"]["tmp_name"][0],"pic/".$NewImageName );
        
        echo "<h3>the email id is </h3> <h2>$_SESSION[email]</h2><br>";
        echo "<h3>username is $_SESSION[name]<br>";
	     //$sql = "INSERT INTO `pic`(`image`)VALUES ()";
             $sql = "INSERT INTO `pic` (`email`,`name`,`image`) VALUES ('$_SESSION[email]', '$_SESSION[name]','$NewImageName')";
		if (mysqli_query($con, $sql)) {
			echo "successfully !";
		}
		else {
		echo "Error: " . $sql . "" . mysqli_error($con);
	 }

?>

</div>
<p></p>

</div>
	
</div>

<?php include('footer.php') ?>

