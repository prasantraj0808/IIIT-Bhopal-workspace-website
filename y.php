<div id="right" style="border-top: 1px dotted #cba; border-right: 1px dotted #cba; border-bottom: 1px dotted #cba;float: right;  width: 245px; 	padding: 0px 6px 0px 3px;"> 

<b>User Login</b><div style="   width: 245px; 	padding:8px;">

<?php

if(isset($_SESSION['active']))
{

   $p=mysqli_query($con,"select * from pic where email='{$_SESSION['email']}' ");
   if(mysqli_num_rows($p)>=1) 
   {
      // echo"<h1>hello</h1>";
       
       $img=mysqli_fetch_assoc($p);
       //echo $img['image'];
      echo "<img src=\"pic/{$img['image']}\" alt=\"profile image\" height=\"70px\" width=\"90px\"><br>"; 

   }
   else{
      
      echo"<h4><a href=\"pic_form.php\">Upload Profile Image</a><h4><br>";
   }
   
if($_SESSION['active']=="std_login")
{
echo "Welcome {$_SESSION['name']}, <br><br>"; 
echo" <br><a href=\"login.php?logout\">logout</a>";

}
else if($_SESSION['active']=="fac_login")
{
echo "Welcome Prof. {$_SESSION['name']}, <br><br>"; 
echo" <br><a href=\"login.php?logout\">logout</a>";
}
}
else
{
?>

<form action="login.php" method="post" style="height:10px;">
<input type="text" value="" name="username" style=" width:65px;height:14px;"> 
<i>UserID </i> <br><br>
<input type="password" value="" name="password" style=" width:65px;height:14px;">
<i> Password </i><br><br>&nbsp;
<input type="submit" name="Login" value="login" style=" width:40px;height:25px;">

<?php
}
?>

</form>	<br><br><br><br><br></div>	<p style="border-bottom: 1px dotted #cba;"></p>		<div id="search1">
					<form action="http://www.google.com/search" method="get" target="_blank" "="">
					<p><input type="hidden" value="chrome" name="sourceid">
					<input type="hidden" value="UTF-8" name="ie">
					<label>On web :</label>
					<input type="text" value="" name="q" class="search">
					
					<input type="submit" name="submit" value="Search on Google" class="button"></p>
					</form>		
	          </div>
			

			
	

	</div>