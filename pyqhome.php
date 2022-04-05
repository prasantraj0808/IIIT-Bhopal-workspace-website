<?php
include('header1.php')
 ?>       
        
 <title>Previous Papers</title>
 
 <section id="about">
   <h1 style="border-bottom:1px solid blue;" class="section-heading mb75px ">
                <span>
                    <i class="far fa-sticky-note"></i>
                </span>
                <span > Upload Question Paper </span>
    </h1>
        
     
  <div id="contact-form-container"> 
              <form id="contact-form" method="post" action="pyqdocument_view.php">
        
                 <span style="font-size:18px;">Semester</span>                
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
                
                <button style="background-color:orange;" name="std_sem" class="sub-btn" type="submit">Search</button>
                
               
     		<br>
             
               <b style="color:green;font-size:18px;">  OR </b><br><br>
               
                <span style="font-size:18px;">All Q/Papers</span>   
             
                 <button style="background-color:orange;" class="sub-btn" type="submit"><a style="color:white;text-decoration:none;" href="pyqdocument_view.php">All Papers</a></button><br>
                  <b style="color:green;font-size:18px;">  OR </b><br><br>
                  
                <span style="font-size:18px;">Upload Paper</span> 
                  
                  <button style="background-color:orange;" class="sub-btn" type="submit"><a style="color:white;text-decoration:none;" href="pyqdocument_form.php" >Upload Paper</a></button>
                
              </form> 
     </div>

 </section>


<?php
include('footer1.php')
 ?>       
       