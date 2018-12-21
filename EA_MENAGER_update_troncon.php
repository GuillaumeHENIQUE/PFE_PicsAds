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

						<h2>Admin Page - Update Troncon in Database</h2>
						<form action="EA_MENAGER_create.php" method="post">

                            <p> What CodT you want modify ? </p>
                            <input type="number" name="CodT_update" placeholder="CodT" required><br> <br>
							<input type="text" name="CodA_update" placeholder="CodA" required><br>
							<input type="text" name="CodeS1_update" placeholder="CodeS1" required><br> 
                            <input type="text" name="CodeS2_update" placeholder="CodeS2" required><br> 
                            <input type="text" name="DuKm_update" placeholder="DuKm" required><br> 
                            <input type="text" name="AuKm_update" placeholder="AuKm" required><br> <br>

							<input type="submit" class='confirm' value="UPDATE ENTREPRISE">
						</form>


			</div>
			</section>

    




            
        </div>
    </body>
</html>