
        <!--=============================================================================================================== -->
        <!--========================== page :  SCRIPT Ajouter  stage      ========================= -->
        <!--========================== parametre : theme , date debut et fin , description du stage a jouter dans la base   ================= --> 
        <!--========================== traitement  : script appeler lorsque on click sur le botton ajouter du formulaire inscrption   ========== -->  
        <!--========================== Redirection  :  AJAX     ======= -->                          
        <!-- =============================================================================================================== --> 

<?php


	if(isset($_GET['theme'])){
	    
		$theme=$_GET['theme'];
		$debut=$_GET['debut'];
		$fin=$_GET['fin'];
		$nbplace=$_GET['nbplace'];
		$desc=$_GET['description'];

		require('connexion.php');
			
			$stmt = $bdd->prepare("INSERT INTO stage (theme,debut,fin,description,nbplace) VALUES (:theme, :debut, :fin, :desc,:nbplace)");
		    
		$stmt->bindParam(':theme', $theme);
		$stmt->bindParam(':debut', $debut);
		$stmt->bindParam(':nbplace', $nbplace);
		$stmt->bindParam(':fin', $fin);
		$stmt->bindParam(':desc', $desc);

		$stmt->execute();

	}
?>