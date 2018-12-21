<?php
	session_start();
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

						<h2>Admin Page - Update Entreprise in Database</h2>
						<form action="EA_MENAGER_create.php" method="post">

                            <p> What Code SCA you want modify ? </p>
                            <input type="number" name="CodeSCA_update" placeholder="CodeSCA" required><br> <br>
							<input type="text" name="Nom_update" placeholder="Nom" required><br>
							<input type="text" name="CA_update" placeholder="CA" required><br> 
                            <input type="text" name="DureeContrat_update" placeholder="Durée" required><br> 

							<input type="submit" class='confirm' value="UPDATE ENTREPRISE">
						</form>


			</div>
			</section>

    




            
        </div>
    </body>
</html>