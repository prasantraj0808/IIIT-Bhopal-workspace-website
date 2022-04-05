<?php 
session_start();
?>

<title>Registration</title>

<?php include('header1.php') ?>

<section id="portfolio">
   <h1 class="section-heading mb75px">
                <span>
                    <i class="fas fa-user-plus"></i>
                </span>
                <span> Registration </span>
            </h1>
<?php
$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
		
	if($con){ //echo"<hr>connection sucessful";
	}
	else{ //echo "<hr>connection unsucessful";
	}
	
 echo "<span> <a href=\"registration.php?show=xyz\"><input type=\"button\" value=\"Students List\" /></a> &nbsp; &nbsp; <a href=\"registration_fac.php?show_fac=xyz\"><input type=\"button\" value=\"Faculties List\" /></a></span><br>";

if(isset($_SESSION['active']))
{
  echo "<i class=\"fas fa-sign-out-alt\"></i> &nbsp;<a href=\"login.php?logout\"><input type=\"button\" value=\"Logout\" /></a>";
}
else if(!isset($_GET['show']))
{
//echo "<a href=\"login.php\"><input type=\"button\" value=\"Login\" /></a> &nbsp; &nbsp;";
echo "<span><i class=\"fas fa-user-graduate\"></i>&nbsp;<a href=\"registration.php\"><input type=\"button\" value=\"Student Registration\" /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<i class=\"fas fa-chalkboard-teacher\">&nbsp;</i><a href=\"registration_fac.php\"><input type=\"button\" value=\"Faculty Registration\" /></a><span> ";
}


if(isset($_GET['show'])){
	
	
        
        echo "<div id=\"about-para\">";

        echo "<p>  <span class=\"text-highlight\">All Registerd Students</span> <br><br>";
                
	$m=mysqli_query($con,"SELECT * from reg");
	if($m)
	{   $i=0;
		while($x=mysqli_fetch_assoc($m))
			{   $i++;
				echo "<span style=\"color:black;\">{$i}.</span> Name: {$x['name']}, Email : {$x['email']},<br>&nbsp;&nbsp;&nbsp; Phone: {$x['phone']}, Dept: {$x['dept']} , <br>&nbsp;&nbsp;&nbsp;Address: {$x['addr']}<br><br>";
			}
			echo " <br><a href=\"registration.php\"><input type=\"button\" value=\"Back\"></a> <hr>";
	}
	else
	{
	echo "Oops! Error to show all Student Registration";
	}
        
       echo "</p>";

       echo "</div>";
}

else if(isset($_SESSION['active']))
{
	echo "<hr><h5>Caught Up ! LogOut to make a fresh registration. </h4> <hr>";
}

else{

if(isset($_POST['std_submit']))
{
$name=$_POST['std_name']; 
$email=$_POST['std_email']; 
$phone=$_POST['std_phone'];
$addr=$_POST['std_addr'];
$dept=$_POST['std_dept'];
	$time=date("d-m-Y h:i:s A");
	$ip=$_SERVER['REMOTE_ADDR'];
echo "<hr> <h3> Details of Student going to be Registerd. </h3>";	
echo "<br> name : {$name} <br> Email : {$email}  <br> Time : {$time}  <br> IP : {$ip} "; 

	$temp="SELECT * from reg where email='{$email}' ";
	$m=mysqli_query($con,$temp);
	$aa = mysqli_num_rows($m);
	if($aa>=1)
	{
    	echo "<br><h3>Your email should be changed. This email [ {$email} ]  is used by another member of the website.</h3><br> <a href=\"registration.php\"><input type=\"button\" value=\"Back\"></a>";
	}
	else
	{	
$n=mysqli_query($con,"insert into reg(name,email,phone,addr,dept,time,ip) values('{$name}','{$email}','{$phone}','{$addr}','{$dept}','{$time}','{$ip}')");
	    if($n)
        { echo"<h4> <b style=\"color:green;\"> Your registration is successful. login_ID is: {$email} and Password is: {$phone}</b></h4> <a href=\"registration.php\"><input type=\"button\" value=\"Back\"></a>  ";
		}
		else { echo"<h4> <b style=\"color:green;\"> Your registration is not successful.<br> Try again 
		<a href=\"registration.php\"><input type=\"button\" value=\"Back\"></a> ";
		}
	}
}

else
{
echo "<hr> <h4 style=\"color:green;font-weight:400;border-bottom:2px dotted red;font-style:italic;\"> <i class=\"fas fa-user-graduate\"></i> Student Registration</h4>";		
echo "<form style=\"font-size:10px;font-weight:200;\" method=\"post\" action=\"registration.php\">";
echo " Name :&nbsp; &nbsp; <input name=\"std_name\" type=\"text\" required  /> <br><br>";
echo " Email :&nbsp; &nbsp; <input name=\"std_email\" type=\"text\" required  /> <br><br>";
echo " Phone : &nbsp; &nbsp;<input name=\"std_phone\" type=\"text\" required  /> <br><br>";
echo " Department : <select name=\"std_dept\" required ><br><br>";
echo"<option selected value=\"\" >Select Your Department</option>";
echo"<option  value=\"CSE\">CSE</option>";
echo"<option  value=\"IT\">IT</option>";
echo"<option  value=\"ECE\">ECE</option>";
echo" </select>  </br><br>";
echo "Address : <input name=\"std_addr\" type=\"text\" required  /> <br><br><br>";
echo "<input name=\"std_submit\" type=\"submit\" value=\"Register\" /><br><br><br>";
echo " </form> ";

}

echo"<hr> <br> <a href=\"login.php\"><input type=\"button\" value=\"login\" /></a><br><sub style=\"font-size:small; color:blue;\"> if already registerd</sub> <br><br>";

}	


?>

</section>

	
<?php include('footer1.php') ?>