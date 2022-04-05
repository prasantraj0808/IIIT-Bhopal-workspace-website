<?php 
session_start();
?>
<title>Login</title>
<?php include('header1.php') ?>
       
<section id="education">	
          
<?php
$con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
	if($con){ //echo"<hr>connection sucessful";
	}
	else{ //echo "<hr>connection unsucessful";
	}
	
	echo "<h2 style=\"color:#A52A2A;\">Profile Card</h2>";
 //echo "<a href=\"index.php\"><input type=\"button\" value=\"Home\" /></a>&nbsp; &nbsp; <a href=\"registration.php?show=xyz\"><input type=\"button\" value=\"Student List\" /></a> &nbsp; &nbsp; <a href=\"registration_fac.php?show_fac=xyz\"><input type=\"button\" value=\"Faculty List\" /></a>&nbsp; &nbsp;";
if(isset($_SESSION['active']))
{
//echo "<a href=\"login.php?logout\"><input type=\"button\" value=\"Logout\" /></a>";
}
else
{
//echo "<a href=\"login.php\"><input type=\"button\" value=\"Login\" /></a> &nbsp; &nbsp;";
//echo "<a href=\"registration.php\"><input type=\"button\" value=\"Student Registraion\" /></a> ";
//echo "<a href=\"registration_fac.php\"><input type=\"button\" value=\"Faculty Registraion\" /></a> ";
}

	

echo "<hr>";
if(isset($_GET['logout']))
{
if(isset($_SESSION['active'])) {unset($_SESSION['active']);}
if(isset($_SESSION['name'])) {unset($_SESSION['name']);}
if(isset($_SESSION['phone'])) {unset($_SESSION['phone']);}
if(isset($_SESSION['email'])) {unset($_SESSION['email']);}
echo "logout successful. <br><br><a href=\"login.php\">Login Again</a><br><br><a href=\"registration.php\">Student Registration</a><br><br><br>";
echo("<script>location.href = 'login.php';</script>");
}

else if(isset($_GET['change_p']))
{
echo"
	<form id=\"contact-form\" action=\"login.php\" method=\"POST\">
    Old Password <input type=\"password\" name=\"pw_old\"/ ><br>
	New Password <input type=\"password\" name=\"pw_n1\"/ ><br>
	Verify Password <input type=\"password\" name=\"pw_n2\"/ ><br>
	<input style=\"font-size:18px;background-color:orange;color:white;\" type=\"submit\" name=\"update_p\" value=\"Submit\"/>
	</form>
	<br><a href=\"login.php\">Back</a>";
}



//code to update profile

else if(isset($_POST['update_p']))
{ 
   $xx=mysqli_query($con,"select * from reg where phone='{$_POST['pw_old']}' and email='{$_SESSION['email']}' ");
   if(mysqli_num_rows($xx)==1)
   {
     $x1=mysqli_fetch_assoc($xx);
     $id=$x1['id'];
     if($_POST['pw_n1']==$_POST['pw_n2'])
     {
        $query3=mysqli_query($con, "UPDATE reg SET phone='{$_POST['pw_n1']}' WHERE id={$id} ");
	$emailto=$x1['email'];
	$fullname=$x1['name'];
       echo "Your Password has been changed. <br> <a href=\"login.php\">back</a>";
     }  
     else {echo "something happen wrong. <a href=\"login.php\">try again.</a>  ";}
   }
   else
   {
   echo "something happen wrong. <a href=\"login.php?change_p\"> Try again.</a>  ";
   }
}


//code to display profile picture

else if(isset($_SESSION['active']))
{
   $p=mysqli_query($con,"select * from pic where email='{$_SESSION['email']}' ");
   //echo"<h1>hello {$_SESSION['email']}</h1>";
   if(mysqli_num_rows($p)>=1) 
   {
      // echo"<h1>hello</h1>";
       
       $img=mysqli_fetch_assoc($p);
       //echo $img['image'];
       echo "<img style=\"border-radius:50%;\"src=\"pic/{$img['image']}\" alt=\"profile image\" height=\"500px\" width=\"450px\"><br>"; 
       echo"<h4><a href=\"pic_form.php\">Change Profile Image</a><h4><br>";
      
   }
   else{
      
      echo"<h4><a href=\"pic_form.php\">Upload Profile Image</a><h4><br>";
   }

   if($_SESSION['active']=="std_login")
   {
     echo "<h3>Welcome {$_SESSION['name']},</h3> <br><br>"; 
     echo "<a href=\"login.php?change_p\"> Change Your Password</a><br>";
     echo" <br><i class=\"fas fa-sign-out-alt\"></i>&nbsp; <a href=\"login.php?logout\">logout</a><br> "; 
   }
   else if($_SESSION['active']=="fac_login")
   {
     echo "<h3>Welcome Prof. {$_SESSION['name']},</h3> <br><br>"; 
     echo "<a href=\"login.php?change_p\"> Change Your Password</a><br><br> ";
     echo" <br><i class=\"fas fa-sign-out-alt\"></i> &nbsp;<a href=\"login.php?logout\">logout</a><br> "; 
   }
   else
   {
     echo "something happen wrong. plz logout first and login again. <br><span><i class=\"fas fa-sign-out-alt\"></i>&nbsp;<a href=\"login.php?logout\">logout</a></span><br> "; 
   }
}

else if(isset($_POST['Login']))
{
//echo "login start";
$x=mysqli_query($con,"select * from reg where email='{$_POST['username']}' and phone='{$_POST['password']}' ");
$y=mysqli_query($con,"select * from reg_fac where email='{$_POST['username']}' and phone='{$_POST['password']}' ");
if(mysqli_num_rows($x)==1)
{
$x1=mysqli_fetch_assoc($x);
$_SESSION['active']="std_login";
$_SESSION['email']=$x1['email'];
$_SESSION['phone']=$x1['phone'];
$_SESSION['name']=$x1['name'];
echo "Login Successful.<br><br>";
echo "Welcome {$_SESSION['name']}, <br><br>"; 
echo "<a href=\"login.php?change_p\"> Change Your Password</a><br><br> ";
echo" <br><a href=\"login.php?logout\">logout</a>";
echo("<script>location.href = 'login.php';</script>");
}
else if(mysqli_num_rows($y)==1)
{
$y1=mysqli_fetch_assoc($y);
$_SESSION['active']="fac_login";
$_SESSION['email']=$y1['email'];
$_SESSION['phone']=$y1['phone'];
$_SESSION['name']=$y1['name'];
echo "Login Successful.<br><br>";
echo "Welcome Prof. {$_SESSION['name']}, <br><br>"; 
echo" <br><a href=\"login.php?logout\">logout</a>";
echo("<script>location.href = 'login.php';</script>");
	
}
else
{
echo "Login Details are not Correct. Please Try Again. <br><br>";
echo "<a href=\"login.php\">Go to Login</a> <br><br>";

}
}

else
{  echo "<h1 class=\"section-heading mb75px\">";
                echo"<span>";
                   echo" <i class=\"fas fa-sign-in-alt\"></i>";
                echo "</span>";
                echo "<span> Login </span>";
   echo "</h1>";
 echo"
	<form style=\"margin-left:-5rem;\" id=\"contact-form\" action=\"login.php\" method=\"POST\">
    <input type=\"text\" name=\"username\"/ placeholder=\"Login ID\"><br><br>
    <input type=\"password\" name=\"password\"/ placeholder=\"Password\"> <br><br>
	<input style=\"font-size:18px;background-color:orange;color:white;\"  type=\"submit\" name=\"Login\" value=\"login\" />
	</form>
	
	 <hr>
    ";
} 

?>
<hr>

 </section>
 

<?php include('footer1.php') ?>