<?php
session_start();
if (isset($_SESSION['mail'])) {
    header("Location:EA_MENAGER_home.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
	    	<link rel="stylesheet" href="EA_MENAGER.css" />
        <title> PROJET BDD </title>
    </head>
    
    <body>
    <?php include("EA_MENAGER_header.php"); ?>
        <div id="bloc_page">
            <header>

                <div id="titre_principal">
              
                    <h2> PROJET BASE DE DONNEE </h2>
                </div>         
               
            </header>

            <section>

                    <div id="sign">
                    <h2> Rentre tes informations pour t'inscrire </h2>
                 

                  <form action="EA_MENAGER_home.php" method="post">
                     

						  <p>Email</p> 		
						  <input type="email" required name="mail" placeholder="Write your mail">
                          <p>Password</p>
                          <input type="text" required name="pw" placeholder="Write your password">

                          
                          <br> <br>               
                         <input type="submit" class="confirm" value="Inscription">
                      
                    </form>  
                        
                    </div> 

            </section>
          
            
        </div>
    </body>
</html>