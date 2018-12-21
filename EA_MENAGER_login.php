<?php 
session_start();
if (isset($_SESSION['mail'])) {
   header("Location:EA_MENAGER_create.php");
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
                <div id="connect">
                           
				<?php
					
				        require_once('EA_MENAGER_bdd.php');
				        $connection = connect();

				        if (!$connection)
						{
						die("ERROR CONNECTING");
						}

					if (isset($_POST['mail']) && isset($_POST['pw']))  

					{
							if (check_data($connection, "mail", "Clients", "mail", $_POST['mail'])) //mail exist ou pas
								{
									$sql = check_data($connection, "pw", "Clients", "mail", $_POST['mail']);

									if ($sql) 
									{
										$hash = mysqli_fetch_assoc($sql); //chercher le mdp encrypted
				                         
				                            
										if (password_verify($_POST['pw'],$hash["pw"])) //si mdp = mdp bbd 
										{
											     
												$_SESSION ['mail'] = $_POST['mail'];
												print (" <h2> WELCOME ! </h2>") ;
												?>    

												<br>  <br> 

												<a href="EA_MENAGER_create.php" class="bouton_next2"> CLIQUE ICI POUR VOIR LA ROUTE </a>

												<br>  <br>


												<?php
										}
										else {print (" <h2>INVALID PASSWORD </h2>");?> <br> <br> <a href ="EA_MENAGER_home.php"> <input type="submit" class="confirm" value=" TRY AGAIN "> </a>
										<?php }

										
									}


								} else {print ("<h2> INVALID MAIL </h2>"); ?>
								<a href ="EA_MENAGER_home.php"> <br> <br> <input type="submit" class="confirm" value=" TRY AGAIN "> </a>
								<?php }


					} 
				?>

                            
                   </div> 
            </section> 

           
       
        </div>
    </body>
</html>

