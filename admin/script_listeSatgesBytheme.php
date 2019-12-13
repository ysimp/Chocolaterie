


<?php

if(isset($_GET['theme'])){
    
   $theme=$_GET["theme"];
    $theme.="%";
    
    require('connexion.php');
    
    $reponse = $bdd->query("SELECT * from stage where theme like'".$theme."'" ); 

    while ($donnees = $reponse->fetch())
    {
        
        echo " <tr>";
        echo "<th scope='row'>". $donnees["id"]."</th>";
        echo "<td>".$donnees["theme"]. " </td>";
        echo "<td>".$donnees["debut"]. " </td>";
        echo "<td>".$donnees["fin"]. " </td>";
        echo "<td>".$donnees["nbplace"]. " </td>";
        echo "<td>".$donnees["description"]. " </td>";
        
        // lien modifier stages
        echo "<td> <a href='admin/ModifierStage.php?id=".$donnees['id']."' class='btn btn-info'  > <span class='glyphicon glyphicon-edit'> </span> </a>";
        
        // lien supprimer stage avec confirmation avant la suppreession 
        ?>

          <a href="admin/Script_SupprimerStage.php?id=<?php echo $donnees['id'] ?> " 
                 onclick="return confirm('voulez vous supprimer ce stage ?');"   class='btn btn-danger'> 
               <span class='glyphicon glyphicon-remove'> </span>
             </a>
        </td>
        
        <?php
       
        echo " </tr>";
    }
    
   
}

?>

