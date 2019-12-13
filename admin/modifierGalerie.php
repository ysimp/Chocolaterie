<!doctype html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title> </title>
  </head>
  <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity=	"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



<?php
require ('connexion.php'); // connexion à la BDD

if (isset($_POST['enregistrer']) ) /*lorsqueon clique sur enregister*/
 
    {
	// récupérer les données modifiées saisies 
	$nom=$_POST['nom'];
	$description=$_POST['description'];
	$img=$_POST['img'];
	$date=$_POST['date'];
	// mettre à jour les données dans la BDD
  $stmt = $bdd->prepare("UPDATE galerie SET nom=:nom,description=:description,photo=:img,date=:date WHERE id=".$_POST['id'] );
  
	//Exécution d'une requête préparée en liant des variables PHP
	
				$stmt->bindParam(':nom', $nom);
				$stmt->bindParam(':description', $description);
				$stmt->bindParam(':img', $img);
				$stmt->bindParam(':date', $date);
				$stmt->execute();
	}
  
  
	 
  if( isset($_GET['id'])){ /*si on clique sur modifier */
  
  require ('connexion.php'); //connexion à la BDD
  
  //récupérer les données à modifier de la BDD
	
	$req=$bdd->query('SELECT * FROM galerie where id='.$_GET['id']);
	
	$reponse=$req->fetch();
	
	$nom=$reponse['nom'];
	$description=$reponse['description'];
	$img=$reponse['photo'];
	$date=$reponse['date'];
	$id=$reponse['id'];
  }
  
   
  
?>
<!-- fourmulaire de modification  rempli avec les données à modifier -->

<form method="post" >

       <?php
		echo "<input type='hidden' name='id' value=".$_GET["id"].">";
	  ?>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="nom">Nom</label>
       <?php
		echo "<input type='text' class='form-control' name='nom' value=".$nom.">";
	  ?>
    </div>
    <div class="form-group col-md-4">
      <label for="description">Description</label>
     <?php
		echo "<input type='text' class='form-control' name='description' value=".$description.">";
	  ?>
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="img">Photo</label>
      <?php
		echo "<input type='file' class='form-control' name='img' value=".$img.">";
	  ?>
    </div>
	<div class="form-group col-md-4">
      <label for="date">Date</label>
     <?php
		echo "<input type='date' class='form-control' name='date' value=".$date.">";
	  ?>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="enregistrer">Enregistrer</button>
</form>
 </div>
 <br>
 <br>
	
<a href="../index-secretaire.php#gallery">Retour à la liste</a>

</body>
</html>

