<?php session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="EA_MENAGER.css" />
        <title> PROJET BDD </title>
        <style type="text/css">
		td , th
		{
			text-align: center;
			border: 20px solid transparent;
		}

		th
		{
			color: white;
			background-color: black;
		}

		table
		{
			border-collapse: collapse;
			border: 1px solid black;
			width: 75%;
		}

	</style>
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

               <div id="connect1">
               <h2> LA GESTION D'UNE AUTOROUTE </h2>
                         
				<div id = "cochez"> Voici donc les différentes autoroutes, tronçons, interconnexions et villes. </div>  <br> <br>


                            <?php 
                            require_once('EA_MENAGER_myFunctions.php');
                            require_once('EA_MENAGER_bddquery.php');
                            require_once('EA_MENAGER_class.php');
                            require_once('EA_MENAGER_recherche.php');
                            require_once('EA_MENAGER_modele.php');
                            
                            ?>

              <section>

						<h3> Rechercher le parcours d'une ville à une autre : </h3> <br> <br> <br> 
						<form action="EA_MENAGER_create.php" method="post">
							<input type="text" maxlength=50 name="villeA" placeholder="VilleA" required><br>
							<input type="text" min=0 name="villeB" placeholder="VilleB" required><br> 
                     		
							<input type="submit" class='confirm' value="RECHERCHE ITINERAIRE"> <br> 
						</form>

			</section>
                        

                   <?php // AFFICHER ITINERAIRE ! 

					if (isset($_POST['villeA']) && isset($_POST['villeB']))
					{
                        ?> <br> Voici l'itinéraire de la ville A à ville B : <br>
						<?php $arr = itineraire($_POST['villeA'], $_POST['villeB']); 

                    }
   
 					?>


            <section>

                        <h3> Afficher CodA et libelle d'une ville donnée : </h3> <br> <br> <br> 
                        <form action="EA_MENAGER_create.php" method="post">
                            <input type="text" maxlength=50 name="villed" placeholder="Ville" required><br>
                    
                            <input type="submit" class='confirm' value="RECHERCHE VILLE"> <br> 
                        </form>

            </section>


             
                         <?php if (isset($_POST['villed'])) {
                            ?> <br> Voici le CodA et le libellée de la ville donnée : <br> <?php
                                     $arr = getVilleInfo($_POST['villed']);
                                     
                                     print_r($arr);  


                                     
  
                         }
   
                    ?>


             <section>

                        <h3> Afficher les troncons, le temps restant et le gain d'une SCA donnée : </h3> <br> <br> <br> 
                        <form action="EA_MENAGER_create.php" method="post">
                            <input type="text" maxlength=50 name="sca" placeholder="SCA" required><br>
                           
                            
                            <input type="submit" class='confirm' value="RECHERCHE SCA"> <br> 
                        </form>

            </section>


                         <?php if (isset($_POST['sca'])) {
                            ?> <br> Voici les troncons, le temps restant et le gain de l'entreprise donnée : <br> <?php
                                     $arr = getSCA($_POST['sca']);
                                     
                                     print_r($arr);  
  
                         }
   
                    ?>


             <section>

                        <h3> Quelles tables vous voulez voir ? : </h3> <br> 


                        <br> <br> 
                        <form action="EA_MENAGER_create.php" method="post">
                            <input type="text" maxlength=50 name="table" placeholder=" Table " required><br>
                       
                            <input type="submit" class='confirm' value="AFFICHER LA TABLE"> <br> 
                        </form>

            </section>


                  <?php // AFFICHER VILLE ! 

                    if (isset($_POST['table']))
                    {
                        
                        if ($_POST['table'] == 'Entreprise')
                        {



                   ?> <br> <br> <br> <div> BDD ENTREPRISE : </h2> </div> <br> 

                   <table>
                        <tr><th>CodeSCA</th><th>NOM</th><th>Chiffre d'affaire</th><th>Durée de contrat</th> <td style="border-style: none; width: 0;"></td></tr>

                        <?php
                                $results_id = retrieve_entreprise();
                                while ($row = $results_id->fetch_assoc())
                                {                            
                                    printTableRow($row['CodeSCA'], $row['Nom'], $row['CA'], $row['DureeContrat']);
                            
                                }

                        ?>

                   </table>


                        <?php
                        if ($_SESSION['mail'] == 'admin@gmail.com') 
                        {
                        ?>
                            
                                    <form action="EA_MENAGER_insert_entreprise.php" method="post">
                                    <input type="submit" class="confirm" value="INSERT ENTREPRISE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_delete_entreprise.php" method="post">
                                    <input type="submit" class="confirm" value="DELETE ENTREPRISE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_update_entreprise.php" method="post">
                                    <input type="submit" class="confirm" value="UPDATE ENTREPRISE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >     
                        <?php   } 

                    }
                    else if ($_POST['table'] == 'Troncon') { ?>

                    <br> <br> <div> BDD TRONCONS : </h2> </div> <br> 

                   <table>
                        <tr><th>CodT</th><th>CodA</th><th>CodeS1</th><th>CodeS2</th><th>DuKm</th><th>AuKm</th> <td style="border-style: none; width: 0;"></td></tr>

                        <?php
                                $results_id = retrieve_troncon();
                                while ($row = $results_id->fetch_assoc())
                                {
                                    printTableRow1($row['CodT'], $row['CodA'], $row['CodeS1'], $row['CodeS2'], $row['DuKm'], $row['AuKm']);
                            
                                }

                        ?>

                   </table>

                        <?php       
                        if ($_SESSION['mail'] == 'admin@gmail.com') 
                        {
                        ?>
                                    <br> <br>      
                                    </form> <form action="EA_MENAGER_insert_troncon.php" method="post">
                                    <input type="submit" class="confirm" value="INSERT TRONCONS" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_delete_troncon.php" method="post"> 
                                    <input type="submit" class="confirm" value="DELETE TRONCONS" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_update_troncon.php" method="post">
                                    <input type="submit" class="confirm" value="UPDATE TRONCONS" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> 
                          <?php   } 

                    }
                    else if ($_POST['table'] == 'Ville') { ?>


                    <br> <br> <div> BDD VILLE : </h2> </div> <br> 

                   <table>
                        <tr><th>CodePo</th><th>CodS</th><th>Nom</th><th>Type</th><td style="border-style: none; width: 0;"></td></tr>

                        <?php
                                $results_id = retrieve_ville();
                                while ($row = $results_id->fetch_assoc())
                                {
                                
                                    printTableRow2( $row['CodePo'], $row['CodS'], $row['Nom'], $row['Type']);
                            
                                }

                        ?>

                   </table>

                        <?php

                        
                        if ($_SESSION['mail'] == 'admin@gmail.com') 
                        {
                        ?>
                                    <br> <br>      
                                    </form> <form action="EA_MENAGER_insert_ville.php" method="post">
                                    <input type="submit" class="confirm" value="INSERT VILLE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_delete_ville.php" method="post"> 
                                    <input type="submit" class="confirm" value="DELETE VILLE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_update_ville.php" method="post">
                                    <input type="submit" class="confirm" value="UPDATE VILLE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> 
                      
                         
                  <?php   } 

                    }
                    else if ($_POST['table'] == 'Peage') { ?>

                    <br> <br> <div> BDD PEAGE : </h2> </div> <br> 

                   <table>
                        <tr><th>PgDuKm</th><th>PgAuKm</th><th>Tarif</th><th>CodT</th><th>CodPe</th><th>CodeSCA</th> <td style="border-style: none; width: 0;"></td></tr>

                        <?php
                                $results_id = retrieve_peage();
                                while ($row = $results_id->fetch_assoc())
                                {
                                
                                    printTableRow3($row['PgDuKm'], $row['PgAuKm'], $row['Tarif'], $row['CodT'], $row['CodPe'], $row['CodeSCA']);
                            
                                }

                        ?>

                   </table>

                        <?php

                    
                        if ($_SESSION['mail'] == 'admin@gmail.com') 
                        {
                        ?>
                                    <br> <br>      
                                    </form> <form action="EA_MENAGER_insert_peage.php" method="post">
                                    <input type="submit" class="confirm" value="INSERT PEAGE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_delete_peage.php" method="post"> 
                                    <input type="submit" class="confirm" value="DELETE PEAGE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_update_peage.php" method="post">
                                    <input type="submit" class="confirm" value="UPDATE PEAGE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> 
                   


                                          <?php   } 

                    }
                    else if ($_POST['table'] == 'Sortie') { ?>



                    <br> <br> <div> BDD SORTIE : </h2> </div> <br> 

                   <table>
                        <tr><th>Libelle</th><th>CodT</th><th>CodS</th><th>Numero</th> <td style="border-style: none; width: 0;"></td></tr>

                        <?php
                                $results_id = retrieve_sortie();
                                while ($row = $results_id->fetch_assoc())
                                {
                                
                                    printTableRow4($row['Libelle'], $row['CodT'], $row['CodS'], $row['Numero']);
                            
                                }

                        ?>

                   </table>

                        <?php 
                       
                        if ($_SESSION['mail'] == 'admin@gmail.com') 
                        {
                        ?>
                                    <br> <br>      
                                    </form> <form action="EA_MENAGER_insert_sortie.php" method="post">
                                    <input type="submit" class="confirm" value="INSERT SORTIE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_delete_sortie.php" method="post"> 
                                    <input type="submit" class="confirm" value="DELETE SORTIE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_update_sortie.php" method="post">
                                    <input type="submit" class="confirm" value="UPDATE SORTIE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> 
                                    <?php   } 

                    }
                    else if ($_POST['table'] == 'Registre') { ?>


                   <br> <br> <div> BDD REGISTRE : </h2> </div> <br> 

                   <table>
                        <tr><th>CodR</th><th>Descriptif</th><th>DateDeb</th><th>DateFin</th><th>CodePe</th> <td style="border-style: none; width: 0;"></td></tr>

                        <?php
                                $results_id = retrieve_registre();
                                while ($row = $results_id->fetch_assoc())
                                {
                                
                                    printTableRow5($row['CodR'], $row['Descriptif'], $row['DateDeb'], $row['DateFin'], $row['CodePe']);
                            
                                }

                        ?>

                   </table>

                        <?php 
                       
                        if ($_SESSION['mail'] == 'admin@gmail.com') 
                        {
                        ?>
                                    <br> <br>      
                                    </form> <form action="EA_MENAGER_insert_registre.php" method="post">
                                    <input type="submit" class="confirm" value="INSERT REGISTRE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_delete_registre.php" method="post"> 
                                    <input type="submit" class="confirm" value="DELETE REGISTRE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> <form action="EA_MENAGER_update_registre.php" method="post">
                                    <input type="submit" class="confirm" value="UPDATE REGISTRE" style="
                                         margin-left: 40px;
                                         border-top-width: 2px; 
                                         width: 150px; " >  
                                    </form> 
                                        <?php   } 

                    }
                   


                    
                    }?>



                         
<br> <br> 



             </div> 

       </section> 
     
        </div>
    </body>
</html>
