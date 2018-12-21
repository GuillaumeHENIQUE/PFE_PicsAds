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

						<h2>Admin Page - Insert Ville in Database</h2>
						<form action="EA_MENAGER_create.php" method="post">
							<input type="text" maxlength=50 name="CodeV" placeholder="CodeV" required><br>
							<input type="text" min=0 name="CodePo" placeholder="CodePo" required><br> 
                            <input type="text" min=0 name="CodS" placeholder="CodS" required><br> 
                            <input type="text" min=0 name="Nom" placeholder="Nom" required><br> 
                            <input type="text" min=0 name="Type" placeholder="Type" required><br> <br>
							<input type="submit" class='confirm' value="AJOUTER UNE VILLE">
						</form>


			</div>
			</section>

    
            
        </div>
    </body>
</html>