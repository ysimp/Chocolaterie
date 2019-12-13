        <!--=============================================================================================================== -->
        <!--========================== page : formulaire pour laisser un commenatire au entreprise     ========================= -->
        <!--========================== parametre : rien ================= --> 
        <!--========================== acteur  :  utilisateur public =================== --> 
        <!--========================== traitement  : enregistrer le commentaire dans la BD 
        puis plus tard secretariat va accepter ou refuser ce commentaire    ========== -->  
        <!--========================== Redirection  :  rien   ======= -->                          
        <!-- =============================================================================================================== --> 

    <!--=============================================================================================================== -->
    <!--=========================================== php  ============================================= -->
    <!-- =============================================================================================================== -->

    <?php
    
     require('connexion.php');

      /*<!--===================================================================== -->
       <!--==================== click sur btn envoyer    ============= -->
       <!-- ==================================================================== -->*/

    if(isset($_POST["envoyer"])) 
    {
    	
      $nom=$_POST["name"];
      $com=$_POST["commentaire"];
     $etat='encour';

      require('connexion.php');
  
    $stmt = $bdd->prepare("INSERT INTO livredor (nom,message,date,etat) VALUES (:nom, :message, :date, :etat) ");
    
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':message', $com);
    $stmt->bindParam(':date',  date("d/m/Y"));
    $stmt->bindParam(':etat', $etat);
    $stmt->execute();

        echo "<script> alert('votre messagea ete bien envoyer ') ; </script>";

    }

      ?>

     <!--=============================================================================================================== -->
    <!--=========================================== finphp  ============================================= -->
  <!-- =============================================================================================================== -->


<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
<body>
   	<!--=============================================================================================================== -->
    <!--=========================================== Center  ============================================= -->
	<!-- =============================================================================================================== -->

    <br>
    <br>
	<article>

		<div class="container">
            
                <form method="POST" >
                    
                    <!--===================================================================== -->
				    <!--==================== nom prenom ============= -->
                    <!--===================================================================== -->                    
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" name="name">
                    </div>
      
                    <!--===================================================================== -->
				    <!--==================== commentaire ============= -->
                    <!--===================================================================== -->
                    <div class="form-group shadow-textarea">
                      <label for="exampleFormControlTextarea6">commentaire :</label>
                      <textarea class="form-control z-depth-1" name="commentaire" rows="3" placeholder="Ecriver votre commentaire"></textarea>
                    </div>
                    
                     <!--===================================================================== -->
				    <!--==================== Button Envoyer  ============= -->
					<!-- ==================================================================== -->

					<div class="form-group col-md-12">
						<button type="submit" class="btn btn-primary mb-2 btn_ajout" name="envoyer"> 
							<span class="glyphicon glyphicon-ok"></span> 
							Envoyer 
						</button>
					</div>
                </form>
            			<!--===================================================================== -->
			            <!--==================== Fin Formulaire   ============= -->
		                <!-- ==================================================================== -->
		</div>

	</article>


	<!--=============================================================================================================== -->
    <!--===========================================  FIN Center  ============================================= -->
	<!-- =============================================================================================================== -->
    
</body>
</html>