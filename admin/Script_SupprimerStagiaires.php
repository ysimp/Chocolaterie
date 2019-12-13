        <!--=============================================================================================================== -->
        <!--========================== page :  supprime un stagaire       ========================= -->
        <!--========================== parametre : idpersonne du stagaire a supprimer    ================= --> 
        <!--========================== traitement   :    ========== -->  
        <!--========================== Redirection  :  ModifierStage     ======= -->                          
        <!-- =============================================================================================================== --> 

<?php


if(isset($_GET['id'])){
    
    $id=$_GET["id"];

    require('connexion.php');

    /* recupere id stage du personne avant de le suprimer*/
    $rep=$bdd->query("select * from stagiare where idpersonne=".$id);

    $don=$rep->fetch();

    $idstage=$don["idstage"];
    
	$bdd->query('DELETE FROM stagiare WHERE idpersonne='.$id);
	
    $message='suppression du stagiaire  a ete bien effectuer';

	header("Location:ModifierStage.php?id=".$idstage."&message=".$message);
	exit(); 
    
}

?>