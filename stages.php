
<!-- Restaurant Menu Section -->
<div id="restaurant-menu">
    
 <div class="container">

        <div class="section-title text-center">
       <h2>calendier</h2>
      </div>

          <?php

            require('connexion.php');
      
            $reponse = $bdd->query('SELECT * FROM stage WHERE nbplace >0');
            
            while ($donnees = $reponse->fetch())
           { ?>
            
             <div class='card text-center'> 

              <?php  

              
                /* <!--===================================================================== -->
                <!--====================  entete   ============= -->
                <!-- ==================================================================== --> */

                echo "<h5 class='card-header'>".$donnees["debut"] ." => ".$donnees["fin"]."</h5>";

                 /* <!--===================================================================== -->
                  <!--====================  contenue    ============= -->
                  <!-- ==================================================================== -->*/

                echo  "<div class='card-body'>";

                  echo  "<h5 class='card-title'>".$donnees["theme"]."</h5>";
                    
                  echo  "<p class='card-text'>".$donnees["description"]."</p>";
                  echo  "<p class='card-text'> nombre de place disponible :".$donnees["nbplace"]."</p>";

                    /*<!--===================================================================== -->
                    <!--====================  Postuler     ============= -->
                    <!-- ==================================================================== --> */  

                  echo "<a href='inscription.php?idstage=".$donnees["id"]."'class='btn btn-primary'> postuler </a>";
              
                echo "</div>";

              ?></div> 
              </br>

           <?php } ?>
    </div>
</div>