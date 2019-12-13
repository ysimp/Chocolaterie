<?php
require ('connexion.php');	//connexion à la BDD
 if (isset($_GET['id'])){ 


//supprimer les données de  la BDD
$bdd->query('DELETE FROM galerie WHERE id='.$_GET['id']);

header("Location:../index-secretaire.php#gallery");
exit();
} 
?>