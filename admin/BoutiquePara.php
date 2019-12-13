<!-- <?php
  // ouvrir le fichier en lecture seule
  $handle = fopen("admin/monfic.txt", "r");
  if ($handle) { 
    $cpt = 0;    
    $tableau = array(); // creer un tableau contentant les données lus 
    while (($buffer = fgets($handle, 4096)) !== false)
    { // récupérer chaque ligne du fichier et la mettre dans une varible 
     $tableau[$cpt] = $buffer; //  remplier le tableau avec les données récupérées
     $cpt ++;
    } 

    if (!feof($handle)) { // si c'est la fin du fichier 
        echo "Erreur: fgets() a échoué\n";
    }
    fclose($handle); //fermer le fichier 
  }

    //mettre chaque case du tableau dans une varible 
       $i=0;
      while($i <= 9){
      $var = "var".$i;
      $$var = $tableau[$i];
     $i++;
    }
?> -->
<?php 
  include 'infoboutique.php'; 
?>

   
   <div id="about">
  <div class="container-fluid">
    <div class="row">
      <!-- <div class="col-xs-12 col-md-6 about-img"> </div> -->
      <div class="col-xs-12 col-md-3 col-md-offset-1">
        <div class="about-text">
          
          <div class="section-title text-center">
              <h2>Parametrage</h2> 
          </div>

          <div class="container">
              <form id="paramétrage" method="post" action="admin/FichierTxt.php">
                  <div class="form-group">
                    <label for="nom">nom : </label>
                    <input type="nom" class="form-control" id="nom" name="nom" value="<?php print $var0; ?>">
                  </div>
                  <div class="form-group">
                    <label for="adresse">adresse:</label>
                    <input type="text" class="form-control"  id="adresse" name="adresse" value="<?php print $var1; ?>">
                  </div>
                  <div class="form-group">
                    <label for="tél">tél :</label>
                    <input type="tel" class="form-control" id="tel" name="tel" value="<?php print $var2; ?>" >
                  </div>
                   <div class="form-group">
                    <label for="portable">portable :</label>
                    <input type="tel" class="form-control" id="portable" name="portable" value="<?php print $var3; ?>" >
                  </div>
                  <div class="form-group">
                    <label for="code postal">code postal :</label>
                    <input type="text" class="form-control" id="codepostal" name="codepostal" value="<?php print $var4; ?>" >

                   <div class="form-group">
                    <label for="ville">ville :</label>
                    <input type="text" class="form-control" id="ville" name="ville" value="<?php print $var5; ?>">
                  </div>
                  </div>
                   <div class="form-group">
                    <label for="pays">pays :</label>
                    <input type="text" class="form-control" id="pays" name="pays" value="<?php print $var6; ?>" >
                  
                  </div>
                  <div class="form-group">
                    <label for="logo">logo :</label>
                    <input type="file" class="form-control" id="logo" name="logo" required value="<?php print $var7; ?>" >
                  </div>
                  <div class="form-group">
                    <label for="">horaires d'ouverture :</label>
                    <input type="text" class="form-control" id="HD" name="HD" value="<?php print $var8; ?>" >
                  </div> 
                  <div class="form-group">
                    <label for="">Description :</label>
                    <textarea class="form-control" id="desc" name="desc"><?php print $var9; ?></textarea>
                  </div>
                   <div class="text-center">
                    <button type="submit" class="btn btn-primary">Valider</button>
                  </div>
            </form>
          </div >
        </div>
      </div>
    </div>
  </div>
</div>