        <!--=============================================================================================================== -->
        <!--========================== page :  SCRIPT Liste des   candidat d'un stage donne       ========================= -->
        <!--========================== parametre : id du stage GET  ================= --> 
        <!--========================== traitement  : script appeler lorsque on click sur le botton ajouter du formulaire inscrption   ========== -->  
        <!--========================== Redirection  :  AJAX     ======= -->                          
        <!-- =============================================================================================================== --> 



<?php


if(isset($_GET['idstage'])){
    
   $idstage=$_GET["idstage"];
    
    require('connexion.php');
    
    $reponse = $bdd->query('SELECT candidature.id as id , nom,prenom,email,etat FROM stage,personne,candidature where
    stage.id=candidature.idstage and personne.id=candidature.idpersonne and  stage.id='.$idstage); 

    while ($donnees = $reponse->fetch())
    {
        echo " <tr>";
        echo "<th scope='row'>". $donnees["nom"]."</th>";
        echo "<td>".$donnees["prenom"]. " </td>";
        echo "<td>".$donnees["email"]. " </td>";
        
                // lien modifier stages
        echo "<td> <a href='admin/examinerCandidature.php?id=".$donnees['id']."' > <span class='glyphicon glyphicon-edit'> </span> </a></td>";
        
        echo "<td>".$donnees["etat"]. " </td>";
        echo " </tr>";
    }
    
   
}

?>

