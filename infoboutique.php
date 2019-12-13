<?php
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
?>