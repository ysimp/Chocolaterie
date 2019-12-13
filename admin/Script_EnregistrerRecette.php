        <!--=============================================================================================================== -->
        <!--========================== page :  SCRIPT Ajouter / Modifier un   stage  appelr avec AJAX      ========================= -->
        <!--========================== parametre : id,theme , date debut et fin , description du stage a jouter dans la base   ================= --> 
        <!--========================== traitement  : script appeler lorsque on click sur le botton Enregistrer du formulaire ajout recette du page modifier stage    ========== -->  
        <!--========================== Redirection  :  AJAX     ======= -->                          
        <!-- =============================================================================================================== --> 


<?php

/* qui stock image  du candidature dans le dossier des images */
function copierImage()
{

	 $ImageName = $_FILES['photo']['name'];
    $fileElementName = 'photo';
    $path = 'images/'; 
    $location = $path . $_FILES['photo']['name']; 
    move_uploaded_file($_FILES['photo']['tmp_name'], $location); 
   
   return  $ImageName; // retunrner le nom du image qui etait selectionner
}

if(isset($_POST['nom'])){ // si btn enregistrer a ete clique 

$nom=$_POST["nom"];
$date=$_POST["date"];
$desc=$_POST["description"];
$photo=copierImage();
$idstage=$_POST["idstage"];

$id=$_POST["idrecette"];

print_r($_POST);

 require('connexion.php');

if($id=="") // le cas d'ajout
{
   $stmt2 = $bdd->prepare("INSERT INTO recette (nom, idstage, photo,date,description ) VALUES (:nom, :idstage,:photo,:date,:description) ");
    
    
    $stmt2->bindParam(':nom', $nom);
    $stmt2->bindParam(':idstage', $idstage);
    $stmt2->bindParam(':photo',$photo );
    $stmt2->bindParam(':date', $date);
    $stmt2->bindParam(':description', $desc);
    
    $stmt2->execute();

}else // modifier le recette
{

  $stmt3 = $bdd->prepare("UPDATE recette SET nom=:nom,photo=:photo,date=:date,description=:description WHERE id=".$id );
  
    $stmt3->bindParam(':nom', $nom);
    $stmt3->bindParam(':photo',$photo);
    $stmt3->bindParam(':date', $date);
    $stmt3->bindParam(':description', $desc);

    $stmt3->execute();

}

    header("Location:ModifierStage.php?id=".$idstage);
	exit();
   
}


?>