<section id="contact">
            <h1 class="section-heading mb50px">
                <span>
                    <i class="far fa-address-card"></i>
                </span>
                <span> Contact </span>
            </h1>
            <div id="contact-container">

                
                <?php
                   
                   $con=mysqli_connect('fdb33.awardspace.net','3877318_workspace','Satyam123++','3877318_workspace');
                   if($con){ 
                       //echo"<hr>connection sucessful";
	                }
                   else{ //echo "<hr>connection unsucessful";
	            }
	
                    
                    if(isset($_GET['submit']))
                    {
                      $name=$_GET['name'];
                      $email=$_GET['input-email'];
                      $message=$_GET['input-message'];
                     
                       echo "<h6 style=\"text-align:center; color:tomato; margin-left:5.5rem;\">Thanks! For contacting with us.</h6>";
                      $n=mysqli_query($con,"INSERT INTO `team_contact`(`name`, `email`, `message`)  VALUES ('$name', '$email', '$message')");
                    }
                    echo "<div id=\"contact-form-container\">";
                    echo "<form action=\"index1.php\" id=\"contact-form\" method=\"GET\">";
                    echo "<input id=\"input-name\" name=\"name\" type=\"text\" placeholder=\"Your Name\">";
                    echo "<input id=\"input-email\" name=\"input-email\" type=\"text\" required placeholder=\"Your Email\">";
                    echo "<textarea id=\"input-message\" name=\"input-message\" rows=2 cols=40 placeholder=\"Message\"></textarea>";
                    echo "<button name=\"submit\" class=\"sub-btn\" type=\"submit\">SEND MESSAGE</button>";
                    echo "</form>";
                    
        
                ?>
                </div>
                <div id="my-details-container">

                    <h3> Get In touch </h3>
                    <p> We are currently students of 3rd Year at IIIT Bhopal.</p>

                    <h3> My Address </h3>
                    <div class="my-details-info-container">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Bhopal, India</span>
                    </div>
                    <div class="my-details-info-container">
                        <i class="fas fa-mobile-alt"></i>
                        <span>790394****</span>
                    </div>
                    <div class="my-details-info-container">
                        <i class="far fa-envelope"></i>
                        <span><a href= "mailto:iiitbhopal@gmail.com ? {Hey! Let's Connect} = {Loved your resume!}" style="text-decoration:none;color:#d9dcdd;">iiitbhopal@gmail.com </a>  </span>
                    </div>
                </div>
            </div>

            <div class="text-center social-icons">

                <ul class="no-list-style horizontal-list">

                    <li>
                        <a href="https://www.linkedin.com/feed/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://stackoverflow.com/?newreg=f3ed504cadc7473c9e10fadca17be489" target="_blank">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://myaccount.google.com/"target="_blank" >
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/"target="_blank" >
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.quora.com/"target="_blank" >
                            <i class="fab fa-quora"></i>
                        </a>
                    </li>
                </ul>
            </div>
 </section>
 
 
 <script type="text/javascript" src="./index.js"></script>