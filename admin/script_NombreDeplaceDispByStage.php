



<?php


if(isset($_GET['id'])){
    
    
    require('connexion.php');
    
    $reponse = $bdd->query("SELECT * from stage where id=".$_GET["id"]); 

    $don=$reponse->fetch();

   echo  $don["nbplace"];       
    
   
}

?>

