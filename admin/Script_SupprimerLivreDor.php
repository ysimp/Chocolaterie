        <!--=============================================================================================================== -->
        <!--========================== page :  supprime un commenatire      ========================= -->
        <!--========================== parametre : id du commenatire (livre dor )  ================= --> 
        <!--========================== traitement  :  supprimer le commenatire  avec ce id  ========== -->  
        <!--========================== Redirection  :  listeLivreDor     ======= -->                          
        <!-- =============================================================================================================== --> 
<?php


if(isset($_GET['id'])){
    
    $id=$_GET["id"];

    require('connexion.php');

	$bdd->query('DELETE FROM livredor WHERE id='.$id);
	
	header("Location:../index-secretaire.php#team");
	exit();
    
}

?>