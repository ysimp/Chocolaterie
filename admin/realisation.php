<?php 

      /*--====================  Script php pour remplir le tableau  =============-->*/
        require 'connexion.php';

        $sql='SELECT * FROM realisation';

        $stmt=$bdd->prepare($sql);
        $stmt->execute();

        $realisations= $stmt->fetchAll(PDO::FETCH_OBJ);

      /*--====================  Fin Script php pour remplir le tableau  =============-->*/

  /*--====================  Script php pour Ajouter ou modifier une ralisation  =============-->*/
  if (isset($_POST['btn_ajout'])) {

    $id=$_POST['idreal'];

    $ImageName = $_FILES['photo']['name'];
    $fileElementName = 'photo';
    $path = 'img/specials1/'; 
    $location = $path . $_FILES['photo']['name']; 
    move_uploaded_file($_FILES['photo']['tmp_name'], $location);

    /*--====================  Si l'id est vide c'est un ajout  =============-->*/
    if($id==""){
      $sql='INSERT INTO realisation(id,nom,description,photo) VALUES ("",:nom,:descrip,:photo)';
      $stmt=$bdd->prepare($sql);
      $response=$stmt->execute([":nom"=>$_POST['nom'], ":descrip"=>$_POST['desc'],":photo"=>$ImageName]);
    }
    /*--====================  Sinon l'id c'est une modification  =============-->*/
    else{
   
     $sql='UPDATE realisation SET nom=:nom, description=:descrip,photo=:photo WHERE id = :id';
     $stmt=$bdd->prepare($sql);
     $response=$stmt->execute([":nom"=>$_POST['nom'], ":descrip"=>$_POST['desc'],":photo"=>$ImageName,":id"=>$_POST['idreal']]);
    }
    
      header('location:index-secretaire.php');
  }

  /* --====================  Script php pour supprimer une ralisation  =============--> */
    if (isset($_POST['btn_supp'])) {
      
      $sql='DELETE FROM realisation WHERE id = :id';
      $stmt=$bdd->prepare($sql);
      $response=$stmt->execute([":id"=>$_POST['idsupp']]);
      header('location:index-secretaire.php');
      
    }
    
?>

<!-- Features Section -->
<!-- <div id="features" class="text-center"> -->
<div id="features">
  <div class="container">
        <div class="section-title text-center">
          <h2>Nos Réalisations</h2>
        </div>

          
         

        <!--===================================================================== -->
        <!--====================  Affichage de tous les realisations ============= -->
        <!-- ==================================================================== -->
        <a href="" class="btn btn-info" data-toggle="modal" data-target="#ajout_real" style="margin-bottom: 10px"> <span class="glyphicon glyphicon-plus"></span></a>
        <table class="table table-bordrered" width="50%">

           
           
          <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
           
          <?php foreach ($realisations as $real) : $desc=substr($real->description,0,50).'...' ; ?>
            <tr>
              <td><img src="img/specials/<?=$real->photo; ?>" height="70" width="70"></td>
              <td><?=$real->nom ;?></td>
              <td><?=$desc;?></td>
              <td>

                
           
                <a href="" onclick="chargerinfo('<?=$real->id; ?>','<?=$real->nom ;?>','<?=$real->description?>','<?=$desc;?>')" class="btn btn-info"  data-toggle="modal" data-target="#ajout_real"> <span class="glyphicon glyphicon-edit"></span></a>
               
                <a href="#" onclick="chargerid('<?=$real->id; ?>')" class="btn btn-danger" data-toggle="modal" data-target="#supp_real"> <span class="glyphicon glyphicon-remove"></span></a>
              </td>
            </tr>
          <?php endforeach ;?>
        </table>
        <!--========================================================================= -->
        <!--====================  Fin Affichage de tous les realisations =============-->
        <!--========================================================================= -->
  </div>


    <!--===================================================================== -->
    <!--==================== Formulaire Ajouter Realisation  ============= -->
    <!-- ==================================================================== -->
    
    <div class="modal" id="ajout_real" role="dialog">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <!-- header du formulaire  -->

            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title text-center">Ajouter Réalisation</h5>

          </div>

          <!-- Contenu  du formulaire  -->
          <form method="POST" enctype="multipart/form-data">
          <div class="modal-body">

            

              <input  type='hidden' class="form-control" id="idreal" name="idreal" value="" />

              <div class="form-group">
                <label for="nom" class="form-control-label">Nom</label> 
                <input  type="text" class="form-control" id="nom" name="nom"/>
              </div>

              <div class="form-group">
                <label for="contenu" class="form-control-label">Description :</label>
                <textarea class="form-control" id="desc" name="desc"></textarea>
              </div>

              <div class="form-group">
                <label for="titre" class="form-control-label">photo</label> 
                <input  type="file" class="form-control" required id="photo" name="photo"/>
              </div>    
            

          </div>

          <!-- footer  du modal  -->

          <div class="modal-footer">

            <button type="button" class="btn btn-secondary"
                  data-dismiss="modal">Annuler</button>

            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Ajouter</button> -->

            <input type="submit" name="btn_ajout" value="Enregistrer" class="btn btn-primary">

          </div>
          </form>
          <!-- </form> -->

        </div>

      </div>

    </div> 

    <!--===================================================================== -->
    <!--====================  FIN Formulaire Ajouter Publication  ============= -->
    <!-- ==================================================================== -->


    <!--===================================================================== -->
    <!--====================  Modal Suppression  ============= -->
    <!-- ==================================================================== -->

      <div class="modal" tabindex="-1" id="supp_real" role="dialog">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form method="POST">
        <div class="modal-body">
          <input type="hidden" name="idsupp" id="idsupp">
        <p>Etes-vous sur de vouloir supprimer cette realisation?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <input type="submit" class="btn btn-primary" value="supprimer" name="btn_supp"/> 
      </div>
      </form>
      
    </div>
  </div>
</div>

    <!--===================================================================== -->
    <!--====================  Fin Modal Suppression  ============= -->
    <!-- ==================================================================== -->


</div>


<script type="text/javascript">

  /*--====================  Script permet de remplir les champs lors de la modification  =============-->*/
  function chargerinfo(id,nom,desc,photo){

    document.getElementById("idreal").value=id;
    document.getElementById("nom").value=nom;
    document.getElementById("desc").value=desc;
    document.getElementById("photo").value=photo;
  }

/*--====================  Script permet charger l'id qui sera utile lors la suppression  =============-->*/
  function chargerid(id){

    document.getElementById("idsupp").value=id;
  }
</script>