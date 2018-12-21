<?php
ob_start();
session_start();
?>


<?php 
    require('EA_MENAGER_bdd.php');
    $connection = connect();
    if (!$connection)
    {
        die("ERROR CONNECTING");
    }

    if (isset($_POST['mail']) && isset($_POST['pw']))
    {
        $pw = password_hash($_POST['pw'], PASSWORD_BCRYPT); 
        //$salt = mcrypt_create_iv(32,MCRYPT_DEV_URANDOM);
        //$pw = crypt($_POST['pw'], $salt);
        insert_client($connection,$_POST['mail'], $pw);

    } 

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="EA_MENAGER.css" />
        <title> PFE </title>
    </head>
    
    <body>
   
        <div id="bloc_page">
            <header>

                <div id="titre_principal">
                
                    <h2> AD PHOTOGRAPHY </h2>
                </div>

            </header>


              <?php
              if (!isset($_SESSION['mail'])) 
              {
              ?>
                  <section>

                    

                            <div id="connect">
                            <h2> VENEZ VOUS PRENDRE EN PHOTO </h2><p> </p>
                            

                    
                  <div class="booth">
                    <video id="video" width="400" height="300" muted="muted"> </video>
                    <a href="#" id="capture" class="booth-capture-button">Take picture</a>
                  <canvas id="canvas" width="400" height="300"></canvas>
                  <img id="photo" src="https://www.poweron-it.com/images/easyblog_shared/July_2018/7-4-18/totw_network_profile_400.jpg" alt="your picture" >
                  
                  <script src="photo.js"> </script>
                  
                  
                         

                           </div> </section>
              <?php
              } 
              else 
              {
                header("Location:EA_MENAGER_login.php");
              }
              ?>


            
        </div>
    </body>
</html>
