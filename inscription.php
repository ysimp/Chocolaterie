        <!--=============================================================================================================== -->
        <!--========================== page : formulaire de candidature pour un stage donne   ========================= -->
        <!--========================== parametre : id du stagiaire GET   ================= --> 
        <!--========================== acteur  :  utilisateur public =================== --> 
        <!--========================== traitement  : afficher tous les stages  avec leur date et nb de place restant   ========== -->  
        <!--========================== Redirection  :  inscription  ======= -->                          
        <!-- =============================================================================================================== --> 

    <!--=============================================================================================================== -->
    <!--=========================================== php  ============================================= -->
	<!-- =============================================================================================================== -->

    <?php


        // si il n a pas choisir un stage 
         if(! isset($_GET["idstage"]))
         {
             //header("Location:login.php");
                  //  exit();
         }

        // sinon on affiche forumlaire d'insctipion 

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
            
                <form method="POST" action="postuler.php" enctype="multipart/form-data">
                    
                   <!--===================================================================== -->
		           <!--==================== cv  ============= -->
		           <!-- ==================================================================== -->
		           <div class="form-group">

		            <center>
		              <img  class="rounded float-left" 
		                   id="label" name="label" style="width: 200px;height: 200px;" /> 
		            </center>

		           </div>

					<div class="form-row">

			           <center>
			              <input type="file" class="form-control-file" id="image" name="photo" 
                			onchange="changerImage(this);"  />
                		</center>	

			        </div>

			        <br/>
      
                    <!--===================================================================== -->
				    <!--====================  Nom et prenom  ============= -->
					<!-- ==================================================================== -->

					<div class="form-row">

						<div class="form-group col-md-6">
							<label for="nomprenom"> Nom</label> 
							<input type="text"  required="required"  class="form-control" name="nom" placeholder="Nom" 
							oninvalid="setCustomValidity('nom  obligatoires')"
							oninput="setCustomValidity('')"  />
						</div>
                        
						<div class="form-group col-md-6">
							<label for="nomprenom"> Prenom</label> 
							<input type="text"  required="required"  class="form-control" name="prenom" placeholder="Prenom" 
							oninvalid="setCustomValidity('Prenom  obligatoires')"
							oninput="setCustomValidity('')"  />
						</div>

					</div>
      
 				  	<!--===================================================================== -->
				    <!--==================== email et adress  ============= -->
					<!-- ==================================================================== -->       
      
 	  				<div class="form-row">

						<div class="form-group col-md-6">
							<label for="email">Email</label> 
							<input type="email" class="form-control"   name="email" placeholder="email" 
								oninvalid="setCustomValidity('Email valide : _____@_____')"
								oninput="setCustomValidity('')" 
								/>
						</div>

						<div class="form-group col-md-6">
							<label for="adresse">Adresse</label>
							<input type="text" class="form-control" name="adresse" placeholder="adresse"
							 />
						</div>

					</div>  
      
				  	<!--===================================================================== -->
				    <!--==================== ville et code postale  ============= -->
					<!-- ==================================================================== -->

	  				<div class="form-row">

						<div class="form-group col-md-6">
							<label for="email">Ville</label> 
							<input type="text" class="form-control"   name="ville" placeholder="ville" 
								
								 />
						</div>

						<div class="form-group col-md-6">
							<label for="adresse">Code Postale</label>
							<input type="text" class="form-control" name="cp" placeholder="Code Postal"
							     pattern="[0-9]*" minlength="5" maxlength="5" placeholder="telephone"
								oninvalid="setCustomValidity(' code Postale valide : 5 chiffres ')"
							    oninput="setCustomValidity('')" />
						</div>

					</div>    
      
  					<!--===================================================================== -->
				    <!--==================== Telephone et Date de naissance   ============= -->
					<!-- ==================================================================== -->

	  				<div class="form-row">

						<div class="form-group col-md-6">
							<label for="telephone">Telephone</label> 
							<input type="text"   class="form-control" name="telephone"  
								pattern="[0-9]*" minlength="8" maxlength="8" placeholder="telephone"
								oninvalid="setCustomValidity(' Telephone valide : 8 chiffres ')"
							    oninput="setCustomValidity('')" />
						</div>
                        
						<div class="form-group col-md-6">
							<label for="date">Date Naisssance</label> 
							<input required="required" type="date" class="form-control" 
							name="date" id="date"/>
						</div>
						

					</div>  
                    
                    <!--===================================================================== -->
				    <!--==================== lettre de motivation  ============= -->
                    <!--===================================================================== -->
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea6">Lettre de motivation  :</label>
                            <textarea class="form-control z-depth-1" name="lettre" rows="3" placeholder="ta motivation..."></textarea>
                        </div>
                    </div>   
      
					<!--===================================================================== -->
				    <!--==================== Button Ajouter  ============= -->
					<!-- ==================================================================== -->

					<div class="row">
                      <div class="col-sm-12">
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" name="ajouter"> Envoyer!</button>
                        </div>
                      </div>
                    </div>
                    
                    <!--===================================================================== -->
				    <!--=================== afficher Id du stage (pour transfere plus tard )== -->
					<!-- ==================================================================== -->
                    
                      <?php
                        echo "<input type='hidden' name='idstage' value=".$_GET['idstage'].">";
                      ?>
      
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
    
        /*<!--===================================================================== -->
        <!--=== fonction qui permer d'affciher nouveau imager selectioner ======== -->
        <!-- ==================================================================== --> */  

    function changerImage(input)
    {

      $('#label')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);

    }
      
        /*<!--===================================================================== -->
        <!--=== chargement du page  ======== -->
        <!-- ==================================================================== --> */ 
      window.onload=RemplirDatePardefault();
      
      
         /*<!--===================================================================== -->
        <!--=== afficher date actuel dans champs date de naissance   ======== -->
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
     

  </script>

  <!--=============================================================================================================== -->
  <!--===========================================  FIN javascript   ============================================= -->
  <!-- =============================================================================================================== -->
    
</body>
</html>