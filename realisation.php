<?php 
        require 'connexion.php';

        $sql='SELECT * FROM realisation';

        $stmt=$bdd->prepare($sql);
        $stmt->execute();

        $realisations= $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
        <div class="section-title">
          <h2>Nos Réalisations</h2>
        </div>
        <div class="row">
           <?php foreach ($realisations as $real) : ?>

              <div class="col-xs-12 col-sm-4">
                <div class="features-item">
                  <h3> <?=$real->nom ;?> </h3>
                  <img src="img/specials/<?=$real->photo; ?>" class="img-responsive" alt="">
                  <p><?=$real->description ;?></p>
                </div>
              </div>

            <?php endforeach ;?>

      </div>
  </div>
</div>


