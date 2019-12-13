        <!--=============================================================================================================== -->
        <!--========================== page : examiner un candidat  (aceepter ou refuser )    ========================= -->
        <!--========================== parametre : id du stagaire  ================= --> 
        <!--========================== acteur  :  secretaiait  =================== --> 
        <!--========================== traitement  : afficher les infos du stagaire avec son cv et sa lettre de motivation 
        et un select pour accepter ou refuser 
        en cas d'acceptation on cree un nouveau compte (login et mot de pass )
        et on envoie un email au candidat   ========== -->  
        <!--========================== Redirection  :  rien   ======= -->                          
        <!-- =============================================================================================================== --> 

    <!--=============================================================================================================== -->
    <!--=========================================== php  ============================================= -->
	  <!-- =============================================================================================================== -->

    <?php
  require('connexion.php');
	/*
	* parametre : id // correspond au id stagiaire a examiner ( accepter ou refuser)
	* sortie : afficher les informations d'un stagiare avec comboobx pour accepet our refuser ce candidat 
	  puis redirectionner vers la page liste des des candidatures 
	*/

	  /*<!--===================================================================== -->
       <!--==================== click sur btn enregistrer    ============= -->
       <!-- ==================================================================== -->*/

	  if(isset($_POST["Enregistrer"])) 
	  {

	  	$id=$_POST["id"]; // id candidat 
	  	$etat=$_POST["etat"]; //nouveau etat

	  	// recuperer id stage  et son etat depuis candidat

	  	$req=$bdd->query('SELECT idstage,etat,idpersonne,email,datenaissance,nom
	  	 FROM candidature,personne where idpersonne=personne.id and candidature.id='.$id);

        $reponse=$req->fetch();

        $idstage=$reponse["idstage"];
        $ancienEtat=$reponse['etat'];
        $email=$reponse['email'];
        $date=$reponse['datenaissance'];
        $nom=$reponse['nom'];
        $idpersonne=$reponse['idpersonne'];

        // recuperer ancien nombre de place depuis stage 

		$req=$bdd->query('SELECT * FROM stage where id='.$idstage);

        $reponse=$req->fetch();
        
        $nbplace=$reponse['nbplace'];

        $test=true; // pour tester si nombre de place est suffisant ou non 

	  	if($etat=="accepter")
	  	{
                if($nbplace==0)
                {
                	echo '<script type="text/javascript">alert("Nombre de place insuffisant !");</script>';
                	$test=false; // on fait pas la modification 
                	
                	echo"false";

                }else{ 

                	// modifier candidat et dimunier nombre de place dispo envoyer email au candidat et cree son compte 

                	$nbplace=$nbplace-1;
                	$password=$nom.$date;

                	sendEmailTocandidatAccepter($email,$password);

                	$idcompte=creeUnnouveauCompte($email,$password);

                	creenouveauStagiaire($idcompte,$idstage,$idpersonne);
                }

	  	}

	  	if($test==true) // nb de place est suffisant 
	  	{
	  		/* modifier etat du candidat*/

	  		$stmt = $bdd->prepare("UPDATE candidature SET etat=:etat  WHERE id=".$_POST['id'] );
  
       		$stmt->bindParam(':etat', $etat);


			$stmt->execute();

			// modifier nombre de place dans stage

       		$stmt2 = $bdd->prepare("UPDATE stage SET nbplace=:nbplace  WHERE id=".$idstage );
       		$stmt2->bindParam(':nbplace', $nbplace);

       		$stmt2->execute();
	  	}

		

	  }

	    /*<!--===================================================================== -->
       <!--==================== Envoyer Email d'acceptation vers candidat    ============= -->
       <!-- ==================================================================== -->*/

       function sendEmailTocandidatAccepter($email,$password)
       {

       	    require('send.php');

       	    $object=" acceptation de candidat";
       	    $message=" felicitation voici votre login :" .$email." et votre motdepass:".$password;

       	    sendmail($email,$object,$message);
       }

       	/*<!--===================================================================== -->
       <!--====================ajouter nouveau compte et returner son id   ============= -->
       <!-- ==================================================================== -->*/
      
       function creeUnnouveauCompte($email,$password)
       {
       	 $role="candidature";

       	   require('connexion.php');

       	$stmt = $bdd->prepare("INSERT INTO compte (login,password,role) VALUES (:login, :password, :role, )");
    
		$stmt->bindParam(':login', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':role', $role);
		$stmt->execute();

		/* recupere id du nouveau compte */

		 $reponse=$bdd->query("select MAX(id) as id from compte");
    
		$personne=$reponse->fetch();
		    
		 $idpersonne=$personne["id"];

		 return $idpersonne;

       }


        /*<!--===================================================================== -->
       <!--==================== ajouter nouveau stagiaire  ============= -->
       <!-- ==================================================================== -->*/
       function creenouveauStagiaire($idcompte,$idstage,$idpersonne)
       {
       	     require('connexion.php');
       	       	$stmt = $bdd->prepare("INSERT INTO stagiare (idpersonne,idstage,idcompte) VALUES (:idpersonne, :idstage, :idcompte, )");
    
				$stmt->bindParam(':idpersonne', $idpersonne);
				$stmt->bindParam(':idstage', $idstage);
				$stmt->bindParam(':idcompte', $idcompte);
				$stmt->execute();
       }




	   /*<!--===================================================================== -->
       <!--==================== click sur btn Retour    ============= -->
       <!-- ==================================================================== -->*/

    if(isset($_POST["retour"]))
    {
    header("Location:../index-secretaire.php#gallery");
    exit();
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
  <title> Inscription </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    
     <!--=============================================================================================================== -->
    <!--=========================================== FIN  Head  ============================================= -->
	<!-- =============================================================================================================== -->  
<body>
    
   	<!--=============================================================================================================== -->
    <!--=========================================== Center  ============================================= -->
	<!-- =============================================================================================================== -->

    <br>
    <br>
	<article>

		<div class="container">

			   <!--===================================================================== -->
               <!--==================== Boutton Retourner    ============= -->
               <!-- ==================================================================== -->   

             <form method="post">

               <button type="submit" class="btn btn-primary"  name="retour" 
                     style="margin-left: 20px;" >
                    <span class="glyphicon glyphicon-arrow-left"> </span> Retourner
                </button>
              </form>

              <br>
                	<!--===================================================================== -->
               		<!--==================== requete : recupere info depuis BD ============= -->
               		<!-- ==================================================================== -->               
               		 <?php


                
                	$req=$bdd->query('SELECT * FROM candidature,personne where candidature.idpersonne=personne.id and candidature.id='.$_GET['id']);
	
	                $reponse=$req->fetch();
                
                    $nom=$reponse['nom'];
                    $prenom=$reponse['prenom'];
                    $email=$reponse['email'];
                    $adresse=$reponse['adresse'];

                    $tel=$reponse['telephone'];
                    $cp=$reponse['codepostal'];
                    $date=$reponse['datenaissance'];
                    $ville=$reponse['ville'];

                    $cv=$reponse['cv'];
                    $lettre=$reponse['lettre'];
                    $etat=$reponse['etat'];

                  
                   
                	?>
                    
                   <!--===================================================================== -->
		           <!--==================== cv  ============= -->
		           <!-- ==================================================================== -->
		           <div class="form-group">

		            <center>

		                 <a href="images/<?php echo $cv ?>" download> <button class="btn"><i class="fa fa-download"></i> cv 
		                 </button>  <a/>
		            </center>

		           </div>
			        <br/>
			        
			        <form method="POST"  >

			        	<!--===================================================================== -->
               			<!--==================== id candidat   ============= -->
               			<!-- ==================================================================== -->

                     <input  type="hidden" class="form-control" name="id" id="id" value="<?php echo $_GET["id"] ?> " />

      
            <!--===================================================================== -->
				    <!--====================  Nom et prenom  ============= -->
					<!-- ==================================================================== -->

					<div class="form-row">

						<div class="form-group col-md-6">
							<label for="nomprenom"> Nom</label> 
							<?php
                    echo "<input type='text' class='form-control' name='nom' value=".$nom.">";
                    ?>
						</div>
                        
						<div class="form-group col-md-6">
							<label for="nomprenom"> Prenom</label> 
							<?php
                  echo "<input type='text' class='form-control' name='prenom' value=".$prenom.">";
                  ?>
						</div>

					</div>
      
 				  	<!--===================================================================== -->
				    <!--==================== email et adress  ============= -->
					<!-- ==================================================================== -->       
      
 	  				<div class="form-row">

						<div class="form-group col-md-6">
							<label for="email">Email</label> 
							<?php
                    echo "<input type='email' class='form-control' name='email' value=".$email.">";
              ?>
						</div>

						<div class="form-group col-md-6">
							<label for="adresse">Adresse</label>
							<?php
                  echo "<input type='text' class='form-control' name='adresse' value=".$adresse.">";
                  ?>
						</div>

					</div>  
      
				  	<!--===================================================================== -->
				    <!--==================== ville et code postale  ============= -->
					<!-- ==================================================================== -->

	  				<div class="form-row">

						<div class="form-group col-md-6">
							<label for="email">Ville</label> 
							<?php
                  echo "<input type='text' class='form-control' name='ville' value=".$ville.">";
                  ?>
						</div>

						<div class="form-group col-md-6">
							<label for="adresse">Code Postale</label>
							<?php
                  echo "<input type='text' class='form-control' name='cp' value=".$cp.">";
                ?>
						</div>

					</div>    
      
  					<!--===================================================================== -->
				    <!--==================== Telephone et Date de naissance   ============= -->
					<!-- ==================================================================== -->

	  				<div class="form-row">

						<div class="form-group col-md-6">
							<label for="telephone">Telephone</label> 
							<?php
                  echo "<input type='text' class='form-control' name='telephone' value=".$tel.">";
              ?>
						</div>
                        
						<div class="form-group col-md-6">
							<label for="date">Date Naisssance</label> 
							<?php
                  echo "<input type='text' class='form-control' name='date' value=".$date.">";
                ?>
						</div>
						

					</div>  
                    
              <!--===================================================================== -->
	            <!--==================== lettre de motivation  ============= -->
              <!--===================================================================== -->
              
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label for="exampleFormControlTextarea6">Lettre de motivation  :</label>
                       <?php
                      echo "<textarea class='form-control' name='lettre' >".$lettre."</textarea>";
                      ?>
                  </div>
              </div>   

					<!--=============================================== ====================== -->
				    <!--==================== select : accepte , refuser ou  encour ============= -->
					<!-- ==================================================================== -->
					<div class="form-row">
						<div class="form-group col-md-12">
						  	<fieldset>
						    	<legend> Reponse :</legend>

			                    <select class="form-control form-control-lg" name="etat">
			                    	   <?php

				                    	   $tab=array('encour','accepter','refuser' );
				                    	   foreach ($tab as &$value) {
											    
											    if($value ==$etat)
											    {
											    	echo "<option selected>".$value." </option>";
											    }else
											    {
											      echo "<option >".$value." </option>";
											    }

											}

										?>
								  
								</select>

							</fieldset>
					    </div>
				   </div>
				   <br>
      
					<!--===================================================================== -->
				    <!--==================== Button Enregistrer  ============= -->
					<!-- ==================================================================== -->

					<div class="row">
                      <div class="col-sm-12">
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" name="Enregistrer"> Enregistrer</button>
                        </div>
                      </div>
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
    
     <!--=============================================================================================================== -->
    <!--===========================================javascript  ============================================= -->
    <!-- =============================================================================================================== -->

  <script type="text/javascript">
    
      
     

  </script>

  <!--=============================================================================================================== -->
  <!--===========================================  FIN javascript   ============================================= -->
  <!-- =============================================================================================================== -->
    
</body>
</html>