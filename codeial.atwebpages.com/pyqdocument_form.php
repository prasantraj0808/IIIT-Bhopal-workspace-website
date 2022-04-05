<?php 
session_start();
?>

<title>Notes Upload</title>
<?php
include('header1.php')
 ?>  
 
 
 <section id="about">
   <h1 style="border-bottom:1px solid blue;" class="section-heading mb75px ">
                <span>
                    <i class="far fa-sticky-note"></i>
                </span>
                <span > Upload Question</span>
    </h1>

<div>
     
     <?php
     if(isset($_SESSION['active']))
     {
       ?>
       

<div id="contact-form-container"> 

<form id="contact-form" action="pyqdocument.php" method="post" enctype="multipart/form-data" >
		 
		<input style="color:black;" type="text" name="title" value="" placeholder="Subject Name" required>
		<input type="file" name="file"   />
		
               <input style="color:black;" type="url" name="tutoriallink" value="" placeholder=" Enter the Hints URL (if any) eg.Youtube Links ">
               
               <span style="font-size:18px;margin-left:1.5rem;" required > Choose Semester: </span>
                  
     		<select style="font-size:18px;" name="std_semester" required>
     			<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
     			
     			
     		</select>
                
               
		<textarea style="color:black;"  rows="5" cols="95" name="others"  placeholder="Description (if any)"  ></textarea> 
		
                <button style="background-color:orange;" name="submit_doc" class="sub-btn" type="submit">Upload</button>
	
</form>
</div>

    <?php
    }
    
    else
    {
      ?>
        <h5> Login first then upload the Question Paper</h5>
      
      <?php
    }
    ?>

   
   
   
  
   

    <a href="pyqhome.php"> <input style="color:red;font-size:23px;" type="button" value="Back"> </a>

	
</section>

<?php
include('footer1.php')
 ?>  