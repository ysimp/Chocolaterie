        <!--=============================================================================================================== -->
        <!--========================== page : Modifier stage      ========================= -->
        <!--========================== parametre : id du stage  GET   ================= --> 
        <!--========================== acteur  :   SECRETARIAT =================== --> 
        <!--========================== traitement  : modifier un stage ( afficher les infos du stage ou les modifier  , liste des recette , liste des stagiaire ) et on peut ajouter nouveau recette , modifier recette ou le supprimer et supprimer un stagaire   ========== -->  
        <!--========================== Redirection  :  ModifierRecette    ======= -->                          
        <!-- =============================================================================================================== --> 

    <!--=============================================================================================================== -->
    <!--=========================================== php  ============================================= -->
	  <!-- =============================================================================================================== -->
    
    <?php

    
    require('connexion.php');

      /*<!--===================================================================== -->
       <!--==================== session     ============= -->
       <!-- ==================================================================== -->*/

    if(!isset($_GET['id'])){ // on doit bloke si on lui passe pas id 
        
    }

        /*<!--===================================================================== -->
       <!--==================== afficher les message   ============= -->
       <!-- ==================================================================== -->*/ 


      if(isset($_GET["message"])) 
    {
      echo '<script language="javascript">';
      echo 'alert("'.$_GET["message"].'")';
      echo '</script>';


    } 

        /*<!--===================================================================== -->
       <!--==================== click sur btn Retour    ============= -->
       <!-- ==================================================================== -->*/

    if(isset($_POST["retour"]))
    {
    header("Location:../index-secretaire.php#restaurant-menu");
    exit();
    }

    
       /*<!--===================================================================== -->
       <!--==================== click sur btn Enregister    ============= -->
       <!-- ==================================================================== -->*/

    if(isset($_POST['Enregistrer'])){
    
    $theme=$_POST["theme"];
    $debut=$_POST["debut"];
    $nbplace=$_POST["nbplace"];
    $fin=$_POST["fin"];
    $desc=$_POST["description"];



    $stmt = $bdd->prepare("UPDATE stage SET theme=:theme,debut=:debut,fin=:fin,description=:description ,nbplace=:nbplace WHERE id=".$_GET['id'] );
  
        $stmt->bindParam(':debut', $debut);
        $stmt->bindParam(':fin', $fin);
        $stmt->bindParam(':theme', $theme);
        $stmt->bindParam(':nbplace', $nbplace);
        $stmt->bindParam(':description', $desc);
        $stmt->execute();


    }
    
    ?>

    <!--=============================================================================================================== -->
    <!--=========================================== fin php   ============================================= -->
	<!-- =============================================================================================================== --> 

<!DOCTYPE html>
<html lang="en">
    
    <!--=============================================================================================================== -->
    <!--=========================================== Head  ============================================= -->
	<!-- =============================================================================================================== -->
<head>
    
  <title>Modifier Stage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    

    <!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">
</head>
   
    <!--=============================================================================================================== -->
    <!--=========================================== FIN Head  ============================================= -->
	<!-- =============================================================================================================== -->  

<body>
    
   
    
   	<!--=============================================================================================================== -->
    <!--=========================================== Center  ============================================= -->
	<!-- =============================================================================================================== -->

    <br>
    <br>
    
    <div class="container">
            
      <!--===================================================================== -->
		  <!--==================== Formulaire contient les infos du stage ============= -->
			<!-- ==================================================================== -->

                <!--===================================================================== -->
               <!--==================== Boutton Retourner    ============= -->
               <!-- ==================================================================== -->   

             <form method="post">

               <button type="submit" class="btn btn-info"  name="retour" 
                     style="margin-left: 20px;" >
                    <span class="glyphicon glyphicon-arrow-left"> </span> 
                </button>
              </form>

              <br>

            <form method="post">
                
                <!--===================================================================== -->
               <!--==================== requete : recupere info depuis BD ============= -->
               <!-- ==================================================================== -->               
                <?php


                
                	$req=$bdd->query('SELECT * FROM stage where id='.$_GET['id']);
	
	                $reponse=$req->fetch();
                
                    $theme=$reponse['theme'];
                    $debut=$reponse['debut'];
                    $fin=$reponse['fin'];
                    $nbplace=$reponse['nbplace'];
                    $desc=$reponse['description'];
                
                  
                   
                ?>
               <!--===================================================================== -->
               <!--==================== id stage   ============= -->
               <!-- ==================================================================== -->

                     <input  type="hidden" class="form-control" name="id" id="id" value="<?php echo $_GET["id"] ?> " /> 
               
               <!--===================================================================== -->
               <!--==================== theme et nombre de place dispo  ============= -->
               <!-- ==================================================================== -->
                      <div class="form-row">

                        <div class="form-group col-md-6">
                          <label for="titre" class="form-control-label">theme :</label> 
                          <?php
                            echo "<input type='text' class='form-control' name='theme' value=".$theme.">";
                            ?>
                        </div>

                        <div class="form-group col-md-6">
                          <label for="titre" class="form-control-label">Nombre de place Disponible :</label> 
                          <?php
                            echo "<input type='number' class='form-control' name='nbplace' value=".$nbplace.">";
                            ?>
                        </div>
                      </div>

                <!--===================================================================== -->
               <!--==================== Date debut et fin  ============= -->
               <!-- ==================================================================== -->                   

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="debut">Date Debut</label> 
                            <?php
                            echo "<input type='date' class='form-control' name='debut' value=".$debut.">";
                            ?>
                            
                         </div>

                        <div class="form-group col-md-6">
                            <label for="date">Date Fin</label> 
                             <?php
                                echo "<input type='date' class='form-control' name='fin' value=".$fin.">";
                             ?>
                         </div>

                    </div>

               <!--===================================================================== -->
               <!--==================== Description   ============= -->
               <!-- ==================================================================== -->
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="contenu" class="form-control-label">Description :</label>
                         <?php
                            echo "<textarea class='form-control' name='description' >".$desc."</textarea>";
                            ?>
                        </div>
                    </div>
                
                    <!--===================================================================== -->
                    <!--==================== Button Enregistrer info stage  ============= -->
                  <!-- ==================================================================== -->

                  <div class="row">
                        <div class="col-sm-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-info" name="Enregistrer"> 
                            <span class="glyphicon glyphicon-save"> </span> 
                            Enregistrer </button>
                          </div>
                        </div>
                  </div>

				</form>

    </div>
    
      <!-- ==================================================================== -->
			<!--==================== Affiche Table Liste des recettes   ============= -->
		    <!-- ==================================================================== -->
    
    <div class="container">
			<hr/>
      <br>
      <br>
            <div class="section-title text-center">
              <h2>Liste des recettes  </h2> 
            </div>
			
        
               <!--===================================================================== -->
               <!--==================== Boutton Ajouter Recette    ============= -->
               <!-- ==================================================================== -->        
           
           <button type="button" class="btn btn-info" data-toggle="modal"
                data-target="#myModal"   style="margin-bottom: 10px">
                <span class="glyphicon glyphicon-plus"> </span> 
            </button>
			

			     <table class="table table-bordrered" width="50%" >

					<!-- ==================================================================== -->
					<!--==================== entete  du table  ============= -->
		    		<!-- ==================================================================== -->


						<tr>
							<th >photo</th>
							<th >Nom </th>
							<th >Date</th>
              <th >Description</th>
              <th >Action</th>
						</tr>

					<!-- ==================================================================== -->
					<!--==================== contenu du table liste recette  ============= -->
		    		<!-- ==================================================================== -->

					<tbody >
                        
            <?php
            
            $reponse = $bdd->query('SELECT * FROM recette where idstage='.$_GET['id']);
            
            while ($donnees = $reponse->fetch())
         {
                echo " <tr>"; ?>

               <!--===================================================================== -->
               <!--==================== Image recette  ============= -->
               <!-- ==================================================================== -->
            
                <th scope='row'> <img src="<?php echo 'images/'.$donnees['photo']; ?>"  height="100" width="100"></th>
            
                <?php
                echo "<td>".$donnees["nom"]. " </td>";
                echo "<td>".$donnees["date"]. " </td>";
                echo "<td>".$donnees["description"]. " </td>";?>

                 <!--===================================================================== -->
               <!--=====lien modifier recette  =========== -->
               <!-- ==================================================================== -->


                 
                <td> <a  onclick="remlpirModal(<?php echo $donnees['id'].",'".$donnees["nom"]."','".$donnees['date']."','".$donnees['description']."','".$donnees['photo'] ."'" ?> ) " > 

                      <button type="button" class='btn btn-info'data-toggle="modal"data-target="#myModal" >
                      <span class="glyphicon glyphicon-edit"> </span>  </button>
                     </a>
                  
 

                <!--===================================================================== -->
               <!--=====lien supprimer stage avec confirmation avant la suppreession =========== -->
               <!-- ==================================================================== -->
                 
                <a href="Script_SupprimerRecette.php?id=<?php echo $donnees["id"] ?> "
                         onclick="return confirm('voulez vous supprimer cette recette ?');"> 
                       <button type="button" class="btn btn-danger" data-toggle="modal"data-target="#myModal" >
                      <span class="glyphicon glyphicon-remove"> </span>  </button>
                     </a>
                  </td>
            
            <?php 

            } // fin while 
            
            ?>
						
					</tbody>

			</table>
		
			<br/>
			<br/>
			<hr/>

		</div> 
    
      <!-- ==================================================================== -->
			<!--==================== Affiche Table Liste des stagiaire   ============= -->
		  <!-- ==================================================================== -->
    
    <div class="container">
			<hr/>
            <div class="section-title text-center">
              <h2>Liste des stagiaires   </h2> 
            </div>
			

			<table class="table">

					<!-- ==================================================================== -->
					<!--==================== entete  du table  ============= -->
		    		<!-- ==================================================================== -->

						<tr>
							<th scope="col">Nom</th>
							<th scope="col">prenom </th>
							<th scope="col">Email</th>
              <th scope="col">telephone</th>
              <th scope="col">Supprimer</th>
						</tr>

					<!-- ==================================================================== -->
					<!--==================== contenu du table liste stagiaires  ============= -->
		    	<!-- ==================================================================== -->

					<tbody >
                        
            <?php
            
            $reponse = $bdd->query('SELECT * FROM stagiare,personne where stagiare.idpersonne=personne.id and  stagiare.idstage='.$_GET['id']);
            
            while ($donnees = $reponse->fetch())
            {
                echo " <tr>";
                echo "<th scope='row'> ".$donnees["nom"]."</th> ";
                echo "<td>".$donnees["prenom"]. " </td>";
                echo "<td>".$donnees["email"]. " </td>";
                echo "<td>".$donnees["telephone"]. " </td>"; ?>
                
                <!--===================================================================== -->
               <!--=====lien supprimer stage avec confirmation avant la suppreession =========== -->
               <!-- ==================================================================== -->
                 
                 <td> <a href="Script_SupprimerStagiaires.php?id=<?php echo $donnees['id'] ?> " 
                         onclick="return confirm('voulez vous supprimer cette stagiaire ?');"> 
                       <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </button>
                     </a>
                </td>
            
              <?php 

              }
            
            ?>
						
					</tbody>

			</table>
		
			<br/>
			<br/>
			
			<hr/>
		</div> 
    
    <!--===================================================================== -->
    <!--==================== Formulaire Enregistrer Recette  ============= -->
    <!-- ==================================================================== -->
   <form  method="POST"  name="f" action="Script_EnregistrerRecette.php" enctype="multipart/form-data" >

    <div class="modal fade" id="myModal" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

          <!-- ==================================================================== -->
          <!--==================== header du formulaire:  Botton ajouter  ============= -->
          <!-- ==================================================================== -->

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Enregistrer Recette </h4>

          </div>
          <!-- ==================================================================== -->
          <!--====================  Contenu  du formulaire  ============= -->
          <!-- ==================================================================== -->

          
          <div class="modal-body">

            <!--===================================================================== -->
            <!--==================== id stage et id recette  ============= -->
          <!-- ==================================================================== -->

                <input  type="hidden" class="form-control"  name="idstage" value="<?php echo $_GET["id"] ?> " /> 
                <input  type="hidden"  class="form-control"  id="idrecette" name="idrecette"   readonly/>
            <!--===================================================================== -->
            <!--==================== image du recette   ============= -->
          <!-- ==================================================================== -->                

                <div class="form-row">
                 <center>
                    <input type="file" class="form-control-file" id="photo" name="photo" required="required" 
                       oninvalid="setCustomValidity('nom  obligatoires')"
                      oninput="setCustomValidity('')"/>
                    </center> 
                </div>

            <!--===================================================================== -->
            <!--==================== nom et date du recette  ============= -->
          <!-- ==================================================================== -->

                <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="titre" class="form-control-label">Nom :</label> 
                    <input  type="text" class="form-control" id="nom" name="nom"/>
                 </div>

                  <div class="form-group col-md-6">
                      <label for="date">Date</label> 
                      <input required="required" type="date" class="form-control" 
                      id="date"  name="date"/>
                   </div>
                  
              </div>

            <!--===================================================================== -->
            <!--==================== Description   ============= -->
          <!-- ==================================================================== -->             
                            
              <div class="form-group">
                <label for="contenu" class="form-control-label">Description :</label>
                <textarea  class="form-control" id="description" name="description"></textarea>
              </div>

          </div>
          <!-- ==================================================================== -->
          <!--==================== footer  du modal : boutton Enregistrer et annuler   ============= -->
          <!-- ==================================================================== -->

          <div class="modal-footer">

            <button type="button" class="btn btn-secondary"
                  data-dismiss="modal">Annuler</button>

            <button type="submit" class="btn btn-primary" 
                 >Enregistrer</button>

          </div>

        </div>
      </div>

    </div>

  </form>

    <!--===================================================================== -->
    <!--====================  FIN Formulaire Ajouter Recette  ============= -->
    <!-- ==================================================================== -->
    
    <!--=============================================================================================================== -->
    <!--=========================================== javascript  ============================================= -->
    <!-- =============================================================================================================== -->
    
    <script language="JavaScript">
        
       /*<!--===================================================================== -->
        <!--===  remlpir formulaire  avec les informtaions du recette  ======== -->
        <!-- ==================================================================== --> */ 

      function remlpirModal(id,nom,date,description,photo)
      {

        document.getElementById("idrecette").value = id;
        document.getElementById("date").value = date;
        document.getElementById("nom").value = nom;
       
        document.getElementById("description").value = description;


      }


         /*<!--===================================================================== -->
        <!--===  afficher date actuel dans input date  ======== -->
        <!-- ==================================================================== --> */ 
        function RemplirDatePardefault()
      {
            var date = new Date();
            var day = date.getDate();  
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var today = year + "-" + month + "-" + day;       
            document.getElementById("date").value = today;

      }

         /*<!--===================================================================== -->
        <!--===  lors de la chargement du page  ======== -->
        <!-- ==================================================================== --> */ 
         window.onload=function()
         {

             RemplirDatePardefault();
         }
        
    </script>
       
    <!--=============================================================================================================== -->
    <!--=========================================== FIN javascript  ============================================= -->
	<!-- =============================================================================================================== -->
    
</body>
</html>
                                                                                                                        