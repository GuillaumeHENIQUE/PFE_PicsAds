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

						<h2>Admin Page - Delete Ville in Database</h2>
						<form action="EA_MENAGER_create.php" method="post">
						<p> Quelle ville voulez-vous supprimer ? </p>
						<input type="text" name="ville_delete" placeholder="CodePo" required><br>
						<br>
						<input type="submit" class='confirm' value="DELETE VILLE">
						</form>
			</div>
			</section>


     
       




            
        </div>
    </body>
</html>