
        <!--=============================================================================================================== -->
        <!--========================== page :  SCRIPT enregistrer la candidature     ========================= -->
        <!--========================== parametre : rien ================= --> 
        <!--========================== traitement  : script appeler lorsque on click sur le botton ajouter du formulaire inscrption    ========== -->  
        <!--========================== Redirection  :  calenderier   ======= -->                          
        <!-- =============================================================================================================== --> 


    <!--=============================================================================================================== -->
    <!--=========================================== php  ============================================= -->
    <!-- =============================================================================================================== -->

<?php


/* qui stock cv  du candidature dans le dossier des images */
function copierCV()
{
    $ImageName = $_FILES['photo']['name'];
    $fileElementName = 'photo';
    $path = 'images/'; 
    $location = $path . $_FILES['photo']['name']; 
    move_uploaded_file($_FILES['photo']['tmp_name'], $location); 

}

if(isset($_POST['ajouter'])){ // si btn ajouter a ete clique 

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $adresse=$_POST['adresse']; 

    $ville=$_POST['ville'];
    $cp=$_POST['cp'];
    $tel=$_POST['telephone'];
    $date=$_POST['date'];   
    
    $stage=$_POST["idstage"];
    
    $cv=$_FILES['photo']['name'];
    $lettre=$_POST["lettre"];
    $etat='encour';
    
    copierCV();
    
    require('connexion.php');
    
    // ajouter dans la tablea PERSONNE
    
    $stmt = $bdd->prepare("INSERT INTO personne (nom, prenom, datenaissance, ville, codepostal,adresse,telephone,email) 
    VALUES (:nom, :prenom, :date, :ville, :cp,:adresse,:tel,:email)");

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':ville', $ville);

    $stmt->bindParam(':cp', $cp);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    // ajouter dans la table CANDIDATURE
    
    //1 recupere idPersonne qu'on vient d'ajouter dans la tablea personne
    
    $reponse=$bdd->query("select MAX(id) as id from personne");
    
    $personne=$reponse->fetch();
    
    $idpersonne=$personne["id"];
    
    // 2 ) inserer dans la tablea candidtaure

    
    
    $stmt2 = $bdd->prepare("INSERT INTO candidature (idpersonne, idstage, etat,cv,lettre ) VALUES (:idp, :idstage,:etat,:cv,:lettre) ");
    
    
    $stmt2->bindParam(':idp', $idpersonne);
    $stmt2->bindParam(':idstage', $stage);
    $stmt2->bindParam(':etat',$etat );
    $stmt2->bindParam(':lettre', $lettre);
    $stmt2->bindParam(':cv', $cv);
    
    $stmt2->execute();
    
    /* affiche une alert */
   $message='votre demande a ete bien envoyer';
    
   /* header("Location:calender.php?message=".$message);*/

   header("Location:index.php?message=".$message);

    exit();
}


?>