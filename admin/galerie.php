

     
<div id="gallery">
<div class="container-fluid">
    <div class="row">
      <!-- <div class="col-xs-12 col-md-6 about-img"> </div> -->
      <div class="col-xs-12 col-md-3 col-md-offset-1">
        <div class="about-text">
          
          <div class="section-title text-center">
              <h2>Galery</h2> 
          </div>
          <div class="container">
			<form  method="post" >

			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="nom">Nom</label>
			      <input type="text" class="form-control" id="nom" name="nom">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="description">Description</label>
			      <input type="text" class="form-control" id="description" name="description" >
			    </div>
			  </div>

			  <div class="form-row">
			    <div class="form-group col-md-4">
			      <label for="img">Photo</label>
			      <input type="file" class="form-control" id="img" name="img">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="date">Date</label>
			      <input type="date" class="form-control" id="date" name="date" >
			    </div>
			  </div>

			  <br> <br>
			  <div class="form-row">
			  	<div class="form-group col-md-8">

			  <button type="submit" class="btn btn-primary">Ajouter</button>
			</div></div>

			</form>
 		  </div>
	
	</div>
	</div>
	</div>
	</div>


<?php
// Ajout des données
require ('connexion.php');
  if (isset($_POST['nom']) AND isset($_POST['description']) AND isset($_POST['img']) AND isset($_POST['date']))
 
    {
 
  //création de la requête SQL permettant d'insérer les données   
  
  $requete=$bdd->prepare("INSERT INTO  galerie (`nom`, `description`, `photo`, `date`) VALUES (?,?,?,?)");
  $requete->execute(array($_POST['nom'], $_POST['description'], $_POST['img'], $_POST['date']));
  

	}
	
	
?>

<?php
 //lister le contenu du table réalisations

	require ('connexion.php');
	
	$reponse = $bdd->query('SELECT * FROM galerie');
	
?>


		</br>
		 <div class="container">


			<table class="table table-bordrered" width="50%" >
		 
			 <tr>
			<th cope="col">nom </th>
			<th cope="col">description</th>
			<th cope="col">photo </td>
			 <th cope="col">date </td>
			 <th cope="col"> Action </th>
			 
			 </tr>
	
	<?php 
	while ($donnees = $reponse->fetch())
	{
    ?>
		<tr>
		
		<td> <?php echo $donnees['nom']; ?>  </td>
		<td> <?php echo $donnees['description']; ?> </td>
		<td> <img src="<?php echo 'images/'.$donnees['photo']; ?>"  height="100" width="100"> </td>
		<td> <?php echo $donnees['date']; ?> </td>

	    <!--creer un button de suppression-->
		
	 <td> <a href="admin/supprimerGalerie.php?id=<?php echo $donnees['id'] ?> "> 
               <button  class="btn btn-danger" > <span class="glyphicon glyphicon-remove"></span></button>
             </a>
     
		
		<!--creer un button de modification-->
		
		<a  href="admin/modifierGalerie.php?id=<?php echo $donnees['id'] ?> "  target="_blank">
               <button  class="btn btn-info" > <span class="glyphicon glyphicon-edit"></span></button>
             </a>
        </td>
	  </tr>
	   
	 <?php 
	 
	}
	
	 ?>
	 
	</table>
</div>
	
	 <?php 
	 
	$reponse->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
?>
