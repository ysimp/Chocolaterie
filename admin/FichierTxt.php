    <html>
    <head>
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>FichierTxt</title>
    </head>
    <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<?php
	// ecrir les données dans les fichier 
    // $contenu variable contenant les données saisies par l'utilisateur 
	
    $contenu = $_POST['nom']."\r\n".$_POST['adresse']."\r\n".$_POST['tel']."\r\n".$_POST['portable']."\r\n".$_POST['codepostal']."\r\n".$_POST['ville']."\r\n".$_POST['pays']."\r\n".$_POST['logo']."\r\n".$_POST['HD']."\r\n".$_POST['desc'];
	
     // creer un fichier
	$monfic='monfic.txt';
	//ouvrir le fichier en écriture seule
	$f=fopen($monfic, 'a');
	// vider le fichier avant d'écrir de nouvelles données 
	file_put_contents('monfic.txt', '');
	//ecritur les données qui sont dans la variable $contenu
	fwrite($f,$contenu);
	// fermer le fichier 
	fclose($f);
	  
	  // redierection 
	  
  header("Location:../index-secretaire.php#about");
	exit(); 

  ?>