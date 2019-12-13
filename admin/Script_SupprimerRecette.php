        <!--=============================================================================================================== -->
        <!--========================== page :  supprime une rectte du stage donne       ========================= -->
        <!--========================== parametre : id du rectte GET   ================= --> 
        <!--========================== traitement  :  supprimer  ========== -->  
        <!--========================== Redirection  :  ModifierStage     ======= -->                          
        <!-- =============================================================================================================== --> 


<?php

// script : sera appeler lors de click sur le icon supprimer  recette 
// parametre : id 
// effet : supprimer le stage avec ce id puis redirection vers la page listeStage.php


if(isset($_GET['id'])){
    
    $id=$_GET["id"];

    require('connexion.php');

    /* recupere id stage du recete avant de le suprimer*/
    $rep=$bdd->query("select * from recette where id=".$id);

    $don=$rep->fetch();

    $idstage=$don["idstage"];
    
	$bdd->query('DELETE FROM recette WHERE id='.$id);
	
     $message='suppression du recette  a ete bien effectuer';

	header("Location:ModifierStage.php?id=".$idstage."&message=".$message);
	exit();
    
}

?>