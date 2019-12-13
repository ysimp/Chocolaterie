 <?php 

            $sql='SELECT * FROM livredor where etat="accepter"';

            $stmt=$bdd->prepare($sql);
            $stmt->execute();

            $list= $stmt->fetchAll(PDO::FETCH_OBJ);
  ?>

<!-- Team Section -->
<div id="team">
  <div class="container">
    <div id="row">
      
      <div class="section-title text-center">
       <h2>Commentaires</h2>
      </div>
          
         <?php foreach ($list as $real) : ?>
          <div class="card" >
              <div class="card-header text-center">
               <h3> <?=$real->nom ;?> </h3>
              </div>
              <div class="card-body">
              <!-- <h5 class="card-title">Special title treatment</h5> -->
              <p class="card-text"><?=$real->message ;?></p>
              <p><?=$real->reponse ;?></p>
            </div>

          </div>
            </br>
          <?php endforeach ;?>
        </div>


    </div>
        </br>
    <div class="text-center"> <a href="formlivre.php"  target="_blank" class="btn btn-primary">Envoyer nous un commentaire</a></div>
  </div>

</div>