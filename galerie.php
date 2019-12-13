<?php

 require 'connexion.php';

  $sql='SELECT * FROM galerie';

  $stmt=$bdd->prepare($sql);
  $stmt->execute();

  $nbimages= $stmt->rowCount();

  $galeries= $stmt->fetchAll(PDO::FETCH_OBJ);

  
?>


<!-- Gallery Section -->
<div id="gallery" class="text-center">
  <div class="container-fluid">
    <div class="section-title">
          <h2>Gallery</h2>
    </div>


    <div class="slideshow-container">
      <?php foreach ($galeries as $galerie) : ?>

      <div class="mySlides fade">
        <!-- <div class="numbertext">1 / 4</div> -->
        <div class="gallery-item"> <img height="450px" width="450px" src="img/gallery/<?=$galerie->photo?>" style="width:70%"></div>
        <div class="text"><?=$galerie->nom?></div>
      </div>

      <?php endforeach ;?>
    </div>

    <br>
    
    <div style="text-align:center">
      <?php for ($i=1; $i <=$nbimages ; $i++) :?>
      <span class="dot"></span> 
      <?php endfor; ?>
    </div>

  </div>
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
</script>