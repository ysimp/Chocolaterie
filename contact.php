<?php 
  require 'send.php';
  include 'infoboutique.php';

  // if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['object']) && isset($_POST['message'])){
  
  if(isset($_POST['envoiemail '])){

    //print_r($_POST);


    $nom=$_POST['name'];

    $email=$_POST['email'];

    $object = $_POST['object'];

    $msg=$_POST['message'];

    sendmail($nom,$email,$object,$msg);

  }
?>

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

<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Reservations</h3>
      <div class="contact-item">
        <p>Appelez nous au </p>
        <p><?php print $var2; ?></p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Address</h3>
      <div class="contact-item">
        <p><?php print $var1; ?></p>
        <p><?php echo $var6 ." ".$var5.",".$var4;?></p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Horaire d'ouverture</h3>
      <div class="contact-item">
        <p>Lundi-Samedi: <?php echo $var8; ?> </p>
        
      </div>
    </div>
  </div>
  <div class="container">
    <div class="section-title text-center">
      <h3>Send us a message</h3>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <form name="sentMessage" id="contactForm" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" name='email' class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>

        <div class="form-group">
          <input type="text"  name="object" id="object" class="form-control" rows="4" placeholder="object" required> 
          <p class="help-block text-danger"></p>
        </div>

        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"> </div>
        <!-- <button type="submit" name="envoiemail" class="btn btn-custom btn-lg" >envoyer</button> -->
        <input type="submit" name="envoiemail" class="btn btn-custom btn-lg" value="envoyer"> 
      </form>
    </div>
  </div>
</div>