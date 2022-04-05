<?php
 session_start();
?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="resume.css">
    
    <header id="body-header">
        <nav>
            
            <div class = "dropdown-menu text-right">
                <div class="bars">
                    <i class="fas fa-bars"></i>
                </div>
                <div class ="dropdown-list nav-menu">
                    <ul class = "no-list-style">
                        <li >
                            <a href="index1.php"> Home </a>
                        </li>
                       
                         <li>
                            <a href="registration.php">Registration </a>
                        </li>
                       
                        <li>
                            <a href="opportunities.php" >Jobs </a>
                        </li>
                        <li>
                            <a href="document_view.php"> Notes </a>
                        </li>
                        <li>
                            <a href="pyqhome.php"> Question Bank </a>
                        </li>
                        
                        
                        <?php
                                  if($_SESSION['active']=="std_login" || $_SESSION['active']=="fac_login")
                                  {
                                     echo"<li>
                                             <a style=\"color:red;\"  href=\"login.php?logout\"> LogOut </a>
                                         </li>";                         
                                  }
                                  else{                              
                                                                              
                                         echo "<li>
                                           <a  href=\"login.php\"> Login </a>
                                         </li>";   
                                  }
                         ?>
                                                                 
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    </div>

             </div>   

            <ul class="no-list-style horizontal-list text-center nav-menu">
                <li>
                    <a href="index1.php"> Home </a>
                </li>
                
                <li>
                    <a href="registration.php" data-value='skills'> Registration </a>
                </li>
                <li>
                    <a href="opportunities.php">Jobs</a>
                </li>
                <li>
                    <a href="document_view.php">Notes</a>
                </li>
                <li>
                    <a href="pyqhome.php">Question Bank</a>
                </li>
                <?php
                                  if($_SESSION['active']=="std_login" || $_SESSION['active']=="fac_login")
                                  {
                                     echo"<li>
                                             <a style=\"color:red;\" href=\"login.php?logout\"> LogOut </a>
                                         </li>";                         
                                  }
                                  else{                              
                                                                              
                                         echo "<li>
                                           <a  href=\"login.php\"> Login </a>
                                         </li>";   
                                  }
                 ?>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>

        </nav>

        <div id="name-social-container">
            <div class="text-center">
                <h1 id="my-name">IIIT Bhopal Workspace</h1>
            </div>
            <div>
                <ul class="no-list-style horizontal-list text-center social-icons">
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

        </div>

    </header>
    