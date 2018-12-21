  	<?php 
  	if (!isset($_SESSION['mail'])) {
  	?>
						           <form action="EA_MENAGER_login.php" method="post">
                                   <input type="email" required name="mail" placeholder="Write your mail" style="
								                    margin-left: 1000px;
							                 	    border-top-width: 2px;
						                		    padding-top: 1px;
					                 			    margin-top: 20px;
					                 			    width: 120px; ">

                                    <input type="password" required name="pw" placeholder="Write your password" style=" width:120px;">
                            	    <input type="submit" class="confirm" value="SIGN IN">  
                            		</form>  
    <?php
    } 
    else if ($_SESSION['mail'] == 'admin@gmail.com') 
    {
    ?>
    						
    					           <form action="EA_MENAGER_logout.php" method="post">
                             	   <h3> <?php echo " Welcome  " . $_SESSION['mail']. " ! "; ?> </h3> 
                            	   <input type="submit" class="confirm" value="LOG OUT" style="
                            	  				 margin-left: 1250px;
								                 border-top-width: 2px; 
								                 width: 120px; " >  
                           	       </form> 


    <?php
    }  
    else 
    {
    ?>

		                           <form action="EA_MENAGER_logout.php" method="post">
		                           <h3> <?php echo " WELCOME " . $_SESSION['mail']. " ! "; ?> </h3> 
		                           <input type="submit" class="confirm" value="LOG OUT" style="
		                                  margin-left: 1250px;
		                                  border-top-width: 2px; 
		                                  width: 120px; ">  
		                            </form> 

    <?php
    }
	?>
