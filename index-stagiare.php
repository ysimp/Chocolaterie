<?php 
   require('connexion.php');
     session_start();
    if (isset($_SESSION['Login'])) {
        
    }
    else{
        header('location:Login/index.php');
    }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gusto</title>
<meta name="description" content="">



  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  <br>  
  <div><a href="logout.php" class="btn btn-danger" style="float: right;"> Se Deconnecter</a></div>


    <br>
    <br>

            <!--===================================================================== -->
            <!--====================   liste  des recettes   ============= -->
            <!-- ==================================================================== -->
    
    <div class="container">
    
    <?php

            $sql='SELECT * FROM recette where idstage='.$_GET["idstage"];

            $stmt=$bdd->prepare($sql);
            $stmt->execute();

            $recettes= $stmt->fetchAll(PDO::FETCH_OBJ);
       

    ?>

        <div id="features" class="text-center">
            <div class="row">
            <?php foreach ($recettes as $rec) : ?>


            <div class="col-xs-12 col-sm-4">
              <div class="features-item">

                <img class="card-img-top" src="images/<?=$rec->photo; ?>"  alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?=$rec->nom ;?></h5>

                  <h5 class="card-subtitle">Recette:</h5>
                  <p class="card-text"><?=$rec->description ;?></p>
                </div>

              </div>
            </div>

            <br>
            <?php endforeach ;?>

        </div>
        </div>

            <!--===================================================================== -->
            <!--==================== FIN  liste   ============= -->
            <!-- ==================================================================== -->

    </div>

</body>
</html>
