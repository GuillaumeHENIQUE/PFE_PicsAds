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

						<h2>Admin Page - Insert Tronçon in Database</h2>
						<form action="EA_MENAGER_create.php" method="post">
							<input type="text" maxlength=50 name="CodT" placeholder="CodT" required><br>
							<input type="text" min=0 name="CodA" placeholder="CodA" required><br> 
                            <input type="text" min=0 name="CodeS1" placeholder="CodeS1" required><br> 
                            <input type="text" min=0 name="CodeS2" placeholder="CodeS2" required><br> 
                            <input type="text" min=0 name="DuKm" placeholder="DuKm" required><br> 
                            <input type="text" min=0 name="AuKm" placeholder="AuKm" required><br> <br>
							<input type="submit" class='confirm' value="AJOUTER UN TRONCON">
						</form>


			</div>
			</section>

    
            
        </div>
    </body>
</html>