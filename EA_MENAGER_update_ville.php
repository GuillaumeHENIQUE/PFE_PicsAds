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

						<h2>Admin Page - Update Ville in Database</h2>
						<form action="EA_MENAGER_create.php" method="post">

                            <p> What CodePo you want modify ? </p>
                             <br>
							<input type="text" name="CodePo_update" placeholder="CodePo" required><br> <br>
							<input type="text" name="CodS_update" placeholder="CodS" required><br> 
                            <input type="text" name="Nom_update" placeholder="Nom" required><br> 
                            <input type="number" name="Type_update" placeholder="Type" required><br> <br>
							<input type="submit" class='confirm' value="UPDATE VILLE">
						</form>


			</div>
			</section>

    




            
        </div>
    </body>
</html>